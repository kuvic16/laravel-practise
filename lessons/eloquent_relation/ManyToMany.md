# Many to Many relationship

For example a post can have multiple tags. And different post can have same tag. So, we can say, post is associate with tags. On ther hand, tags can have mupltiple post which we can say tag associate with posts.

### In Post table we can

```PHP
public function tags()
{
    return $this->belongsToMany(Tag::class)->withTimestamps();
}
```

### In Tag table

```PHP
public function posts()
{
    return $this->belongsToMany(Post::class)->withTimestamps();
}
```

### Pivot table

To make this relation we need another table which we can call pivot table.

```
post_tag table

Schema::create('post_tag', function (Blueprint $table) {
    $table->primary(['post_id', 'tag_id']);
    $table->unsignedBigInteger('post_id');
    $table->unsignedBigInteger('tag_id');

    $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
    $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

    $table->timestamps();
});
```

### Extract the value

```
$post = App\Post::find(5);
$post->tags;
$post->tags->pluck('name');
```

### Attach and detach the relation

```
$post = App\Post::find(5);
$post->tags()->attach(1);
$post->tags()->detach(1);
```
