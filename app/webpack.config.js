const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/vue/app.js')

    //.splitEntryChunks()
    .disableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    .enableSassLoader()
    .enableVueLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()
;

module.exports = Encore.getWebpackConfig();
