# Laravel Factory

We can easily create dummy data for specific table using laravel factory

### Create a data using existing factory

```
factory(App\User::class)->create();
```

### Make a factory for a model

```
php artisan make:factory PostFactory -m Post
```

### Pass the relation table id to factory model

```
factory(App\Post::class)->create(['user_id' => 2]);
```
