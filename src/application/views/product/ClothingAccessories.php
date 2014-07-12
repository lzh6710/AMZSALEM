<div class="form-group ">
	<label for="department" class="control-label col-lg-3">Department</label>
	<div class="col-lg-6">
		<input class="form-control " value="<?php echo $product->department ?>" id="department" name="department" type="text">
		<label for="department" class="error"><?php echo form_error('department'); ?></label>
	</div>
</div>
<div class="form-group ">
	<label for="colorMap" class="control-label col-lg-3">ColorMap</label>
	<div class="col-lg-6">
		<input class="form-control " value="<?php echo $product->colorMap ?>" id="colorMap" name="colorMap" type="text">
		<label for="colorMap" class="error"><?php echo form_error('colorMap'); ?></label>
	</div>
</div>
