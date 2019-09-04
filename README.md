# laravel-markdoc
An markdown based document viewer for laravel , out-of-the-box

# Screenshot
![laravel-markdoc](https://raw.githubusercontent.com/xiaotianhu/laravel-markdoc/master/Screenshot.png)


# Installation

>This package requires PHP 7+ and Laravel 5.5+

```
composer require xiaotianhu/markdoc
```

After that, publish the config files with:

```
php artisan markdoc:install
```
And we're done.

# Usage
After the install,you'll find a doc folder in your project's base path.

Just put all the markdown files into the folder,and access with:

> http://yoursite.com/markdoc/index

In default,you can only access the document when the laravel's debug mode is on;

You can modify this in the config file 'config/markdoc.php'.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

