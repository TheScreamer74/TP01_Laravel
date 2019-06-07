<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Events</title>
</head>
<body>
    <h1>{{ $events->count() }} Events</h1>

    @foreach($events as $event)
        <article>
            <h1>{{ $event->name }}</h1>
            <p>{{ $event->description }}</p>
            <p>{{ format_price($event) }}</p>
            <p>Lieu : {{ $event->location }}</p>
            <p>Date : {!!  $event->starts_at !!}</p>
        </article>
        @if(! $loop->last)
            <hr>
        @endif
    @endforeach
</body>
</html>