import './../../../less/page/article-create.less'
import Article from './article.js';
let $form = $('#article');
let testEditor = editormd({
    id: 'editormd',
    path: "../../libs/editor.md/lib/",
    height: '100%',
    width: '100%',
    imageUpload: true,
});

let article = new Article($form);
document.onkeydown=function(e)   {
    if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        article.save();
        return false;
    }
}