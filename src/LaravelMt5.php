<?php


namespace Tarikhagustia\LaravelMt5;


use Tarikh\PhpMeta\MetaTraderClient;
use Tarikh\PhpMeta\Lib\CMT5Request;


class LaravelMt5 extends MetaTraderClient
{
    public function __construct()
    {
        $ip = config('mt5.server');
        $port = config('mt5.port');
        $login = config('mt5.login');
        $password = config('mt5.password');
        parent::__construct($ip, (int)$port, $login, $password, config('app.debug'));
    }

    public function dealerSend($params)
    {
        // Example of use
        $request = new CMT5Request();
        // Authenticate on the server using the Auth command
        if ($request->Init($this->server.":".$this->port) && $request->Auth($this->username, $this->password, WebAPIVersion, "WebManager")) {

            // Let us request the symbol named TEST using the symbol_get command
            $path = '/api/dealer/send_request';
            $result = $request->Get($path, json_encode($params));
            $response  = json_decode($result);
            if ($response->retcode == "0 Done")
            {
                $request->Shutdown();
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

}
