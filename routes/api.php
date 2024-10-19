<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Workbench\App\Http\Controllers\TelegramWebAppApiController;

Route::prefix( '/api' )
    ->middleware( 'telegram-webapp' )
    ->group( function () {
        Route::post( '/telegram-webapp', [ TelegramWebAppApiController::class, 'process' ] );
    } );
