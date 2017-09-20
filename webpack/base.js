const glob = require('glob');
const root = __dirname + '/../';

const fileRootPath = root + 'src/AppBundle/Resources/static-src/js/';
let files = glob.sync(fileRootPath + '**/index.js');

let entries = {};
files.forEach(function(f){
   var name = f.replace(fileRootPath, '');
   var name = name.replace('.js', '');
   console.log(name);
   entries[name] = f;
});
entries = Object.assign({}, {'main': fileRootPath + 'main.js'}, entries);

let config = {
    rootPath:root,
    entries: entries
}

export default config;