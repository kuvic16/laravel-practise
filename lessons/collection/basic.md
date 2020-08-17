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

## Collection filter

```PHP
$items = collect([1,2,3,4,5,6,7,8,9,10]);
$items->filter(function($item) { return $item >= 5;});
$items->filter(function($item) { return $item % 2 === 0;});
```

## Chaining collection form

```PHP
$items->filter(function($item) { return $item % 2 === 0;})->map(function($item) { return $item * 3; });
$items->filter(function($item) { return $item % 2 === 0;})->map(function($item) { return $item * 3; })->last();
```

## Practical example

```PHP
Get all articles with tags
$articles = App\Article::with('tags')->get();
$articles->pluck('title');
$articles->pluck('tags');
$articles->pluck('tags')->collapse(); // similar flatten
$articles->pluck('tags')->collapse()->pluck('name');
$articles->pluck('tags')->collapse()->pluck('name')->unique();
$articles->pluck('tags.*.name');
$articles->pluck('tags.*.name')->collapse()->unique();
$articles->pluck('tags.*.name')->collapse()->unique()->map(function($item){return ucwords($item);});
```
