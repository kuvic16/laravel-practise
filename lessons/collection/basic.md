# Basic collection

```PHP
$tags = App\Article::first()->tags;
$tags->first();
$tags->last();
$tags->where('name', 'ad');
$tags->first(function($tag){ return strlen($tag->name) > 5; }); // give the first tag where tag name length is more than 5
$tags->first(function($tag){ return strlen($tag->name) < 5; }); // give the first tag where tag name length is less than 5
collect(['one', 'two', 'three'])
collect(['one', 'two', 'three'])->first()
collect(['one', 'two', 'three', ['four', 'five', ['six', 'seven']]])
```

## Common collection we can use in our application

-   filter
-   map
-   flatmap
-   where
-   merge
