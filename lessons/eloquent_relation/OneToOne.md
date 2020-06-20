# One to One relation

## tinker command

### Find the relation model

```php
$user = App\User::first();
$user->profile;
$user->profile->github_url;
```

### listen sql query

```php
DB::listen(function($sql) {
    var_dump($sql->sql, $sql->bindings);
});
$user = App\User::first();
```

### Enable query log

```php
DB::enableQueryLog();
$user = App\User::first();
$user->profile;
DB::getQueryLog();
```

### DB Migration rollback command

```php
php artisan migrate:rollback
```
