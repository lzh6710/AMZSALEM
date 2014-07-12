<script type="text/javascript" src="<?php echo base_url()?>js/lib/ckeditor/ckeditor.js"></script>

<?php if ($is_edit) { ?>
<script type="text/javascript" src="<?php echo base_url()?>js/product_form.js"></script>
<?php }?>

<div class="row breadcrumb-ct" style="display:none">
	<div class="col-md-12">
		<!--breadcrumbs start -->
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url()?>management"><i class="fa fa-group"></i> Product List</a></li>
			<li class="active"><?php echo $is_edit ? 'Edit Product' : 'Add New Product'?> </li>
		</ul>
		<!--breadcrumbs end -->
	</div>
</div>
<div class="row">	
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<span class="glyphicon glyphicon-th" style="padding-right: 6px;"></span><?php echo $is_edit ? 'Update Product' : 'Create New Product'?>
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
			</header>
			<div class="panel-body">
				<form id="productForm" action="<?php echo base_url()?>product/<?php echo $is_edit ? 'edit' : 'add' ?>" method="POST">
				<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				<div class="form form-horizontal">
						<div class="form-group ">
							<label for="title" class="control-label col-lg-3">Product Name (required)</label>
							<div class="col-lg-6">
								<input class="form-control" value="<?php echo $product->title ?>" id="title" name="title" type="text">
								<label for="title" class="error"><?php echo form_error('title'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="SKU" class="control-label col-lg-3">SKU (required)</label>
							<div class="col-lg-6">
								<input class="form-control" value="<?php echo $product->SKU ?>" id="SKU"  name="SKU"  type="text">
								<label for="SKU" class="error"><?php echo form_error('SKU'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="ASIN" class="control-label col-lg-3">ASIN (required)</label>
							<div class="col-lg-6">
								<input class="form-control" value="<?php echo $product->ASIN ?>" id="ASIN"  name="ASIN"  type="text">
								<label for="ASIN" class="error"><?php echo form_error('ASIN'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="itemPackageQuantity" class="control-label col-lg-3">Item Package Quantity</label>
							<div class="col-lg-6">
								<input class="form-control" value="<?php echo $product->itemPackageQuantity ?>" id="itemPackageQuantity" name="itemPackageQuantity" type="text">
								<label for="itemPackageQuantity" class="error"><?php echo form_error('itemPackageQuantity'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="numberOfItems" class="control-label col-lg-3">Number Of Items</label>
							<div class="col-lg-6">
								<input class="form-control" value="<?php echo $product->numberOfItems ?>" id="numberOfItems" name="numberOfItems" type="text">
								<label for="numberOfItems" class="error"><?php echo form_error('numberOfItems'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="brand" class="control-label col-lg-3">Brand</label>
							<div class="col-lg-6">
								<input class="form-control " value="<?php echo $product->brand ?>" id="brand" name="brand" type="text">
								<label for="brand" class="error"><?php echo form_error('brand'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="country" class="control-label col-lg-3">Country</label>
							<div class="col-lg-6">
								<input class="form-control " value="<?php echo $product->country ?>" id="country" name="country" type="text">
								<label for="country" class="error"><?php echo form_error('country'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="MSRP" class="control-label col-lg-3">MSRP (USD)</label>
							<div class="col-lg-6">
								<input class="form-control " value="<?php echo $product->MSRP ?>" id="MSRP" name="MSRP" type="text">
								<label for="MSRP" class="error"><?php echo form_error('MSRP'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="packageWeight"  class="control-label col-lg-3">Package Weight (KG)</label>
							<div class="col-lg-6">
								<input class="form-control " value="<?php echo $product->packageWeight ?>" id="packageWeight" name="packageWeight" type="text">
								<label for="packageWeight" class="error"><?php echo form_error('packageWeight'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="shippingWeight" class="control-label col-lg-3">Shipping Weight (KG)</label>
							<div class="col-lg-6">
								<input class="form-control " value="<?php echo $product->shippingWeight ?>" id="shippingWeight" name="shippingWeight" type="text">
								<label for="shippingWeight" class="error"><?php echo form_error('shippingWeight'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="manufacturer" class="control-label col-lg-3">Manufacturer</label>
							<div class="col-lg-6">
								<input class="form-control " value="<?php echo $product->manufacturer ?>" id="manufacturer" name="manufacturer" type="text">
								<label for="manufacturer" class="error"><?php echo form_error('manufacturer'); ?></label>
							</div>
						</div>
						<?php $this->load->view('product/'.$categories, $product); ?>
						<div class="form-group ">
							<label for="description" class="control-label col-lg-3">Product Description</label>
							<div class="col-lg-6">
								<textarea class="form-control " name="description" id="description" rows="10" cols="80">
					                <?php echo $product->description ?>
					            </textarea>
								<label for="description" class="error"><?php echo form_error('description'); ?></label>
								<script>
                					CKEDITOR.replace( 'description');
            					</script>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-3 col-lg-6">
								<button class="btn btn-primary" type="submit">Post</button>
								<?php if ($is_edit) { ?>
								<button id="deleteBtn" class="btn btn-danger">Delete</button>
								<input id="urlDelete" type="hidden" value="<?php echo base_url()?>management/delete" />
								<?php }?>
								<button onclick="location.href='<?php echo base_url()?>management'" class="btn btn-default" type="button">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>
<div class="row">
	<div class="admin-bar" id="quick-access">
		<div class="admin-bar-inner">
			<div class="left msg">Are you sure you want to delete this user ?</div>
			<button class="btn btn-danger  btn-ok" type="button"><i class="icon-trash"></i> Yes </button>
			<button class="btn btn-white  btn-cancel" type="button">No</button>
		</div>
	</div>
</div>