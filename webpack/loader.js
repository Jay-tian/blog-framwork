const ExtractTextPlugin = require('extract-text-webpack-plugin');

let loader = [
    {
        test: /\.less$/,
        loader: ExtractTextPlugin.extract(
            'css-loader!' +
            'less-loader' 
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
];

export default loader;