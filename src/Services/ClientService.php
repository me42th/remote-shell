<?php
namespace Me42th\RemoteShell\Services;

class ClientService{
    public function dispatch($cmd){
        $options = array(
            'uri'=>config('remote-shell.uri'),
            'location' => config('remote-shell.uri').'/'.config('remote-shell.route')
        );
        try{
            $client = new \SoapClient(null,$options);
            $token = config('remote-shell.token');
            return $client->cmd($token,$cmd);
        } catch(\SoapFault $err){
            throw new \Exception($err->getMessage());
        }
    }
}
