<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];
    
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
            'web' => [
                    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
                    \Illuminate\Session\Middleware\StartSession::class,
                    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                    \Illuminate\Routing\Middleware\SubstituteBindings::class,
                    \App\Http\Middleware\EncryptCookies::class,
                    \App\Http\Middleware\VerifyCsrfToken::class,
            ],
            
            // 60回リクエスト/分までの制限
            'api' => [
                    // Passport
                    \Laravel\Passport\Http\Middleware\CreateFreshApiToken::class,
                    'throttle:60,1',
                    'bindings',
            ],
    ];
    
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
            'auth'       => \Illuminate\Auth\Middleware\Authenticate::class,
            'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
            'bindings'   => \Illuminate\Routing\Middleware\SubstituteBindings::class,
            'can'        => \Illuminate\Auth\Middleware\Authorize::class,
            'guest'      => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'throttle'   => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            
            // API Scopes...
            'scopes'     => \Laravel\Passport\Http\Middleware\CheckScopes::class,
            'scope'      => \Laravel\Passport\Http\Middleware\CheckForAnyScope::class,
        ];
}
