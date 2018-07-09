//Submit Newsletter form to PHP file
	$("#footer-form").submit(function(event) {
	    
		//stop form from submitting normally
		event.preventDefault();

		//get some values from elements on the page:
		var $form = $( this );

		$("#footer-form-button").attr("disabled", "disabled");

		//Send the data using post
		var posting = $.post( 'process_form.php', $form.serialize() );

		//Show result
		posting.done(function( data ) {

			$("#footer-form-button").removeAttr('disabled');

			$("#form_newsletter_result").hide().html(data).fadeIn();
		});
	});