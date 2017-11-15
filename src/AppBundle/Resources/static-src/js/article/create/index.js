import './../../../less/page/article-create.less'
let $form = $('#article');
let testEditor = editormd({
    id: 'editormd',
    path: "../../libs/editor.md/lib/",
    height: '100%',
    width: '100%',
    imageUpload: true,
});

document.onkeydown=function(e)   {
    if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        $.post($form.attr('action'), function(message){
            console.log(message);
        });
        alert();
        return false;
    }
}