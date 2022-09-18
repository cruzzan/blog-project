<?php

namespace Routes;

use Illuminate\Routing\RouteRegistrar;

class Web {
    public static function getRoutes(RouteRegistrar $registrar) {
        $registrar->get('/', function () {
            return view('welcome');
        });
    }
}
