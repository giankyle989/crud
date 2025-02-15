<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'test';
});

require __DIR__.'/auth.php';
