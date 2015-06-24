<?php include 'templates/header.html'; ?>

<!-- Success and error messages are hidden, but will appear as needed. -->
<div class="alert alert-success" id="success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	Success! Your message was sent.
</div>
<div class="alert alert-danger alert-error" id="error" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	Please provide a valid email address and message.
</div>

<?php include 'templates/navigation.html'; ?>

<div class="jumbotron">
	<h1>Contact</h1>
	<hr>
	<div class="row">
		<!-- Contact form -->
		<div class="col-lg-8" style="margin-bottom: 25px;">
			<form id="contact-form">
				<div class="form-group lead">
					<label for="email">Your Email Address</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="e.g. you@email.com">
				</div>
				<div class="form-group lead">
					<label for="message">Message</label>
					<textarea rows="8" class="form-control" name="message" id="message" placeholder="Use this space to write a message to Brady&nbsp;Forcier."></textarea>
				</div>
				<button type="submit" id="send" class="btn btn-default">Send</button>
			</form>
		</div>
		<!-- Additional contact information -->
		<div class="col-lg-3" class="lead">
			<address>
 				<strong>Brady Forcier</strong><br>
 				200 Pleasant Street<br>
 				Middleton, MA 01234<br>
 				brady@forcier.com <br>
 				666-666-6666
			</address>
		</div>
	</div>
</div>

<?php include 'templates/footer.html'; ?>

<script>
	$(document).ready(function() {
		// Validates form on submit
		$('#send').click(function() {
			$('#contact-form').validate();
		});
	}); // End doc ready

	$('#contact-form').validate({
		// Only enables form to validate on submit
		onkeyup: false,
		onclick: false,
		// Validation rules
		rules: {
			email: {
				required: true,
				email: true
			},
			message: {
				required: true
			}
		},
		// Handles where to put the error message - error msg shown, success msg hidden
		errorPlacement: function(error, element) {
			$('#error').css('display', 'block');
			$('#success').css('display', 'none');
		},
		// Handles submitting the form if it validates
		submitHandler: function(form) {
			var url = 'send_msg.php'; // Script that handles sending the email				

			// Ajax request to send email
			$.ajax({
				type: 'POST',
				url: url,
				data: $('#contact-form').serialize(), // Serializes the form's elements
				error: function(data) {
					// If fails, error msg shown, success msg hidden
					$('#error').css('display', 'block')
					$('#success').css('display', 'none');
				},
				success: function(data) {
					// If success, clear form and show success message, hide error msg
					$('#email').val('');
					$('#message').val('');
					$('#success').css('display', 'block');
					$('#error').css('display', 'none');
				}
			}); // End ajax
		} // End submit handler
	}); // End validation
</script>
</body>
</html>