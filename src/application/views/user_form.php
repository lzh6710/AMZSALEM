<?php if ($is_edit) { ?>
<script type="text/javascript" src="<?php echo base_url()?>js/user_form.js"></script>
<?php }?>
<div class="row breadcrumb-ct" style="display:none">
	<div class="col-md-12">
		<!--breadcrumbs start -->
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url()?>management"><i class="fa fa-group"></i> User Management</a></li>
			<li class="active"><?php echo $is_edit ? 'Edit User' : 'Add User'?> </li>
		</ul>
		<!--breadcrumbs end -->
	</div>
</div>
<div class="row">	
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<span class="glyphicon glyphicon-th" style="padding-right: 6px;"></span><?php echo $is_edit ? 'Update User' : 'Create New User'?>
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
			</header>
			<div class="panel-body">
				<form id="userForm" action="<?php echo base_url()?>management/<?php echo $is_edit ? 'edit' : 'add' ?>" method="POST">
				<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				<div class="form form-horizontal">
					<div class="callout callout-success">
						<h4> Step 1 - <span class="semi-bold">Information</span></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, alias, in accusantium totam adipisci vel et suscipit quidem libero pariatur minus ratione quo doloremque error at nemo incidunt dicta quia?</p>
					</div>
						<div class="form-group ">
							<label for="firstname" class="control-label col-lg-3">Full Name</label>
							<div class="col-lg-6">
								<input class=" form-control" id="name" value="<?php echo $user->name ?>" name="name" type="text">
								<label for="name" class="error"><?php echo form_error('name'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="username" class="control-label col-lg-3">Username (required)</label>
							<div class="col-lg-6">
								<input class="form-control" <?php echo $is_edit ? 'disabled' : ''?> id="username" value="<?php echo $user->username ?>" <?php if (!$is_edit) { ?> name="username" <?php }?>  type="text">
								<?php if ($is_edit) { ?> <input type="hidden" value="<?php echo $user->username ?>" name="username" /> <?php }?> 
								<label for="username" class="error"><?php echo form_error('username'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="password" class="control-label col-lg-3">Password (required)</label>
							<div class="col-lg-6">
								<input class="form-control" id="password" value="<?php echo $user->password ?>" name="password" type="password">
								<label for="password" class="error"><?php echo form_error('password'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="confirm_password" class="control-label col-lg-3">Confirm Password (required)</label>
							<div class="col-lg-6">
								<input class="form-control" id="passconf" value="<?php echo $user->passconf ?>" name="passconf" type="password">
								<label for="passconf" class="error"><?php echo form_error('passconf'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="email" class="control-label col-lg-3">Email</label>
							<div class="col-lg-6">
								<input class="form-control " id="email" value="<?php echo $user->email ?>" name="email" type="text">
								<label for="email" class="error"><?php echo form_error('email'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="email" class="control-label col-lg-3">Phone Number</label>
							<div class="col-lg-6">
								<input class="form-control " id="phone" value="<?php echo $user->phone ?>" name="phone" type="text">
								<label for="phone" class="error"><?php echo form_error('phone'); ?></label>
							</div>
						</div>
						<div class="form-group ">
							<label for="email" class="control-label col-lg-3">Address</label>
							<div class="col-lg-6">
								<input class="form-control " id="address" value="<?php echo $user->address ?>" name="address" type="text">
								<label for="address" class="error"><?php echo form_error('address'); ?></label>
							</div>
						</div>
						<div class="callout callout-success">
							<h4>Step 2 - <span class="semi-bold">Set role</span></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, alias, in accusantium totam adipisci vel et suscipit quidem libero pariatur minus ratione quo doloremque error at nemo incidunt dicta quia?</p>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-3 control-label">Product</label>
									<div class="col-sm-9 icheck ">
										<div class="minimal single-row">
											<div class="checkbox">
												<div class="gui icheckbox_minimal <?php echo $userRole->pa ? 'checked' : '' ?>">
												</div>
												<input type="checkbox" <?php echo $userRole->pa ? 'checked' : '' ?> value="pa" name="role[]" id="pa" />
												<label>Add New</label>
											</div>
										</div>
										<div class="minimal single-row">
											<div class="checkbox ">
												<div class="gui icheckbox_minimal <?php echo $userRole->pe ? 'checked' : '' ?>">
												</div>
												<input type="checkbox" value="pe" <?php echo $userRole->pe ? 'checked' : '' ?> name="role[]" id="pe" />
												<label>Edit </label>
											</div>
										</div>
										<div class="minimal single-row">
											<div class="checkbox ">
												<div class="gui icheckbox_minimal <?php echo $userRole->pd ? 'checked' : '' ?>">
												</div>
												<input type="checkbox" value="pd" <?php echo $userRole->pd ? 'checked' : '' ?> name="role[]" id="pd" />
												<label>Delete </label>
											</div>
										</div>
										<div class="minimal single-row">
											<div class="checkbox ">
												<div class="gui icheckbox_minimal <?php echo $userRole->ef ? 'checked' : '' ?>">
												</div>
												<input type="checkbox" value="ef" <?php echo $userRole->ef ? 'checked' : '' ?> name="role[]" id="ef" />
												<label>Export File </label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-3 control-label">Order</label>
									<div class="col-sm-9 icheck ">
										<div class="minimal single-row">
											<div class="checkbox ">
												<div class="gui icheckbox_minimal <?php echo $userRole->ov ? 'checked' : '' ?>">
												</div>
												<label>View</label>
												<input type="checkbox" value="ov" <?php echo $userRole->ov ? 'checked' : '' ?> name="role[]" id="ov" />
											</div>
										</div>
										<div class="minimal single-row">
											<div class="checkbox ">
												<div class="gui icheckbox_minimal <?php echo $userRole->oc ? 'checked' : '' ?>">
												</div>
												<label>Confirm</label>
												<input type="checkbox" value="oc" <?php echo $userRole->oc ? 'checked' : '' ?> name="role[]" id="oc" />
											</div>
										</div>
										<div class="minimal single-row">
											<div class="checkbox ">
												<div class="gui icheckbox_minimal <?php echo $userRole->od ? 'checked' : '' ?>">
												</div>
												<label>Delete</label>
												<input type="checkbox" value="od" <?php echo $userRole->od ? 'checked' : '' ?> name="role[]" id="od" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-3 control-label">Status</label>
									<div class="col-sm-9 icheck ">
										<div class="minimal single-row">
											<div class="radio">
												<div class="gui iradio_minimal <?php echo ($user->isActive == 1) ? 'checked' : '' ?>">
												</div>
												<label>Active</label>
												<input type="radio" value="1" <?php echo ($user->isActive == 1) ? 'checked' : '' ?> name="isActive" id="active" />
											</div>
										</div>
										<div class="minimal single-row">
											<div class="radio">
												<div class="gui iradio_minimal <?php echo ($user->isActive == 0) ? 'checked' : '' ?>">
												</div>
												<label>Locked</label>
												<input type="radio" value="0" <?php echo ($user->isActive == 0) ? 'checked' : '' ?> name="isActive" id="locked" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-3 control-label">Role</label>
									<div class="col-sm-9 icheck ">
										<div class="minimal single-row">
											<div class="radio">
												<div class="gui iradio_minimal <?php echo ($user->isAdmin == 1) ? 'checked' : '' ?>">
												</div>
												<label>Administrator</label>
												<input type="radio" value="1" <?php echo ($user->isAdmin == 1) ? 'checked' : '' ?> name="isAdmin" id="admin" />
											</div>
										</div>
										<div class="minimal single-row">
											<div class="radio"> 
												<div class="gui iradio_minimal <?php echo ($user->isAdmin == 0) ? 'checked' : '' ?>">
												</div>
												<label>Member</label>
												<input type="radio" value="0" <?php echo ($user->isAdmin == 0) ? 'checked' : '' ?> name="isAdmin" id="member" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-3 col-lg-6">
								<button class="btn btn-primary" type="submit">Save</button>
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