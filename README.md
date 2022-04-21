# Hotel-Project: Hypnos Hotels
Hypnos Hotels est un site internet dédié à la réservation de suites d'établissemenst situés dans toute la France, sans intégration de paiement.

## Environnement de développement

### Pré-requis

* PHP 8.0.17
* Composer
* Symfony CLI

--> Verifier les pré-requis:
```bash
symfony check: requirements
```

### Lancer l'environnement de développement

```bash
symfony serve -d
```
```bash
symfony server:stop
```
```bash
npm run watch
```

* créer database:

```bash
composer require doctrine/doctrine-bundle 
```

*composer require symfony/orm-pack
*composer require --dev symfony/maker-bundle
    *php bin/console doctrine:database:create 

* créer entités:

```bash
symfony console make:user
```

```bash
symfony console make:entity
```

```bash
php bin/console make:migration
```

> Make sure to regularly check security issues:
    ```bash
    symfony check:security
    ```






