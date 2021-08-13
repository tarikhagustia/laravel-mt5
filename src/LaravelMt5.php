<?php


namespace Tarikhagustia\LaravelMt5;


use Tarikh\PhpMeta\MetaTraderClient;
use Tarikh\PhpMeta\Entities\Order;


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

    public function openOrder($login, $symbol, $volume, $type)
    {
        $order = new Order();
        $order->setLogin($login);
        $order->setSymbol($symbol);
        $order->setVolume($volume);
        $order->setType($type);
        $order->setAction(200);
        return $this->newOrder($order);
    }

}
