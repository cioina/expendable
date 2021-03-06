[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Distilleries/PermissionUtil/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Distilleries/PermissionUtil/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Distilleries/PermissionUtil/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Distilleries/PermissionUtil/?branch=master)
[![Build Status](https://travis-ci.org/Distilleries/PermissionUtil.svg?branch=master)](https://travis-ci.org/Distilleries/PermissionUtil)
[![Total Downloads](https://poser.pugx.org/distilleries/permission-util/downloads)](https://packagist.org/packages/distilleries/permission-util)
[![Latest Stable Version](https://poser.pugx.org/distilleries/permission-util/version)](https://packagist.org/packages/distilleries/permission-util)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE)



# Laravel 5 Permission Util
Provide a system to detect if the user connected have access or not. 
Provide a middleware to restrict access with a 403


## Table of contents
1. [Installation](#installation)
2. [Basic usage](#basic-usage)
3. [Middleware](#middleware)

##Installation

Add on your composer.json

``` json
    "require": {
        "distilleries/permission-util": "1.*",
    }
```

run `composer update`.

Add Service provider to `config/app.php`:

``` php
    'providers' => [
        // ...
       'Distilleries\PermissionUtil\PermissionUtilServiceProvider',
    ]
```

And Facade (also in `config/app.php`)
   

``` php
    'aliases' => [
        // ...
        'PermissionUtil'   => 'Distilleries\PermissionUtil\Facades\PermissionUtil',
    ]
```


Export the configuration:

```ssh
php artisan vendor:publish --provider="Distilleries\PermissionUtil\PermissionUtilProvider"
```

###Basic usage
To check the permission, I use the `auth` of your application.
On your model use for the Auth implement the interface `Distilleries\PermissionUtil\Contracts\PermissionUtilContract` add the method `hasAccess` to define if the user have access or not.
The key in param is a string action like  `UserController@getEdit`.

```php
    public function hasAccess($key)
    {
        return true;
    }
```

If the user is connected and your model haven't this method the class return true.
If the user is not connected the permission util return false.
To disabled the restriction of connected user just go in config file and put false in `auth_restricted`.

You can use the facade to detect if the user can access or not:

Method | Call | Description
------ | ---- | ------
`hasAccess` | `PermissionUtil::hasAccess('Controller@action')` | Return if the user can access to this action


##Middleware
The package provide a middleware to detect automatically if the user can access to a method of a controller.
To active it just add on your `app/Http/Kernel`:

```php
    protected $routeMiddleware = [
        //...
		'permission' => 'Distilleries\PermissionUtil\Http\Middleware\CheckAccessPermission',
	];
```
And on your controller or your route add the middleware:

```php
    public function __construct()
    {
        $this->middleware('permission');
    
    }
```
If the user can access to an action that dispatch a 403
	
