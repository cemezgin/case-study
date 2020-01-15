<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\ResponseFactory;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * @param ResponseFactory $factory
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('success', function ($message = '', $data = null) use ($factory) {
            $format = [
                'status' => 'ok',
                'message' => $message,
                'data' => $data,
            ];

            return $factory->make($format);
        });

        $factory->macro('error', function (string $message = '', $errors = []) use ($factory) {
            $format = [
                'status' => 'error',
                'message' => $message,
                'errors' => $errors,
            ];

            return $factory->make($format);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
