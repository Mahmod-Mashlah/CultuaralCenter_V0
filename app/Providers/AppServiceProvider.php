<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Rules\MultipleOfuse;
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
        Validator::extend('multiple_of', function ($attribute, $value, $parameters, $validator) {
            $multiple = $parameters[0] ?? null;
            $rule = new MultipleOf($multiple);
            return $rule->passes($attribute, $value);
        });

        Validator::replacer('multiple_of', function ($message, $attribute, $rule, $parameters) {
            $multiple = $parameters[0] ?? null;
            return str_replace(':multiple', $multiple, $message);
        });
    }
}
