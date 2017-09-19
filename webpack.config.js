const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const glob = require('glob');

const fileRootPath = './src/AppBundle/Resources/static-src/js/';
let files = glob.sync(fileRootPath + '**/index.js');

let entries = {};
files.forEach(function(f){
   var name = f.replace(fileRootPath, '');
   entries[name] = f;
});

entries = Object.assign({}, {'main': './src/AppBundle/Resources/static-src/js/main.js'}, entries);

module.exports = {
    devtool: 'source-map',
    entry: entries,
    output: {
        path: __dirname + "/web/dist", 
        filename: "[name].js",
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
        loaders: [
            {
                test: /\.less$/,
                loader: ExtractTextPlugin.extract(
                    'css-loader?sourceMap!' +
                    'less-loader?sourceMap' 
                )
            },
            {
                test: /\.jsx?$/,
                exclude: /(node_modules|bower_components)/,
                loader: 'babel-loader',
                query: {
                    cacheDirectory: true,
                    presets: ['stage-0', 'es2015'],
                    plugins: ['transform-runtime']
                }
            },
            { test: /\.eot(\?v=\d+\.\d+\.\d+)?$/, loader: "file" },
            { test: /\.(woff|woff2)$/, loader:"url?prefix=font/&limit=5000" },
            { test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/, loader: "url?limit=10000&mimetype=application/octet-stream" },
            { test: /\.svg(\?v=\d+\.\d+\.\d+)?$/, loader: "url?limit=10000&mimetype=image/svg+xml" }
        ]
    },
    plugins:[
        new webpack.BannerPlugin('by tsj'),
        new webpack.HotModuleReplacementPlugin(),
        new ExtractTextPlugin('[name].css', {
            allChunks: true
        })
    ],
}