$(document).ready(function() {

    $('.task-checkbox').click(function(event) {
        if (this.checked) {
            //event.preventDefault();
            console.log(this.checked);
            $.post('ajax/checkbox_handler.php', {checked: "checked", taskID: $(this).next().attr('id')} );
            this.setAttribute('checked', 'checked');
            $(this).parent().addClass('list-item-checked');
            //$(this).addClass('list-item-checked');
        } else {
            //event.preventDefault();
            console.log("not checked");
            $.post('ajax/checkbox_handler.php', { checked: "", taskID: $(this).next().attr('id')} );
            this.removeAttribute('checked');
            $(this).parent().removeClass('list-item-checked');
        }

    });
});