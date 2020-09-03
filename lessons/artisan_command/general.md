# General Laravel artisan commands

### Open tinker

```
php artisan tinekr
```

### Create a Factory for a model

```
php artisan make:factory PostFactory -m Post
```

### Create a model, migration and factory

```
php artisan make:model Affiliation -m -f
```

### Create a model, migration and controller

```
php artisan make:model Project -mc
```

### Create a controller with all methods

```
php artisan make:controller ProjectsController -r
```

### Call a Facade method

```
App\ExampleFacade::handle();
```
