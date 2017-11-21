class Article {
    constructor($form){
        this.form = $form;
    }
    save() {
        let $form = this.form;
        $.post($form.attr('action'), $form.serialize(), function(message){
            if (message.error) {
                alert(message.error);
            }
            $form.find('#article-id').val(message.id);
        });
       
    }
}

export default Article;