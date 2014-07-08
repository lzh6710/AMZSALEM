<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <!-- Title -->
    <title>Administrator Page</title>
    
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keyword" content="Administrator Page" />
    <meta name="description" content="Administrator Page" />
    
    <!-- Css -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap-theme.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap-custom.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/font-awesome.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/layout.css" media="all" />
    
    <!-- Javscript -->
    <script type="text/javascript" src="<?php echo base_url()?>js/lib/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/layout.js"></script>
</head>
<body>
    <section id="container">
    	<header class="header fixed-top clearfix">
			<div class="brand">
	            <div class="toggle-right-box">
	                <div class="fa fa-bars"></div>
	            </div>
			</div>
			<div id="top_menu" class="nav notify-row">
			    <ul class="nav top-menu">
			        <li class="dropdown" id="header_inbox_bar">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                <i class="fa fa-envelope-o"></i>
			                <span class="badge bg-important">4</span>
			            </a>
			        </li>
			        <li class="dropdown" id="header_notification_bar">
			            <a href="#" class="dropdown-toggle">
			                <i class="fa fa-bell-o"></i>
			                <span class="badge bg-warning">3</span>
			            </a>
			        </li>
			    </ul>
			</div>
			<div class="top-nav pull-right clearfix">
			    <ul class="nav top-menu">
			        <li class="dropdown">
			            <a href="#" class="dropdown-toggle">
			                <img width="29" src="<?php echo base_url()?>img/avatar3_small.jpg" alt="">
			                <span class="username"><?php echo $loginInfo['name'] ?></span>
			                <b class="caret"></b>
			            </a>
			            <ul class="dropdown-menu extended logout">
			                <li><a href="#"><i class=" fa fa-user"></i> Profile</a></li>
			                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
			                <li><a href="<?php echo base_url()?>user/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
			            </ul>
			        </li>
			    </ul>
			</div>
		</header>
		<aside>
			<div id="sidebar" class="nav-collapse">
				<div class="leftside-navigation" style="overflow: hidden;" tabindex="5000">
		            <ul id="nav-accordion" class="sidebar-menu">
						<li>
		                    <a href="<?php echo base_url()?>home">
		                        <i class="fa  fa-home"></i>
		                        <span>Home</span>
		                    </a>
		                </li>
		                <?php if ($loginInfo['isAdmin'] == 1) { ?>
		            	<li>
		                    <a href="<?php echo base_url()?>management">
		                        <i class="fa  fa-group"></i>
		                        <span>User Management</span>
		                    </a>
		                </li>
		                <?php }?>
		                <li>
		                    <a href="#">
		                        <i class="fa  fa-pencil-square-o"></i>
		                        <span>Order</span>
		                    </a>
		                </li>
		                <li class="sub-menu dcjq-parent-li">
		                    <a href="javascript:;" class="dcjq-parent">
		                        <i class="fa fa-tag"></i>
		                        <span>Amazone</span>
		                    <span class="dcjq-icon"></span></a>
		                    <ul class="sub" style="display: none;">
		                        <li><a href="<?php echo base_url()?>product">View</a></li>
		                        <li><a href="<?php echo base_url()?>product/add">Add New Product</a></li>
		                        <li><a href="#">Export File</a></li>
								<li><a href="<?php echo base_url()?>home/submitFeed">submitFeed</a></li>
								<li><a href="<?php echo base_url()?>amzProductList">List Product</a></li>
		                    </ul>
		                </li>
		          </ul>
		         </div>
			</div>
		</aside>
		<section id="main-content" class="animate-fade-up" style="opacity: 0;">
			<section class="wrapper" >
				<?php echo $content_for_layout ?>
			</section>
		</section>
		<div class="left-sidebar"></div>
    </section>
</body>
</html>