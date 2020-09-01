<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <input type="text" id="url">
    <button id="button">おしてください</button>
    <div>
        <h2>ここにテキストを入力</h2>
        <input type="text" id="title">
    </div>
    <div id="image"></div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer>
    </script>
  
    
</body>
</html>