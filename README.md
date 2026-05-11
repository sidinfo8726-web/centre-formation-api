# Centre Formation API - Laravel

API REST développée avec Laravel 12 et Sanctum pour la gestion d’un centre de formation.

## Fonctionnalités

- Authentification avec Laravel Sanctum
- Gestion des étudiants
- Gestion des formations
- Gestion des inscriptions
- API sécurisée avec Bearer Token
- CRUD complet
- Relations entre tables MySQL

---

# Technologies utilisées

- Laravel 12
- PHP 8
- MySQL
- Laravel Sanctum
- Postman
- XAMPP

---

# Installation

## Cloner le projet

```bash
git clone URL_DU_PROJET
```

## Installer les dépendances

```bash
composer install
```

## Configurer le fichier .env

Configurer :

```env
DB_DATABASE=centre_formation
DB_USERNAME=root
DB_PASSWORD=
```

## Générer la clé Laravel

```bash
php artisan key:generate
```

## Lancer les migrations

```bash
php artisan migrate
```

## Lancer le serveur

```bash
php artisan serve
```

---

# Authentification

## Register

POST :

```txt
/api/register
```

## Login

POST :

```txt
/api/login
```

Retourne un Bearer Token.

---

# Endpoints API

## Etudiants

| Méthode | Endpoint |
|---|---|
| GET | /api/etudiants |
| POST | /api/etudiants |
| PUT | /api/etudiants/{id} |
| DELETE | /api/etudiants/{id} |

---

## Formations

| Méthode | Endpoint |
|---|---|
| GET | /api/formations |
| POST | /api/formations |
| PUT | /api/formations/{id} |
| DELETE | /api/formations/{id} |

---

## Inscriptions

| Méthode | Endpoint |
|---|---|
| GET | /api/inscriptions |
| POST | /api/inscriptions |

---

# Sécurité

Toutes les routes API principales sont protégées avec :

```txt
auth:sanctum
```

---

# Auteur

Projet réalisé par Abdellatif.