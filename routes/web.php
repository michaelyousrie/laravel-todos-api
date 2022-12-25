<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        'message' => "This is an API only project. No frontend is provided. There's a postman collection though!"
    ];
});
