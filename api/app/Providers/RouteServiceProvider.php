<?php

declare(strict_types=1);

namespace SavingsMate\App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            $this->mapApiRoutes();
            $this->mapWebRoutes();
        });
    }

    private function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->as('web.')
            ->group(function () {
                Route::name('default')->get('/', fn () => '.');
            });
    }

    private function mapApiRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->as('api.')
            ->group(function () {
                Route::name('default')->get('/', fn () => response()->json([
                    'data' => [],
                    'status' => [
                        'code' => Response::HTTP_OK,
                        'message' => 'OK',
                        'success' => true,
                    ],
                ]));
            });
    }
}
