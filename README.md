# Setebit package

## Installation

You can install the package via composer:

```bash
composer require setebit/setebit-package
```

## Usage

```php
Route::middleware('auth-data')->get('/data', function () {
    return view('data');
});
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
