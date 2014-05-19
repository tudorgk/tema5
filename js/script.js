
$(document).ready(function(){
	var form = $('form');
	var submit = $('#submit');

    setInterval(function() {
        //send ajax request every second
        $.ajax({
            url: 'get_comments.php',
            type: 'GET',
            cache: false,
            data: form.serialize(),
            success: function(data){
                //replace the comments with data
                $('.comment-block').html(data);
            },
            error: function(e){
                alert(e);
            }
        });
    }, 1000);

	form.on('submit', function(e) {
		// prevent default action
		e.preventDefault();
		// send ajax request
		$.ajax({
			url: 'ajax_comment.php',
			type: 'POST',
			cache: false,
			data: form.serialize(), //form serialize data
			beforeSend: function(){
				// change submit button value text and disabled it
				submit.val('Submitting...').attr('disabled', 'disabled');
			},
			success: function(data){
				// Append with fadeIn see http://stackoverflow.com/a/978731
				var item = $(data).hide().fadeIn(800);
				$('.comment-block').append(item);

				// reset form and button
				form.trigger('reset');
				submit.val('Submit Comment').removeAttr('disabled');
			},
			error: function(e){
				alert(e);
			}
		});
	});
});