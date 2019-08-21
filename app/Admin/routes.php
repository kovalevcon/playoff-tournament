<?php

use App\Admin\Controllers\MatchController;
use App\Admin\Controllers\TeamController;
use App\Admin\Controllers\TournamentController;
use App\Admin\Controllers\TournamentMatchController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'TournamentStatController@index')->name('admin.home');
});

Route::group([
    'prefix'        => config('admin.route.prefix') . '/playoff',
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    Route::namespace(config('admin.route.namespace'))->group(function (Router $router) {
        $router->get('/tournament-stats', 'TournamentStatController@index');
        $router->get('/tournament-generator', 'TournamentMatchController@generator');
        $router->post('/tournament-generator', 'TournamentMatchController@generate');
    });
    $router->resource('tournament-matches', TournamentMatchController::class);
    $router->resource('tournaments', TournamentController::class);
    $router->resource('teams', TeamController::class);
    $router->resource('matches', MatchController::class);
});
