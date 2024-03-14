<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js')}}" defer></script>
</head>
<body>
    <div id="app">
        <div>            
            <App-Component></App-Component>
        </div>
        {{-- <div>
            <Header-Component></Header-Component>
            <Footer-Component></Footer-Component>
        </div> --}}
    </div>
</body>
</html>