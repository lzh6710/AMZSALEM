<div class="clearfix fill">
	<div class="btn-group">
		<a id="openEditPrice">
			<button class="btn btn-primary">
				Update Price<i class="fa fa-plus"></i>
			</button>
		</a>
		<a id="openEditQuantity">
			<button class="btn btn-success">
				Update Quantity <i class="fa fa-plus-circle"></i>
			</button>
		</a>
	</div>
</div>
<div id="priceControl" style="display:none;">
	<form id="priceForm">
		<div class="form form-horizontal">
			<h3>Edit Price</h3>
			<div class="form-group ">
				<label for="title" class="control-label col-lg-3">Price</label>
				<div class="col-lg-6">
					<input class="form-control" value="<?php echo $product->price ?>" id="price" name="price" type="text">
					<label for="price" class="error"><?php echo form_error('price'); ?></label>
				</div>
			</div>
			<div class="form-group ">
				<label for="Currency" class="control-label col-lg-3">Currency</label>
				<div class="col-lg-6">
					<select id="currency" name="currency">
						<option value="USD" <?php if ($product->price == 'USD'){?>selected<?php }?>>USD</option>
						<option value="GBP" <?php if ($product->price == 'GBP'){?>selected<?php }?>>GBP</option>
						<option value="EUR" <?php if ($product->price == 'EUR'){?>selected<?php }?>>EUR</option>
						<option value="JPY" <?php if ($product->price == 'JPY'){?>selected<?php }?>>JPY</option>
						<option value="CAD" <?php if ($product->price == 'CAD'){?>selected<?php }?>>CAD</option>
						<option value="DEFAULT" <?php if ($product->price == 'DEFAULT'){?>selected<?php }?>>DEFAULT</option>
					</select>
					<label for="currency" class="error"><?php echo form_error('currency'); ?></label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-offset-3 col-lg-6">
					<button id="updatePrice" class="btn btn-primary" type="button">Update</button>
					<button id="cancelPrice" class="btn btn-default" type="button">Cancel</button>
				</div>
			</div>
		</div>
	</form>
</div>

<script src="/js/price_quantity_edit.js"></script>