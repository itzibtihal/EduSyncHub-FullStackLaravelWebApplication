<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\Models\Reminder;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        // Paginator::useBootstrap();
        View::composer('*', function ($view) {
            
            if (auth()->check()) {
               
                $userId = auth()->id();
    
                
                $today = Carbon::now()->toDateString();
    
                $reminderCount = Reminder::where('created_by', $userId)
                    ->where('finish_time', '>', $today)
                    ->count();
    
                
                $view->with('reminderCount', $reminderCount);
            }
        });
    }
}
