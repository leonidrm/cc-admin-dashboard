const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

/*
 |--------------------------------------------------------------------------
 | Core
 |--------------------------------------------------------------------------
 |
 */

mix.scripts([
    'node_modules/jquery/dist/jquery.js',

], 'public/assets/app/js/app.js').version();

mix.styles([
    'node_modules/font-awesome/css/font-awesome.css',

], 'public/assets/app/css/app.css').version();

mix.copy([
    'node_modules/font-awesome/fonts/',
], 'public/assets/app/fonts');

/*
 |--------------------------------------------------------------------------
 | Auth
 |--------------------------------------------------------------------------
 |
 */

mix.styles('resources/assets/auth/css/login.css', 'public/assets/auth/css/login.css').version();
mix.styles('resources/assets/auth/css/register.css', 'public/assets/auth/css/register.css').version();
mix.styles('resources/assets/auth/css/passwords.css', 'public/assets/auth/css/passwords.css').version();

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/gentelella/vendors/animate.css/animate.css',
    'node_modules/gentelella/build/css/custom.css',
], 'public/assets/auth/css/auth.css').version();

/*
 |--------------------------------------------------------------------------
 | Admin
 |--------------------------------------------------------------------------
 |
 */

mix.scripts([
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js',
    'node_modules/gentelella/build/js/custom.js',
    'node_modules/guidechimp/dist/guidechimp.min.js',
    'node_modules/guidechimp/dist/plugins/multiPage.js',
    'node_modules/select2/dist/js/select2.full.js',
    'node_modules/bootstrap4-toggle/js/bootstrap4-toggle.min.js',
    'resources/assets/admin/js/admin.js',
], 'public/assets/admin/js/admin.js').version();

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/gentelella/vendors/animate.css/animate.css',
    'node_modules/gentelella/build/css/custom.css',
    'node_modules/guidechimp/dist/guidechimp.min.css',
    'node_modules/select2/dist/css/select2.css',
    'node_modules/bootstrap4-toggle/css/bootstrap4-toggle.min.css',
    'resources/assets/admin/css/admin.css',
], 'public/assets/admin/css/admin.css').version();

mix.copy([
    'node_modules/gentelella/vendors/bootstrap/dist/fonts',
], 'public/assets/admin/fonts');

mix.scripts([
    'resources/assets/admin/js/users.js',
], 'public/assets/admin/js/users.js').version();

mix.scripts([
    'resources/assets/admin/js/companies.js',
], 'public/assets/admin/js/companies.js').version();

mix.scripts([
    'resources/assets/admin/js/industries.js',
], 'public/assets/admin/js/industries.js').version();

mix.scripts([
    'resources/assets/admin/js/campaign.js',
], 'public/assets/admin/js/campaign.js').version();

mix.scripts([
    'node_modules/gentelella/vendors/Flot/jquery.flot.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.time.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.pie.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.stack.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.resize.js',

    'node_modules/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js',
    'node_modules/gentelella/vendors/DateJS/build/date.js',
    'node_modules/gentelella/vendors/flot.curvedlines/curvedLines.js',
    'node_modules/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js',

    'node_modules/gentelella/production/js/moment/moment.min.js',
    'node_modules/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js',

    'node_modules/gentelella/vendors/Chart.js/dist/Chart.js',
    'node_modules/jcarousel/dist/jquery.jcarousel.min.js',

    'resources/assets/admin/js/dashboard.js',
], 'public/assets/admin/js/dashboard.js').version();

mix.styles([
    'node_modules/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css',
    'resources/assets/admin/css/dashboard.css',
], 'public/assets/admin/css/dashboard.css').version();

/*
 |--------------------------------------------------------------------------
 | Member
 |--------------------------------------------------------------------------
 |
 */

mix.scripts([
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js',
    'node_modules/gentelella/build/js/custom.js',
    'node_modules/guidechimp/dist/guidechimp.min.js',
    'node_modules/guidechimp/dist/plugins/multiPage.js',
    'node_modules/select2/dist/js/select2.full.js',
    'node_modules/bootstrap4-toggle/js/bootstrap4-toggle.min.js',
    'resources/assets/member/js/member.js',
], 'public/assets/member/js/member.js').version();

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/gentelella/vendors/animate.css/animate.css',
    'node_modules/gentelella/build/css/custom.css',
    'node_modules/guidechimp/dist/guidechimp.min.css',
    'node_modules/select2/dist/css/select2.css',
    'node_modules/bootstrap4-toggle/css/bootstrap4-toggle.min.css',
    'resources/assets/member/css/member.css',
], 'public/assets/member/css/member.css').version();

mix.copy([
    'node_modules/gentelella/vendors/bootstrap/dist/fonts',
], 'public/assets/member/fonts');

mix.scripts([
    'node_modules/gentelella/vendors/Flot/jquery.flot.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.time.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.pie.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.stack.js',
    'node_modules/gentelella/vendors/Flot/jquery.flot.resize.js',

    'node_modules/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js',
    'node_modules/gentelella/vendors/DateJS/build/date.js',
    'node_modules/gentelella/vendors/flot.curvedlines/curvedLines.js',
    'node_modules/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js',

    'node_modules/gentelella/production/js/moment/moment.min.js',
    'node_modules/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js',

    'node_modules/gentelella/vendors/Chart.js/dist/Chart.js',
    'node_modules/jcarousel/dist/jquery.jcarousel.min.js',

    'resources/assets/member/js/dashboard.js',
], 'public/assets/member/js/dashboard.js').version();

mix.styles([
    'node_modules/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css',
    'resources/assets/member/css/dashboard.css',
], 'public/assets/member/css/dashboard.css').version();
