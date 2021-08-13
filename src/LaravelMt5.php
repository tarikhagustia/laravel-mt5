<?php


namespace Tarikhagustia\LaravelMt5;


use Tarikh\PhpMeta\MetaTraderClient;


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
    // /**
    //  * @var MTConnect $m_connect
    //  */
    // protected $m_connect;
    // //--- name agent
    // private $m_agent = 'WebAPI';
    // //--- is set crypt connection
    // private $m_is_crypt = true;
    //
    // public function __construct($agent = "WebAPI", $is_crypt = true)
    // {
    //     $file_path = storage_path('logs/');
    //     $this->m_agent = $agent;
    //     $this->m_is_crypt = $is_crypt;
    //     MTLogger::Init($agent, config('app.debug'), $file_path);
    // }
    //
    // public function connect()
    // {
    //     $ip = config('mt5.server');
    //     $port = config('mt5.port');
    //     $login = config('mt5.login');
    //     $password = config('mt5.password');
    //     $timeout = 3000;
    //
    //     //--- create connection class
    //     $this->m_connect = new MTConnect($ip, $port, $timeout, $this->m_is_crypt);
    //     // dd($login, $password);
    //     //--- create connection
    //     if (($error_code = $this->m_connect->Connect()) != MTRetCode::MT_RET_OK) return $error_code;
    //     //--- authorization to MetaTrader 5 server
    //     $auth = new MTAuthProtocol($this->m_connect, $this->m_agent);
    //     //---
    //     $crypt_rand = '';
    //     if (($error_code = $auth->Auth($login, $password, $this->m_is_crypt, $crypt_rand)) != MTRetCode::MT_RET_OK) {
    //         //--- disconnect
    //         $this->disconnect();
    //         return $error_code;
    //     }
    //     //--- if need crypt
    //     if ($this->m_is_crypt) $this->m_connect->SetCryptRand($crypt_rand, $password);
    //     //---
    //     return MTRetCode::MT_RET_OK;
    // }
    //
    // /**
    //  * Check connection
    //  * @return bool
    //  */
    // public function isConnected()
    // {
    //     return $this->m_connect != null;
    // }
    //
    // /**
    //  * Disconnect from MetaTrader 5 server
    //  * @return void
    //  */
    // public function disconnect()
    // {
    //     if ($this->m_connect) $this->m_connect->Disconnect();
    // }
    //
    // /**
    //  * Create trade record such as Deposit or Withdrawal
    //  * @param Trade $trade
    //  * @return Trade
    //  * @throws ConnectionException
    //  * @throws TradeException
    //  */
    // public function trade(Trade $trade): Trade
    // {
    //     if (!$this->isConnected()) {
    //         $conn = $this->connect();
    //         if ($conn != MTRetCode::MT_RET_OK) {
    //             throw new ConnectionException(MTRetCode::GetError($conn));
    //         }
    //     }
    //     $mt_trade = new MTTradeProtocol($this->m_connect);
    //     $ticket = null;
    //
    //     $call = $mt_trade->TradeBalance($trade->getLogin(), $trade->getType(), $trade->getAmount(), $trade->getComment(), $ticket);
    //     if ($call != MTRetCode::MT_RET_OK) {
    //         throw new TradeException(MTRetCode::GetError($call));
    //     }
    //     $trade->setTicket($ticket);
    //     return $trade;
    // }
    //
    // /**
    //  * Create new User
    //  * @param User $user
    //  * @return User
    //  * @throws ConnectionException
    //  * @throws UserException
    //  */
    // public function createUser(User $user): User
    // {
    //     if (!$this->isConnected()) {
    //         $conn = $this->connect();
    //
    //         if ($conn != MTRetCode::MT_RET_OK) {
    //             throw new ConnectionException(MTRetCode::GetError($conn));
    //         }
    //     }
    //     $mt_user = new MTUserProtocol($this->m_connect);
    //     $mtUser = MTUser::CreateDefault();
    //     $mtUser->Group = $user->getGroup();
    //     $mtUser->Name = $user->getName();
    //     $mtUser->Email = $user->getEmail();
    //     $mtUser->Address = $user->getAddress();
    //     $mtUser->City = $user->getCity();
    //     $mtUser->State = $user->getState();
    //     $mtUser->Country = $user->getCountry();
    //     $mtUser->MainPassword = $user->getMainPassword();
    //     $mtUser->Phone = $user->getPhone();
    //     $mtUser->PhonePassword = $user->getPhonePassword();
    //     $mtUser->InvestPassword = $user->getInvestorPassword();
    //     $mtUser->Group = $user->getGroup();
    //     $mtUser->Leverage = $user->getLeverage();
    //     $mtUser->ZipCode = $user->getZipCode();
    //
    //     $newMtUser = MTUser::CreateDefault();
    //     $result = $mt_user->Add($mtUser, $newMtUser);
    //     if ($result != MTRetCode::MT_RET_OK) {
    //         throw new UserException(MTRetCode::GetError($result));
    //     }
    //     $user->setLogin($newMtUser->Login);
    //     return $user;
    // }
    //
    // /**
    //  * Get list users login
    //  *
    //  * @param string $group
    //  * @return MTRetCode
    //  * @throws ConnectionException
    //  * @throws UserException
    //  */
    // public function getUserLogins($group)
    // {
    //     $logins = null;
    //     if (!$this->isConnected()) {
    //         $conn = $this->connect();
    //
    //         if ($conn != MTRetCode::MT_RET_OK) {
    //             throw new ConnectionException(MTRetCode::GetError($conn));
    //         }
    //     }
    //
    //     $mt_user = new MTUserProtocol($this->m_connect);
    //     $result = $mt_user->UserLogins($group, $logins);
    //     if ($result != MTRetCode::MT_RET_OK) {
    //         throw new UserException(MTRetCode::GetError($result));
    //     }
    //     return $logins;
    // }
    //
    // /**
    //  * Get User Information By Login
    //  * @param $login
    //  * @return null
    //  * @throws ConnectionException
    //  * @throws UserException
    //  */
    // public function getUser($login)
    // {
    //     $user = null;
    //     if (!$this->isConnected()) {
    //         $conn = $this->connect();
    //
    //         if ($conn != MTRetCode::MT_RET_OK) {
    //             throw new ConnectionException(MTRetCode::GetError($conn));
    //         }
    //     }
    //     $mt_user = new MTUserProtocol($this->m_connect);
    //     $result = $mt_user->Get($login, $user);
    //     if ($result != MTRetCode::MT_RET_OK) {
    //         throw new UserException(MTRetCode::GetError($result));
    //     }
    //     return $user;
    // }
    //
    // /**
    //  * Delete user by login
    //  * @param $login
    //  * @return bool
    //  * @throws ConnectionException
    //  * @throws UserException
    //  */
    // public function deleteUser($login)
    // {
    //     $user = null;
    //     if (!$this->isConnected()) {
    //         $conn = $this->connect();
    //
    //         if ($conn != MTRetCode::MT_RET_OK) {
    //             throw new ConnectionException(MTRetCode::GetError($conn));
    //         }
    //     }
    //     $mt_user = new MTUserProtocol($this->m_connect);
    //     $result = $mt_user->Delete($login, $user);
    //     if ($result != MTRetCode::MT_RET_OK) {
    //         throw new UserException(MTRetCode::GetError($result));
    //     }
    //     return true;
    // }
    //
    // /**
    //  * Get Order Details
    //  * @param $ticket
    //  * @return int
    //  * @throws ConnectionException
    //  * @throws UserException
    //  */
    // public function getOrder($ticket)
    // {
    //     $order = 0;
    //     $user = null;
    //     if (!$this->isConnected()) {
    //         $conn = $this->connect();
    //
    //         if ($conn != MTRetCode::MT_RET_OK) {
    //             throw new ConnectionException(MTRetCode::GetError($conn));
    //         }
    //     }
    //     $mt_order = new MTOrderProtocol($this->m_connect);
    //     $result = $mt_order->OrderGet($ticket, $order);
    //     if ($result != MTRetCode::MT_RET_OK) {
    //         throw new UserException(MTRetCode::GetError($result));
    //     }
    //     return $order;
    // }
    //
    // /**
    //  * Get Total Order
    //  * @param $login
    //  * @return int
    //  * @throws ConnectionException
    //  * @throws UserException
    //  */
    // public function getOrderTotal($login)
    // {
    //     $total = 0;
    //     $user = null;
    //     if (!$this->isConnected()) {
    //         $conn = $this->connect();
    //
    //         if ($conn != MTRetCode::MT_RET_OK) {
    //             throw new ConnectionException(MTRetCode::GetError($conn));
    //         }
    //     }
    //     $mt_order = new MTOrderProtocol($this->m_connect);
    //     $result = $mt_order->OrderGetTotal($login, $total);
    //     if ($result != MTRetCode::MT_RET_OK) {
    //         throw new UserException(MTRetCode::GetError($result));
    //     }
    //     return $total;
    // }
    //
    // /**
    //  * Get Open Order Pagination
    //  * @param $login
    //  * @param $offset
    //  * @param $total
    //  * @return null
    //  * @throws ConnectionException
    //  * @throws UserException
    //  */
    // public function getOrderPagination($login, $offset, $total)
    // {
    //     $orders = null;
    //     $user = null;
    //     if (!$this->isConnected()) {
    //         $conn = $this->connect();
    //
    //         if ($conn != MTRetCode::MT_RET_OK) {
    //             throw new ConnectionException(MTRetCode::GetError($conn));
    //         }
    //     }
    //     $mt_order = new MTOrderProtocol($this->m_connect);
    //     $result = $mt_order->OrderGetPage($login, $offset, $total, $orders);
    //     if ($result != MTRetCode::MT_RET_OK) {
    //         throw new UserException(MTRetCode::GetError($result));
    //     }
    //     return $orders;
    // }
    //
    // /**
    //  * Conduct User balance
    //  * @param $login
    //  * @param MTEnDealAction $type
    //  * @param $balance
    //  * @param $comment
    //  * @return null
    //  * @throws ConnectionException
    //  * @throws UserException
    //  */
    // public function conductUserBalance($login, MTEnDealAction $type, $balance, $comment)
    // {
    //     $ticket = null;
    //     if (!$this->isConnected()) {
    //         $conn = $this->connect();
    //
    //         if ($conn != MTRetCode::MT_RET_OK) {
    //             throw new ConnectionException(MTRetCode::GetError($conn));
    //         }
    //     }
    //     $mt_order = new MTTradeProtocol($this->m_connect);
    //     $result = $mt_order->TradeBalance($login, $type, $balance, $comment);
    //     if ($result != MTRetCode::MT_RET_OK) {
    //         throw new UserException(MTRetCode::GetError($result));
    //     }
    //     return $ticket;
    // }


}
