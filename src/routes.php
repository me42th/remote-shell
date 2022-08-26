<?php

use Illuminate\Support\Facades\Route;
use Me42th\RemoteShell\ServerService;

Route::any(config('remote-shell.route'), function(ServerService $server){
    $server->startup();
});
