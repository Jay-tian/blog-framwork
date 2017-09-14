var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
let extractLESS = new ExtractTextPlugin('[name].less');
module.exports = {
    entry: {
       'index': '/private/var/www/blog/src/AppBundle/Resources/src/js/login/index.js'
    },
    output: {
        path: __dirname + "/web/dist",
        filename: "index.js",
        publicPath: "http://localhost:3032/dist",
    },
    plugins:[
        new webpack.BannerPlugin('by tsj'),
        new webpack.HotModuleReplacementPlugin(),
        new ExtractTextPlugin("[name].css")
    ],
    devServer: {
        contentBase: __dirname + "/dist",
        port: 3032,
        inline: false,
        historyApiFallback: true,
        hot: true,
        stats: 'normal',
    },
    module:  {
        loaders:  [
                {
                test: /\.css$/,
                loader:  ExtractTextPlugin.extract("style-loader","css-loader")
            },
                {
                test:  /\.scss$/,
                loader:  "style-loader!css-loader!sass-loader"
            },
                {
                test:  /\.less$/,
                loader:  "style-loader!css-loader!less-loader"
            },
        ]
    },
}