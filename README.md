# Franklin Bundle

## Installation
Create the *src/Fkl* directory and clone the Franklin bundle with the following instructions into the *src/Fkl/FranklinBundle/* folder:

``` bash
mkdir src/Fkl && mkdir src/Fkl
git clone git@github.com:Afxsoft/franklin-bundle.git FranklinBundle
```

Implements the followings instruction in your composer.json file :
``` json
"require": {
        "friendsofsymfony/user-bundle": "~2.0@dev",
        "symfony/icu": "1.0.*@dev",
        "sonata-project/doctrine-orm-admin-bundle": "dev-master",
        "sonata-project/admin-bundle": "~2.3@dev",
        "sonata-project/jquery-bundle": "1.10.*@dev"
    },
```

Update the vendors:
```
composer update
```

Register the bundle into the *app/AppKernel.php* file:
``` php

public function registerBundles()
{
    return array(
        new Fkl\FranklinBundle\FklFranklinBundle(),
        // ...
    );
}
```
