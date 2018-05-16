FirstPromoter
=========

## Introduction
This packages provides a nice and easy wrapper around the [FirstPromoter API](https://docs.firstpromoter.com/) for use in your Laravel application.

In order to use the FirstPromoter API, you must have an account and API keys. 

## Example

```php

```

## Installation

Add `messerli90/first_promoter` to your `composer.json`.
```
"messerli90/first_promoter": "~1.0"
```
or 
```bash
composer require messerli90/first_promoter
```

Run `composer update` to pull down the latest version of the package.

Now open up `app/config/app.php` and add the service provider to your `providers` array.

```php
'providers' => array(
    Messerli90\FirstPromoter\FirstPromoterServiceProvider::class,
)
```

Optionally, add the facade to your `aliases` array
```php
'FirstPromoter' => \Messerli90\FirstPromoter\Facades\FirstPromoter::class,
```

## Configuration

Add the `first_promoter` to your `config/services.php` array
```php
'first_promoter' => [
    'key' => 'YOUR_API_KEY'
]
```

## Usage
```php
use Messerli90\FirstPromoter\FirstPromoter;

$first_promoter = new FirstPromoter(config('services.$first_promoter.key'));
```

### Tracking API

```php
// With this call you can track the referral signs-ups server-side.
$first_promoter->trackSignUp($wid, $email, $data = []);

```

### Promoter
```php

```

### Reward
```php

```

### Lead
```php

```

## Format of returned data

The returned JSON data is decoded as a PHP object.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Michael Messerli](https://twitter.com/michaelmesserli)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
