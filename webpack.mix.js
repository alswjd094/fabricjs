const mix = require('laravel-mix');
//resources/js/app.js 파일을 컴파일하여 번들링(js파일 합치기)후 가져와서 
//public/js 디렉토리에 컴파일된 자바스크립트 파일로 저장하는 역할
mix.js('resources/js/app.js', 'public/js')
.vue({
    version:3,
});