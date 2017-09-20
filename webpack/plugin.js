
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

let plugin = [
    new webpack.BannerPlugin('by tsj'),
    new webpack.HotModuleReplacementPlugin(),
    new ExtractTextPlugin('[name].css', {
        allChunks: true
    },
    new webpack.optimize.CommonsChunkPlugin({
        name:"common",
        minChunks:2
    }),   
)]

export default plugin;