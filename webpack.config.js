var Encore = require('@symfony/webpack-encore');

Encore
    // React
    .enableReactPreset()
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // Js files.
    .addEntry('js/app', './assets/js/app.js')

    //Css files
    .addStyleEntry('css/general', './assets/css/general.scss')
    .addStyleEntry('css/homepage', './assets/css/homepage.scss')
    .addStyleEntry('css/login','./assets/css/login.scss')
    .addStyleEntry('css/adminblog','./assets/css/adminblog.css')


    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    .autoProvidejQuery()

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()
;

module.exports = Encore.getWebpackConfig();
