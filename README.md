# Hotel-Project: Hypnos Hotels
Hypnos Hotels est un site internet dédié à la réservation de suites d'établissemenst situés dans toute la France, sans intégration de paiement.

## Environnement de développement

### Pré-requis

* PHP 8.0.17
* Composer
* Symfony CLI
* Docker
* Docker-compose
--> Verifier les pré-requis:

```bash
symfony check: requirements
```

### Lancer l'environnement de développement

* lancer/stopper serveurs Docker (4.6.1):

```bash
docker-compose up -d
symfony serve -d
```
```bash
docker-compose stop
symfony server:stop
```

* créer database:

```bash
composer require doctrine/doctrine-bundle 
```
--> installe docker en meme temps

*composer require symfony/orm-pack
*composer require --dev symfony/maker-bundle
    *php bin/console doctrine:database:create 
    OU
    *symfony console make:docker:database

* créer entités:

```bash
symfony console make:user
```

```bash
symfony console make:entity
```

php bin/console make:migration
--> In ExceptionConverter.php line 103:

  An exception occurred in the driver: SQLSTATE[HY000] [1045] Access denied for user 'db_user'@'localhost' (using password: YES)  


In Exception.php line 30:

  SQLSTATE[HY000] [1045] Access denied for user 'db_user'@'localhost' (using password: YES)  


In Driver.php line 28:

  SQLSTATE[HY000] [1045] Access denied for user 'db_user'@'localhost' (using password: YES)  

> Make sure to regularly check security issues:
    ```bash
    symfony check:security
    ```

symfony console make:admin:crud
composer require symfony/webpack-encore-bundle





