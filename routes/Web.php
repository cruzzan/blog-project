<?php

namespace Routes;

use App\Http\Controllers\PostController;
use Illuminate\Routing\RouteRegistrar;

class Web {
    public static function getRoutes(RouteRegistrar $registrar) {
        $registrar->get('/', function () {
            return view('welcome');
        });

        $registrar->resource('post', PostController::class);
    }
}
