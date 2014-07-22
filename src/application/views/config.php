<div class="row">	
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<span class="glyphicon glyphicon-th" style="padding-right: 6px;"></span>Amazon Config 
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
			</header>
			<div class="panel-body">
				<form id="userForm" action="<?php echo base_url()?>config/update" method="POST">
				<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				<div class="form form-horizontal">
						<div class="form-group ">
							<label for="firstname" class="control-label col-lg-3">AWS_ACCESS_KEY_ID</label>
							<div class="col-lg-6">
								<input class=" form-control" id="AWS_ACCESS_KEY_ID" value="<?php echo $amzConfig['AWS_ACCESS_KEY_ID'] ?>" name="AWS_ACCESS_KEY_ID" type="text">
								<label for="name" class="error"><?php echo form_error('AWS_ACCESS_KEY_ID'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="username" class="control-label col-lg-3">AWS_SECRET_ACCESS_KEY</label>
							<div class="col-lg-6">
								<input class=" form-control" id="AWS_SECRET_ACCESS_KEY" value="<?php echo $amzConfig['AWS_SECRET_ACCESS_KEY'] ?>" name="AWS_SECRET_ACCESS_KEY" type="text">
								<label for="name" class="error"><?php echo form_error('AWS_SECRET_ACCESS_KEY'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="password" class="control-label col-lg-3">MARKETPLACE_ID</label>
							<div class="col-lg-6">
								<input class="form-control" id="MARKETPLACE_ID" value="<?php echo $amzConfig['MARKETPLACE_ID'] ?>" name="MARKETPLACE_ID" type="text">
								<label for="password" class="error"><?php echo form_error('MARKETPLACE_ID'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="confirm_password" class="control-label col-lg-3">MERCHANT_ID</label>
							<div class="col-lg-6">
								<input class="form-control" id="MERCHANT_ID" value="<?php echo $amzConfig['MERCHANT_ID'] ?>" name="MERCHANT_ID" type="text">
								<label for="password" class="error"><?php echo form_error('MERCHANT_ID'); ?></label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-3 col-lg-6">
								<button class="btn btn-primary" type="submit">Update</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>