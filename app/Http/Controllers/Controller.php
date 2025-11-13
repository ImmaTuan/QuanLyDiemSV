<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;

abstract class Controller
{
    public function boot() {
    if(config('app.env') === 'production') {
        URL::forceScheme('https');
    }
}
}
