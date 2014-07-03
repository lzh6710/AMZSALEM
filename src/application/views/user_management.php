<script type="text/javascript" src="<?php echo base_url()?>js/user_management.js"></script>
<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				User Management
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-cog"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				 </span>
			</header>
			<div class="panel-body">
				<div class="clearfix fill">
					<div class="btn-group">
					<a href="<?php echo base_url()?>management/add">
						<button id="editable-sample_new" class="btn btn-primary">
							Add New <i class="fa fa-plus"></i>
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
				<table id="userTable" class="table table-hover table-striped general-table">
					<thead>
					<tr>
						<th>ID</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Status</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ($user_list as $user) : ?>
						<tr>
							<td>
								<a class="edit" href="javascript:void(0);">
									<?php echo $user->username?>
									<input type=hidden value="<?php echo $user->username?>">
								</a>
							</td>
							<td><?php echo $user->name?></td>
							<td><?php echo $user->email?></td>
							<td><?php echo $user->phone?></td>
							<td><?php echo $user->address?></td>
							<td><span class="label <?php if ($user->isActive) { ?> label-success <?php } else { ?> label-danger <?php } ?> label-mini"><?php if ($user->isActive) { ?> Active <?php } else { ?> Locked <?php } ?></span></td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
				<form id="editForm" method="post" class="hide" action="<?php echo base_url()?>management/edit">
					<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input type=hidden name="username" id="username">
					<input type=hidden name="fromList" value="1">
				</form>
			</div>
		</section>
	</div>
</div>