# One to Many Relation

### Example of relation

-   A user can have many post
-   A post can have many comments
-   A project can have many tasks
-   A user can have many jobs
-   A user can have many achievements

### Make a relation in parent model

```php
public function posts()
{
    return $this->hasMany(App\Post::class);
}
```

### Tinker command to get the all posts of the user

```
$user = App\User::find(2);
$user->posts;
```
