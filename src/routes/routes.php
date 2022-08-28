<?php

use Illuminate\Support\Facades\Route;
use Me42th\RemoteShell\Services as srv;

Route::any(config('remote-shell.route'), function(srv\ServerService $server){
    $server->startup();
});
