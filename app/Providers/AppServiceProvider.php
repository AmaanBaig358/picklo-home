<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;

=======
use App\Models\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
>>>>>>> 721f0e5 (First commit)
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
<<<<<<< HEAD
        //
=======
        View::composer('*', function ($view) {
            // Check if the current route is related to a project
            if (request()->routeIs('admin.manage.client.project')) {
                // Get the client ID from the route
                $clientId = request()->route('client');

                // Fetch the client model (you can adjust this query as needed)
                $client = Client::find($clientId);

                // Share the client data with the view
                if ($client) {
                    $view->with('client', $client);
                }
            }
        });
>>>>>>> 721f0e5 (First commit)
    }
}
