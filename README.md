UtilityBundle
=============

Contains Utilities such as queues and trees

##Full list:
- Immutable container
- Tree
- Multi-child tree
- Queue
- Immutable Queue

#Installation

###Step 1: Download CiUtilityBundle using composer
Add CiUtilityBundle by running the command:
```
php composer.phar require circle/utilitybundle
```
Composer will install the bundle to your project's ```vendor/circle``` directory.

###Step 2: Enable the bundle
Enable the bundle in the symfony kernel

```php
<?php
// PROJECTROOT/app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Circle\UtilityBundle\CircleUtilityBundle(),
    );
}
```

###Step 3: Have fun!