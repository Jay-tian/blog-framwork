import bastConfig from './base.js';
const webpack = require('webpack');
let plugins =  bastConfig.plugins;

plugins.push(new webpack.optimize.UglifyJsPlugin({
    compress: {
    warnings: false
    }
}));

module.exports = {
    entry: bastConfig.entries,
    output: bastConfig.output,
    module: {
        loaders: bastConfig.loaders
    },
    // externals:{
    //     'jquery':'window.$'
    // },
    plugins: plugins
}