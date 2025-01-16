<?php

namespace App\Livewire;

use App\Models\Donators;
use Livewire\Component;

class Draw extends Component
{
    public $winners = [];

    public function render()
    {
        $lastDraw = \App\Models\Draw::latest()->first();
        $this->winners = $lastDraw ? json_decode($lastDraw->winners, true) : [];
        $user = auth()->user();

        return view('livewire.draw', compact('user'));
    }

    public function random()
    {
        $lastDraw = \App\Models\Draw::latest()->first();
        $current = $this->winners = $lastDraw ? json_decode($lastDraw->winners, true) : [];

        $donators = Donators::whereNotNull('history')->get();

        if (empty($current)) {
            $current = $this->generateWinners();
        }

        $eligible = $donators->filter(function ($donator) {
            $history = json_decode($donator->history, true);
            return is_array($history) && count($history) >= 2 && $this->hasConsecutiveMonths($history);
        });

        $unique = $eligible->unique('iban');

        $models = $unique->map(function ($donator) {
            return [
                'name' => $donator->name,
            ];
        })->toArray();

        shuffle($models);

        // Détermine quel groupe de 3 doit être remplacé
        $tirageCount = \App\Models\Draw::count();
        $groupToReplace = ($tirageCount % 3) * 3; // 0, 3 ou 6

        $currentNames = array_column($current, 'name');
        $filtered = array_filter($models, function ($model) use ($currentNames) {
            return !in_array($model['name'], $currentNames);
        });

        // Remplace le groupe ciblé
        $newWinners = array_slice(array_values($filtered), 0, 3);
        $updatedWinners = $current;
        array_splice($updatedWinners, $groupToReplace, 3, $newWinners);

        \App\Models\Draw::create([
            'winners' => json_encode($updatedWinners),
        ]);

        $this->winners = $updatedWinners;
    }

    public function generateWinners()
    {
        $donators = Donators::whereNotNull('history')->get();

        $eligible = $donators->filter(function ($donator) {
            $history = json_decode($donator->history, true);
            return is_array($history) && count($history) >= 2;
        });

        $unique = $eligible->unique('iban');

        $models = $unique->map(function ($donator) {
            return [
                'name' => $donator->name,
            ];
        })->toArray();

        shuffle($models);

        return array_slice($models, 0, 9);
    }

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

    public function individual()
    {

    }
}
