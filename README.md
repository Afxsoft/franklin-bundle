# Franklin Bundle

## Installation
Create the *src/Fkl* directory and clone the Franklin bundle with the following instructions into the *src/Fkl/FranklinBundle/* folder:

``` bash
mkdir src/Fkl && cd src/Fkl
git clone git@github.com:Afxsoft/franklin-bundle.git FranklinBundle
```

Implements the followings instruction in your composer.json file :
``` json
"require": {
        "friendsofsymfony/user-bundle": "~2.0@dev",
        "symfony/icu": "1.0.*@dev",
        "developathe/crud-bundle": "dev-master",
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
        new FOS\UserBundle\FOSUserBundle(),
        new Developathe\CrudBundle\DevelopatheCrudBundle(),
        // ...
    );
}
```

Edit the *app/config/config.yml*:
``` yml
imports:
    - { resource: parameters.yml }
    - { resource: security.yml }

framework:
    #esi:             ~
    translator:      { fallback: "%locale%" }
    secret:          "%secret%"
    router:
        resource: "%kernel.root_dir%/config/routing.yml"
        strict_requirements: ~
    form:            ~
    csrf_protection: ~
    validation:      { enable_annotations: true }
    templating:
        engines: ['twig']
        #assets_version: SomeVersionScheme
    default_locale:  "%locale%"
    trusted_proxies: ~
    session:         ~
    fragments:       ~
    http_method_override: true

# Twig Configuration
twig:
    debug:            "%kernel.debug%"
    strict_variables: "%kernel.debug%"
    form:
        resources:
            - 'DevelopatheCrudBundle:Form:fields.html.twig'

# Assetic Configuration
assetic:
    debug:          "%kernel.debug%"
    use_controller: false
    bundles:        [ FklFranklinBundle, DevelopatheCrudBundle ]
    #java: /usr/bin/java
    filters:
        cssrewrite: ~
        #closure:
        #    jar: "%kernel.root_dir%/Resources/java/compiler.jar"
        #yui_css:
        #    jar: "%kernel.root_dir%/Resources/java/yuicompressor-2.4.7.jar"
    assets:
        fonts_glyphicons_eot:
             inputs:
                    - "%kernel.root_dir%/../src/Fkl/FranklinBundle/Resources/public/fonts/glyphicons-halflings-regular.eot"
             output: "fonts/glyphicons-halflings-regular.eot"
        fonts_glyphicons_svg:
             inputs:
                    - "%kernel.root_dir%/../src/Fkl/FranklinBundle/Resources/public/fonts/glyphicons-halflings-regular.svg"
             output: "fonts/glyphicons-halflings-regular.svg"
        fonts_glyphicons_ttf:
             inputs:
                    - "%kernel.root_dir%/../src/Fkl/FranklinBundle/Resources/public/fonts/glyphicons-halflings-regular.ttf"
             output: "fonts/glyphicons-halflings-regular.ttf"
        fonts_glyphicons_woff:
             inputs:
                    - "%kernel.root_dir%/../src/Fkl/FranklinBundle/Resources/public/fonts/glyphicons-halflings-regular.woff"
             output: "fonts/glyphicons-halflings-regular.woff"
        select2:
             inputs:
                    - "%kernel.root_dir%/../src/Fkl/FranklinBundle/Resources/public/images/conseil.png"
             output: "images/conseil.png"
        produits:
             inputs:
                    - "%kernel.root_dir%/../src/Fkl/FranklinBundle/Resources/public/images/produits.png"
             output: "images/produits.png"
        installation:
             inputs:
                    - "%kernel.root_dir%/../src/Fkl/FranklinBundle/Resources/public/images/installation.png"
             output: "images/installation.png"
        logo:
             inputs:
                    - "%kernel.root_dir%/../src/Fkl/FranklinBundle/Resources/public/images/logo.png"
             output: "images/logo.png"

# Doctrine Configuration
doctrine:
    dbal:
        driver:   "%database_driver%"
        host:     "%database_host%"
        port:     "%database_port%"
        dbname:   "%database_name%"
        user:     "%database_user%"
        password: "%database_password%"
        charset:  UTF8
        # if using pdo_sqlite as your database driver, add the path in parameters.yml
        # e.g. database_path: "%kernel.root_dir%/data/data.db3"
        # path:     "%database_path%"

    orm:
        auto_generate_proxy_classes: "%kernel.debug%"
        auto_mapping: true

# Swiftmailer Configuration
swiftmailer:
    transport: "%mailer_transport%"
    host:      "%mailer_host%"
    username:  "%mailer_user%"
    password:  "%mailer_password%"
    spool:     { type: memory }

fos_user:
    db_driver: orm # other valid values are 'mongodb', 'couchdb' and 'propel'
    firewall_name: main
    user_class: Fkl\UserBundle\Entity\User

fos_user:
    db_driver: orm # other valid values are 'mongodb', 'couchdb' and 'propel'
    firewall_name: main
    user_class: Fkl\FranklinBundle\Entity\User
```

Edit the *app/config/security.yml*:
``` yml
security:
    encoders:
        FOS\UserBundle\Model\UserInterface: sha512

    role_hierarchy:
        ROLE_ADMIN:       ROLE_USER
        ROLE_SUPER_ADMIN: ROLE_ADMIN

    providers:
        fos_userbundle:
            id: fos_user.user_provider.username

    firewalls:
        main:
            pattern: ^/
            form_login:
                provider: fos_userbundle
                csrf_provider: form.csrf_provider
            logout:       true
            anonymous:    true

    access_control:
        - { path: ^/login$, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/register, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/resetting, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/admin/, role: ROLE_ADMIN }
```

Edit the *app/config/routing.yml*

``` yml
fkl_franklin:
    resource: "@FklFranklinBundle/Resources/config/routing.yml"
    prefix:   /
```