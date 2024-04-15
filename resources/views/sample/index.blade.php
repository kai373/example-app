<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-50">
  <x-layout.single>
    <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">つぶやきアプリ</h2>
    <x-tweet.form.post></x-tweet.form.post>
    @foreach($tweets as $tweet)
      @foreach($tweet->images as $image)
        <p>{{ $image->name }}</p>
      @endforeach
    @endforeach
    <x-tweet.list :tweets="$tweets"></x-tweet.list>
  </x-layout.single>
</body>

</html>