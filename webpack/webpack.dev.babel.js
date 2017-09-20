import bastConfig from './base.js';

module.exports = {
    devtool: 'source-map',
    entry: bastConfig.entries,
    output: bastConfig.output,
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