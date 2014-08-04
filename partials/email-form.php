<?php global $list_id;
	if (!$list_id) {
		$list_id = "30917256";
	} 
?>

<form class="input-group input-group-lg form-horizontal email-form" method="post" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" data-listid="<?php echo $list_id; ?>">
	<input type="hidden" name="thx" value="<%= baseurl %>/?email-signup-result=success"/>
	<input type="hidden" name="err" value="<%= baseurl %>/?email-signup-result=error"/>
	<input type="hidden" name="usub" value="<%= baseurl %>/?email-signup-result=unsubscribe"/>
	<input type="hidden" name="MID" value="10415228"/>
	<input type="hidden" name="SubAction" value="sub_add_update"/>
	<input type="hidden" name="Email Type" value="HTML"/>
	<div class="form-group email-group">
		<div class="input-group">
			<input type="email" class="form-control" placeholder="Email Address" name="email" required autocomplete="off"/>
            <span class="input-group-btn submit-btn-wrap">
                <input type="submit" class="btn btn-default solid primary" value="Submit"/>
            </span>
		</div>
	</div>
    <div class="message-container">
        <p class="success"><span class="glyphicon glyphicon-ok"></span>Your email has been successfully submitted!</p>
        <p class="error"><span class="glyphicon glyphicon-remove"></span>Sorry, but an error has occurred. Please try again later!</p>
    </div>
</form>