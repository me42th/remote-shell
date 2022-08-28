<?php
namespace Me42th\RemoteShell\Services;

class InstallService{
    private const CONFIG_FILE = "PD9waHAKICAgIHJldHVybiBbCiAgICAgICAgLy8gU2VydmVyIFVSSQogICAgICAgICd1cmknID0+ICdodHRwOi8vbG9jYWxob3N0OjgwMDAnLAogICAgICAgIC8vIFJvdXRlIG9uIHNlcnZlcgogICAgICAgICdyb3V0ZScgPT4gJ3JlbW90ZS1zaGVsbCcsCiAgICAgICAgLy8gUHV0IHNvbWV0aGluZyBoZXJlLCBuZWVkcyBiZSBlcXVhbHMuIEJ5IGRlZmF1bHQgb25lIHJhbmRvbSBtZDUgaGFzaCB3aWxsIGJlIHB1dCBoZXJlIGluIGluc3RhbGwKICAgICAgICAndG9rZW4nID0+ICcjIyMjIyMjIyMjIyMnCiAgICBdOw==";
    public function go(){
        if($file_creation_flag = $this->installValidation()){
            $text = base64_decode(self::CONFIG_FILE);
            $text = str_replace('############',md5(random_int(42,1000000000000)),$text);
            $path = config_path('remote-shell.php');
            file_put_contents($path,$text);
        }
        return $file_creation_flag;
    }

    private function installValidation(){
        return !file_exists(config_path('remote-shell.php'));
    }
}
