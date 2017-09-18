const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    devtool: 'source-map',
    entry: {
       'index': '/private/var/www/blog/src/AppBundle/Resources/src/js/login/index.js'
    },
    output: {
        path: __dirname + "/web/dist",
        filename: "index.js",
        publicPath: "http://localhost:3032/dist",
    },

    devServer: {
        contentBase: __dirname + "/dist",
        port: 3032,
        inline: true,
        historyApiFallback: false,
        hot: true,
        stats: 'normal',
    },
    module: {
        rules: [
            {
                test: /\.less$/,
                use: ExtractTextPlugin.extract({
                fallback: "style-loader",
                use: "less-loader!css-loader"
                })
            }
        ]
    },
    plugins:[
        new webpack.BannerPlugin('by tsj'),
        new webpack.HotModuleReplacementPlugin(),
        new ExtractTextPlugin({
            filename: '[name].css',
            allChunks: true,
        }),
    ],
}