var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .styles([
            'libs/bootstrap.css',
            'libs/buttons.css',
            'libs/jquery.dynatable.css'
        ],'./public/css/libs.css')
        .scripts([
            'libs/bootstrap.js',
            'libs/jquery.dynatable.js',
            'libs/select2.min.js'
        ],'./public/js/libs.js')
    ;
});
