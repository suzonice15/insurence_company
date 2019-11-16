<div class="box-body">
	<div class="form-group "><label for="media_title">Name<span class="required">*</span></label>
		<input
			type="text" required class="form-control" name="user_name"  value="<?php if(isset($user)) { echo $user->user_name;}?>"	>
		<input
			type="hidden"  class="form-control" name="user_id"  value="<?php if(isset($user)) { echo $user->user_id;}?>"	>


	</div>

	<div class="form-group "><label for="media_title">Phone<span class="required">*</span></label>
		<input
			type="text" required class="form-control" name="user_phone"  value="<?php if(isset($user)) { echo $user->user_phone;}?>"	>


	</div>

	<div class="form-group "><label for="media_title">Email<span class="required">*</span></label>
		<input
			type="text" id="user_email" required class="form-control" name="user_email" value="<?php if(isset($user)) { echo $user->user_email;}?>"	>

<span id="user_email_error"></span>
	</div>

	<div class="form-group "><label for="media_title">User Status<span class="required">*</span></label>
		<select name="user_status" class="form-control">
			<option value="active">Active</option>
			<option value="visible">Inactive</option>
		</select>
	</div>
	<div class="form-group "><label for="media_title">User Status<span class="required">*</span></label>
		<select name="user_type" class="form-control">
			<option  >User type</option>
			<option value="office-staff">Employe</option>
			<option value="admin">Admin</option>
		</select>
	</div>
	<div class="form-group">
		<label for="billing_name">City<span class="text-danger">*</span></label>

		<select required name="district_name" id="city" class="form-control">
			<option value="">select city</option>
			<?php foreach ($districts as $row) : ?>
				<option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group "><label for="media_title">Password</label>
		<input
			type="password"  class="form-control" name="user_pass" 	>


	</div>

	<?php if(isset($user)) :?>
	<div class="form-group featured-image">
		<label>Picture</label>
		<img width="250" height="100" src="<?php echo base_url();echo $user->user_picture?>">

	</div>

	<?php endif;?>
	<div class="form-group featured-image">
		<label>Picture</label>
		<input
			   type="file" class="form-control" name="user_picture">

	</div>
</div>
