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

```bash
docker-compose up -d
symfony serve -d
```

```bash
composer require doctrine/doctrine-bundle 
```
--> installe docker en meme temps



--> installed Docker Desktop 4.6.1

Make sure to regularly check security issues:
```bash
symfony check:security
```

*composer require symfony/orm-pack
*composer require --dev symfony/maker-bundle
*php bin/console doctrine:database:create



