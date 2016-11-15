# PhpAcademy - Image filters

## Installation

To use this library, go to your composer project. From there, add new repository to composer config:

```sh
composer config repositories.inchoostripe git git@github.com:ivanweiler/phpacademy-image-filters.git
```

Afterwarrds, you can require composer package

```sh
composer require php-academy/filters:dev-master
```

## Usage

In order to apply filter just for output, you can use following:

```php
<?php

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;
use PhpAcademy\Image\Filters;


$image = Image::make('images/rose.jpg');
$image->filter(new Filters\SepiaFilter());
echo $image->response('jpg', 100);
```

In order to save image to disk, you can do following:

```php
<?php

require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;
use PhpAcademy\Image\Filters;


$image = Image::make('images/rose.jpg');
$image->filter(new Filters\SepiaFilter());
$image->save('images/rose-dreamy.jpg');
```

## Available filters

* Antique
* Blur
* Chrome
* Monopin
* Retro
* Velvet
* BlackWhite
* Boost
* Dreamy
* Sepia
* SynCity

## Special thanks

Filters are based on following repository:

https://github.com/marchibbins/GD-Filter-testing