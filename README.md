#olelo Cassy - Helper
This is a little helper to easily include the [olelo Cassy CDN](https://www.olelo.io/cassy) in your PHP projects. 

##Prerequisites
You need an olelo account and the Cassy module enabled. Technically you could use this package anyway - however, there would be no sense in it.

##Installation
You can install the package via composer:
```
composer require olelo/cassy
```

##Usage
```
$cassy = new \Olelo\Cassy\Cassy();
$yourCdnUrl = $cassy->getCdnUrl('https://your-url.com/something'); 
```

####Laravel
A Laravel service provider with a facade is contained in this package. It is automatically detected. You can use it like:
```
use Olelo\Cassy\Facades\Cassy;

$yourCdnUrl = Cassy::cdn('https://your-url.com/something');
```