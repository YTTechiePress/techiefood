jQuery(document).ready(function($){
    $('.food-add-btn').click(function(e){
        e.preventDefault();
        console.log('Form Submitted');

        var formSelected = e.currentTarget.parentElement;

        var values = Array.from( document.querySelectorAll( 'input[type=checkbox]:checked' )).map(item=>item.value);

        values.forEach(value => {
        });
        
        $.ajax({
            url: 'http://localhost:10013/?add-to-cart=' + value,
            type: 'post',
            success: function(res){
                console.log(res);
            },
            error: function(err){
                console.log(err);
            },
        });

        // console.log(formSelected);
        // console.log(values);
        
    });
});