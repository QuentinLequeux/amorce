<?php

test('acces login screen', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});
