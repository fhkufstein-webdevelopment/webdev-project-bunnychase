<div class="row">
	<form method="<?php if($this->id): ?>put<?php else: ?>post<?php endif; ?>" action="api/address/" class="col-xs-12">

		<div class="form-group">
			<label for="firstname">Vorname:</label>
			<input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $this->firstname; ?>">
		</div>
		<div class="form-group">
			<label for="lastname">Nachname:</label>
			<input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $this->lastname; ?>">
		</div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $this->email; ?>">
        </div>

        <div class="form-group">
            <label for="nickname">Nickname:</label>
            <input type="text" name="nickname" class="form-control" id="nickname" value="<?php echo $this->nickname; ?>">
        </div>

		<?php if($this->id): ?>
			<input type="hidden" name="id" value="<?php echo $this->id; ?>">
		<?php endif; ?>
	</form>
</div>
<script type="text/javascript">

	var editModal = $('#editModal');

	editModal.find('form').unbind('submit');

	editModal.find('form').bind('submit', function(e, that) {

		e.preventDefault();

		editModal.find('.btn-primary').prop('disabled', true);

		hasError = false;

		if(typeof that === 'undefined') {
			that = editModal.find('.btn-primary').get(0);
		}

		var requiredFields = ['#firstname', '#lastname', '#street', '#zip', '#city'];

		for(var i = 0; i < requiredFields.length; i++) {
			if($(requiredFields[i]).val() == '') {
				hasError = true;
				$(requiredFields[i]).closest('.form-group').addClass('has-error');
			}
		}

		if(!hasError)
		{
			$.ajax({
				'url': $(this).attr('action'),
				'method': $(this).attr('method'),
				'data': $(this).serialize(),
				'dataType': "json",
				'success': function (receivedData) {

					if(receivedData.result)
					{
						window.setTimeout(function() {
							location.reload();
						}, 500);

					}
					else
					{
						editModal.find('.form-group').removeClass('has-error');

						$.each(receivedData.data.errorFields, function(key, value) {
							$('#'+key).closest('.form-group').addClass('has-error');
						});
					}

					editModal.find('.btn-primary').prop('disabled', false);
				}
			});
		}
		else
		{
			editModal.find('.btn-primary').prop('disabled', false);
		}

	});

</script>