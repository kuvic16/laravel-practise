{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>It Works Again! {{$topic}}</h1>
</body>
</html> --}}


@component('mail::message')
# A heading

This is just another sentence to show something.

- A list
- gies
- i mmm
@component('mail::button', ['url' => 'https://sheemoul.wordpress.com'])
Visit My Blog
@endcomponent

@endcomponent