<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;

abstract class AppServiceProvider 
{
 public function boot(): void
{
    if (env('APP_ENV') === 'production') {
        URL::forceScheme('https');
    }
}
}
