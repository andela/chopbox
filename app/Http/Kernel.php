<?php

namespace ChopBox\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {
  /**
   * The application's global HTTP middleware stack.
   *
   * @var array
   */
  protected $middleware = [ 
      \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
      \ChopBox\Http\Middleware\EncryptCookies::class,
      \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
      \Illuminate\Session\Middleware\StartSession::class,
      \Illuminate\View\Middleware\ShareErrorsFromSession::class,
      \ChopBox\Http\Middleware\VerifyCsrfToken::class 
  ];
  
  /**
   * The application's route middleware.
   *
   * @var array
   */
  protected $routeMiddleware = [ 
      'auth' => \ChopBox\Http\Middleware\Authenticate::class,
      'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
      'guest' => \ChopBox\Http\Middleware\RedirectIfAuthenticated::class, 
      'home' => \ChopBox\Http\Middleware\HomeMiddleware::class,
  ];

}
