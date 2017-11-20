class article {
    constructor($form){
        this.form = $form;
    }
    save() {
        let $form = this.form;
        $.post($form.attr('action'), $form.serialize(), function(message){
            $form.find('#article-id').val(message.id);
            
        });
       
    }
}

export default article;