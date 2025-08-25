<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Donators;
use Livewire\Attributes\On;

class Draw extends Component
{
    public $winners = [];
    public $history = [];

    public function render()
    {
        $draws = \App\Models\Draw::latest()->get();
        $lastDraw = $draws->first();
        $this->winners = $lastDraw ? json_decode($lastDraw->winners, true) : [];
        $this->history = $draws->skip(1)->map(function($draw) {
            return [
              'date' => $draw->created_at->toDateString(),
                'winners' => json_decode($draw->winners, true),
            ];
        })->values();

        $user = auth()->user();

        return view('livewire.draw', compact('user'));
    }

    #[On('randomDraw')]
    public function random()
    {
        $this->authorize('create', Draw::class);

        $lastDraw = \App\Models\Draw::latest()->first();
        $current = $this->winners = $lastDraw ? json_decode($lastDraw->winners, true) : [];

        $donators = Donators::whereNotNull('history')->get();

//        if (empty($current)) {
//            $current = $this->generateWinners();
//        }

        $eligible = $donators->filter(function ($donator) {
            $history = json_decode($donator->history, true);
            return is_array($history) && count($history) >= 2 && $this->hasConsecutiveMonths($history);
        });

        if ($eligible->isEmpty()) {
            $this->dispatch('confirmDraw');
            return null;
        }

        $unique = $eligible->unique('iban');

        $models = $unique->map(function ($donator) {
            return [
                'name' => $donator->name,
                'email' => $donator->email,
            ];
        })->toArray();

        shuffle($models);

        $tirageCount = \App\Models\Draw::count();
        $groupToReplace = ($tirageCount % 3) * 3;

        $currentNames = array_column($current, 'name');
        $filtered = array_filter($models, function ($model) use ($currentNames) {
            return !in_array($model['name'], $currentNames);
        });

        $newWinners = array_slice(array_values($filtered), 0, 3);
        $updatedWinners = $current;
        array_splice($updatedWinners, $groupToReplace, 3, $newWinners);

        \App\Models\Draw::create([
            'winners' => json_encode($updatedWinners),
        ]);

        $this->winners = $updatedWinners;
    }

//    public function generateWinners()
//    {
//        $donators = Donators::whereNotNull('history')->get();
//
//        $eligible = $donators->filter(function ($donator) {
//            $history = json_decode($donator->history, true);
//            return is_array($history) && count($history) >= 2;
//        });
//
//        $unique = $eligible->unique('iban');
//
//        $models = $unique->map(function ($donator) {
//            return [
//                'name' => $donator->name,
//            ];
//        })->toArray();
//
//        shuffle($models);
//
//        return array_slice($models, 0, 9);
//    }

    public function hasConsecutiveMonths(array $history): bool
    {
        if (count($history) < 2) {
            return false;
        }

        $history = array_map(function ($date) {
            return is_array($date) ? $date[0] : $date;
        }, $history);

        $dates = array_map(fn($date) => \DateTime::createFromFormat('m-Y', $date), $history);

        usort($dates, fn($a, $b) => $a <=> $b);

        for ($i = 0; $i < count($dates) - 1; $i++) {
            $currentDate = $dates[$i];
            $nextDate = $dates[$i + 1];

            $isNextMonthConsecutive = ($nextDate->format('Y') == $currentDate->format('Y') && $nextDate->format('m') == $currentDate->format('m') + 1) ||
                ($nextDate->format('Y') == $currentDate->format('Y') + 1 && $nextDate->format('m') == '01' && $currentDate->format('m') == '12');

            if (!$isNextMonthConsecutive) {
                return false;
            }
        }

        return true;
    }

    #[On('emptyDarw')]
    public function confirm()
    {
        $this->dispatch('emptyDraw');
    }
}
