import bastConfig from './base.js';

module.exports = {
    entry: bastConfig.entries,
    output: bastConfig.output,
    module: {
        loaders: bastConfig.loaders
    },
    plugins: bastConfig.plugins
}