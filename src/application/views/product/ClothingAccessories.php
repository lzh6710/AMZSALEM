
<div class="form-group ">
	<label for="parentage" class="control-label col-lg-3">Parentage</label>
	<div class="col-lg-6">
		<select id="parentage" name="productData[Parentage]">
			<option value="parent" <?php if (array_value($product->productData, 'Parentage') == 'parent'){?>selected<?php }?>>Parent</option>
			<option value="child" <?php if (array_value($product->productData, 'Parentage') == 'child'){?>selected<?php }?>>Child</option>
		</select>
		<label for="parentage" class="error"><?php echo form_error('parentage'); ?></label>
	</div>
</div>
<div class="form-group ">
	<label for="size" class="control-label col-lg-3">Size</label>
	<div class="col-lg-6">
		<input class="form-control " value="<?php echo array_value($product->productData, 'Size'); ?>" id="size" name="productData[Size]" type="text">
		<label for="size" class="error"><?php echo form_error('size'); ?></label>
	</div>
</div>
<div class="form-group ">
	<label for="color" class="control-label col-lg-3">Color</label>
	<div class="col-lg-6">
		<input class="form-control " value="<?php echo array_value($product->productData,'Color'); ?>" id="color" name="productData[Color]" type="text">
		<label for="color" class="error"><?php echo form_error('color'); ?></label>
	</div>
</div>

<div class="form-group ">
	<label for="variationTheme" class="control-label col-lg-3">VariationTheme</label>
	<div class="col-lg-6">
		<select id="variationTheme" name="productData[VariationTheme]">
			<option value="Size" <?php if (array_value($product->productData, 'VariationTheme') == 'Size'){?>selected<?php }?>>Size</option>
			<option value="Color" <?php if (array_value($product->productData, 'VariationTheme') == 'Color'){?>selected<?php }?>>Color</option>
			<option value="SizeColor" <?php if (array_value($product->productData, 'VariationTheme') == 'SizeColor'){?>selected<?php }?>>SizeColor</option>
		</select>
		<label for="variationTheme" class="error"><?php echo form_error('variationTheme'); ?></label>
	</div>
</div>

<div class="form-group ">
	<label for="department" class="control-label col-lg-3">Department</label>
	<div class="col-lg-6">
		<input class="form-control " value="<?php echo array_value($product->productData,'Parentage'); ?>" id="department" name="productData[Department]" type="text">
		<label for="department" class="error"><?php echo form_error('department'); ?></label>
	</div>
</div>
<div class="form-group ">
	<label for="colorMap" class="control-label col-lg-3">ColorMap</label>
	<div class="col-lg-6">
		<input class="form-control " value="<?php echo array_value($product->productData,'ColorMap'); ?>" id="colorMap" name="productData[ColorMap]" type="text">
		<label for="colorMap" class="error"><?php echo form_error('colorMap'); ?></label>
	</div>
</div>
<div class="form-group ">
	<label for="specialSizeType" class="control-label col-lg-3">SpecialSizeType</label>
	<div class="col-lg-6">
		<input class="form-control " value="<?php echo array_value($product->productData,'SpecialSizeType'); ?>" id="specialSizeType" name="productData[SpecialSizeType]" type="text">
		<label for="specialSizeType" class="error"><?php echo form_error('specialSizeType'); ?></label>
	</div>
</div>
