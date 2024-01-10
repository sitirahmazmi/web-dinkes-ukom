<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('allowed_file_extension', function ($attribute, $value, $parameters, $validator) {
            // Define the allowed file extensions
            $allowedExtensions = ['pdf', 'doc', 'docx'];

            // Check if the file extension is in the allowed list
            $extension = strtolower(pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION));
            return in_array($extension, $allowedExtensions);
        });
    }
}
