<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Ini bisa digunakan untuk mendefinisikan middleware atau pengaturan lainnya jika diperlukan
    }

    /**
     * Map the application routes.
     *
     * @return void
     */
    public function map()
    {
        $this->app->group(['namespace' => 'App\Http\Controllers'], function ($app) {
            require base_path('routes/web.php'); // Pastikan mengarah ke file routes yang benar
        });
    }
}
