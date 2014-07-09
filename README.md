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
php composer.phar require ci/utilitybundle
```
Composer will install the bundle to your project's ```vendor/ci``` directory.

###Step 2: Enable the bundle
Enable the bundle in the symfony kernel

```php
<?php
// PROJECTROOT/app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Ci\UtilityBundle\CiUtilityBundle(),
    );
}
```

###Step 3: Have fun!