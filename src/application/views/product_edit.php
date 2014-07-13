<link rel="stylesheet" href="/css/jquery.fileupload.css">
<div class="row breadcrumb-ct" style="display:none">
	<div class="col-md-12">
		<!--breadcrumbs start -->
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url()?>management"><i class="fa fa-group"></i> Product List</a></li>
			<li class="active"><?php echo 'Edit Product';?> </li>
		</ul>
		<!--breadcrumbs end -->
	</div>
</div>
<div class="row">	
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<span class="glyphicon glyphicon-th" style="padding-right: 6px;"></span><?php echo 'Update Product';?>
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
			</header>
			<div class="panel-body">
				<div class="col-lg-8">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td>Product Name</td>
								<td><?php echo $product->title; ?></td>
							</tr>
							<tr>
								<td>Item Package Quantity</td>
								<td><?php echo $product->itemPackageQuantity; ?></td>
							</tr>
							<tr>
								<td>Brand</td>
								<td><?php echo $product->brand; ?></td>
							</tr>
							<tr>
								<td>Country</td>
								<td><?php echo $product->country; ?></td>
							</tr>
							<tr>
								<td>MSRP (USD)</td>
								<td><?php echo $product->MSRP; ?></td>
							</tr>
							<tr>
								<td>Manufacturer</td>
								<td><?php echo $product->manufacturer; ?></td>
							</tr>
							<tr>
								<td>Product Description</td>
								<td><?php echo $product->description; ?></td>
							</tr>
						</tbody>
					</table>
					<?php  $this->load->view('product/'.$categories.'_edit', $product); ?>
				</div>
				<?php  $this->load->view('product/upload_image', $product); ?>
			</div>
			<input type="hidden" name="SKU" value="<?php echo $product->SKU;?>" />
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