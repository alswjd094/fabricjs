<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>라라벨과 뷰 연동하기</title>
    </head>
    <body>
        <div id="app"></div>
    </body>
		<!-- public 경로 -->
    <script src="{{asset('./js/app.js')}}"></script>
</html>