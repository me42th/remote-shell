<?php
function cmd($token,$cmd){
    if($token !== config('remote-shell.token')){
        throw new Exception('Invalid token');
    }
    exec("cd .. && $cmd", $out);
    $out = implode("\n",$out);
    return base64_encode($out);
}

namespace Me42th\RemoteShell;
class ServerService {

    public function startup(){
        $options = array("uri" => config('remote-shell.uri'));
        $server = new \SoapServer(null,$options);
        $server->addFunction("cmd");
        $server->handle();
    }
}





