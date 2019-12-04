<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="/js/clappr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />
    <link rel="stylesheet" href="https://vjs.zencdn.net/7.3.0/video-js.min.css">
    <script src="https://vjs.zencdn.net/7.3.0/video.min.js"></script>
    <script src="https://unpkg.com/@videojs/http-streaming@1.11.2/dist/videojs-http-streaming.min.js"></script>

    <title>1001 Nights TV</title>
</head>
<body>
    <div id="app"></div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
