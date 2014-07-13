<script type="text/javascript" src="<?php echo base_url()?>js/product_list.js"></script>
<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				Product List
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-cog"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				 </span>
			</header>
			<div class="panel-body">
				<div class="clearfix fill">
					<div class="btn-group">
					<a href="<?php echo base_url()?>product/categories">
						<button id="editable-sample_new" class="btn btn-primary">
							Add New <i class="fa fa-plus"></i>
						</button>
						
						<button id="refresh_status" class="btn btn-success">
							Refresh Status <i class="fa fa-plus-circle"></i>
						</button>
					</a>
					</div>
					<div class="btn-group pull-right dropdown">
						<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right">
							<li><a href="#">Print</a></li>
							<li><a href="#">Save as PDF</a></li>
							<li><a href="#">Export to Excel</a></li>
						</ul>
					</div>
				</div>
				<table id="productTable" class="table table-hover table-striped general-table">
					<thead>
					<tr>
						<th>SKU</th>
						<th>Categories</th>
						<th>Product Name</th>
						<th>Price (USD)</th>
						<th>Status</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ($product_list as $product) : ?>
						<tr>
							<td>
								<a class="edit" href="javascript:void(0);">
									<?php echo $product->SKU?>
									<input type=hidden value="<?php echo $product->SKU?>">
								</a>
							</td>
							<td><?php echo $product->categories?></td>
							<td><?php echo $product->title?></td>
							<td class="MSRP"><?php echo $product->MSRP?></td>
							<td>
								<?php if ($product->feedStatus == "_SUCCESS_") { ?> 
									<span class="label label-success label-mini"> Active </span>
								<?php } else if ($product->feedStatus == "_FAIL_") { ?> 
								<span class="label label-danger label-mini"> Fail </span>
									<?php } else {?> 
								<span class="label label-warning label-mini"> Waiting </span> <?php }?></td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
				<form id="editForm" method="post" class="hide" action="<?php echo base_url()?>product/edit">
					<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input type=hidden name="SKU" id="SKU">
					<input type=hidden name="fromList" value="1">
				</form>
			</div>
		</section>
	</div>
</div>