<?php
namespace Me42th\RemoteShell\Services;

class InstallService{
    public function go(){
        $path = __DIR__.'/config/remote-shell.php';
        $text = file_get_contents($path);
        $text = str_replace('############',md5(random_int(42,1000000000000)),$text);
        file_put_contents($text,$path);
    }
}
