<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contentful Test</title>

    <style></style>
</head>
<body>

    <div id="app">
        <SyncPosts></SyncPosts>
    </div>

    <div class="posts">
        @foreach ($posts as $post)
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach
    </div>

    <script type="text/javascript">
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        }
    </script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>
</html>
