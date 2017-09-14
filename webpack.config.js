var webpack = require('webpack');
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
    ],
    devServer: {
        contentBase: __dirname + "/dist",
        port: 3032,
        inline: false,
        historyApiFallback: true,
        hot: true,
        stats: 'normal',
    },
}