module.exports = {
    entry: {
       'index': '/private/var/www/blog/src/AppBundle/Resources/src/js/login/index.js'
    },
    output: {
        path: __dirname + "/web/dist",
        filename: "index.js",
        publicPath: __dirname + '/dist/',
    },
}