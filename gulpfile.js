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

elixir.config.css.autoprefix = {
    enabled: true,
    options: {
        cascade: true,
        browsers: ['last 2 versions', 'safari >= 4', 'ie >= 8', 'opera >= 12', 'ios >= 6', 'android >= 4']
    }
};


elixir(function(mix) {
    mix.sass('mainFront.sass', 'public/css/front/style.css');
    mix.sass('mainBack.sass', 'public/css/back/style.css');
});
