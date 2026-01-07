<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
        //Image Validator ('image' => 'shop_image')
        Validator::extend('shop_image', function ($attribute, $value, $parameters, $validator) {
            return $validator->validateImage($attribute, $value) &&
                $validator->validateMax($attribute, $value, [2048]) &&
                $validator->validateMimes($attribute, $value, ['jpeg', 'png', 'jpg']);
        }, 'Hình ảnh phải là định dạng jpeg, png, jpg và không quá 2MB.');
    }
}
