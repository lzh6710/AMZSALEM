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
							<label for="itemPackageQuantity" class="control-label col-lg-3">Item Package Quantity</label>
							<div class="col-lg-6">
								<input class="form-control" value="<?php echo $product->itemPackageQuantity ?>" id="itemPackageQuantity" name="itemPackageQuantity" type="text">
								<label for="itemPackageQuantity" class="error"><?php echo form_error('itemPackageQuantity'); ?></label>
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
							<label for="currency" class="control-label col-lg-3">Currency</label>
							<div class="col-lg-6">
								<select id="currency" name="currency">
									<option value="USD" <?php if ($product->currency == 'USD'){?>selected<?php }?>>USD</option>
									<option value="GBP" <?php if ($product->currency == 'GBP'){?>selected<?php }?>>GBP</option>
									<option value="EUR" <?php if ($product->currency == 'EUR'){?>selected<?php }?>>EUR</option>
									<option value="JPY" <?php if ($product->currency == 'JPY'){?>selected<?php }?>>JPY</option>
									<option value="CAD" <?php if ($product->currency == 'CAD'){?>selected<?php }?>>CAD</option>
									<option value="DEFAULT" <?php if ($product->currency == 'DEFAULT'){?>selected<?php }?>>DEFAULT</option>
								</select>
								<label for="currency" class="error"><?php echo form_error('currency'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="MSRP" class="control-label col-lg-3">MSRP</label>
							<div class="col-lg-6">
								<input class="form-control " value="<?php echo $product->MSRP ?>" id="MSRP" name="MSRP" type="text">
								<label for="MSRP" class="error"><?php echo form_error('MSRP'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="mfrPartNumber" class="control-label col-lg-3">MfrPartNumber</label>
							<div class="col-lg-6">
								<input class="form-control " value="<?php echo $product->mfrPartNumber ?>" id="mfrPartNumber" name="mfrPartNumber" type="text">
								<label for="mfrPartNumber" class="error"><?php echo form_error('mfrPartNumber'); ?></label>
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
					<input type="hidden" value="<?php echo $categories;?>" name="categories" />
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