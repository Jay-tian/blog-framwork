import bastConfig from './base.js';

module.exports = {
    devtool: 'eval-source-map',
    entry: bastConfig.entries,
    output: bastConfig.output,
    // externals:{
    //     'jquery':'window.jQuery'
    // },
    devServer: {
        contentBase: __dirname + "/dist",
        port: 3032,
        inline: false,
        historyApiFallback: false,
        hot: true,
        stats: 'normal',
    },
    module: {
        loaders: bastConfig.loaders
    },
    plugins: bastConfig.plugins
}