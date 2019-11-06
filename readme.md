
## Laravel MT5

This is Laravel 6.x package wrapper library for Metatrader 5 Web API
- [Official MT5 Web Api Documentation](https://support.metaquotes.net/en/docs/mt5/api/webapi).


## Documentation

### Installing 
To install the package, in terminal:
```
composer require tarikhagustia/laravel-mt5
```

### Configure
If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php
```
Tarikhagustia\LaravelMt5\LaravelMt5Provider::class,
```

#### Copy the package config to your local config with the publish command:

```bash
php artisan vendor:publish --provider="Tarikhagustia\LaravelMt5\LaravelMt5Provider"
```

and then you can configure connection information to MT5 with this ``.env`` value

```dotenv
MT5_SERVER_IP=
MT5_SERVER_PORT=
MT5_SERVER_WEB_LOGIN=
MT5_SERVER_WEB_PASSWORD=
```

## Usage

### Create Deposit
```php
use Tarikhagustia\LaravelMt5\Entities\Trade;
use Tarikhagustia\LaravelMt5\LaravelMt5;

$api = new LaravelMt5();
$trade = new Trade();
$trade->setLogin(6000189);
$trade->setAmount(100);
$trade->setComment("Deposit");
$trade->setType(Trade::DEAL_BALANCE);
$result = $api->trade($trade);
```

The result variable will return Trade class with ticket information, you can grab ticket number by calling ``$result->getTicket()``

### Todo

- [x] Deposit or Withdrawal
- [ ] Create Account
- [ ] Change Password
- [ ] Create Group
- [ ] Delete Group
- [ ] Get Accounts
- [ ] Remove Account
- [ ] Get Trades
- [ ] Get Group
   
## Contributing

Thank you for considering contributing to the Laravel MT5! you can fork this repository and make pull request.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel MT5, please send an e-mail to Tarikh Agustia via [agustia.tarikh150@gmail.com](mailto:agustia.tarikh150@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
