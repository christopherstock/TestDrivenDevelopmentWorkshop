
## Tech Stack
- Composer 2.1.11
- PHP 8.0.12
- Symfony 5.3.10
- PHPUnit 9.5.10

## Software Requirements
- PHP >= 7.3
- Composer 2.x

## Fix Composer Installation
```
export COMPOSER_MEMORY_LIMIT=-1
composer install
```

# Installation

## Install Symfony API
```
composer create-project symfony/website-skeleton tdd-example
```

## Show Symfony Framework Information
```
php bin/console about
```

# Adding new Pages
Simply by adding new classes to **Controller**.
Find examples in these two files:
```
config/routes.yaml
src/Controller/UserController.php
```

# Annotations
supported since Symfony 5 and makes the use of `config/routes.yaml` obsolete.

# Frontend-Tests for Routes
Open these URLs in your browser and test the results:
```
http://localhost:1234/
http://localhost:1234/lucky/number
http://localhost:1234/user
http://localhost:1234/html
```

## Talend API Tester
Can be used to specify API-test cases.
https://chrome.google.com/webstore/detail/talend-api-tester-free-ed/aejoelaoggembcahagimdiliamlcdmfm

## Selenium IDE
Can be used to specify automated browser test cases.
https://chrome.google.com/webstore/detail/selenium-ide/mooikfkahbdckldjjndioackbalphokd

# Possible Enhancements
- Symfony Forms (user input fields + button etc)
- Add application tests with the Symfony test crawler
- Add external selenium UI-tests
- Add local SQLLite database for integration tests
