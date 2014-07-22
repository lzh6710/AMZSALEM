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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/font-awesome.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/login.css" media="all" />
    
    <!-- Javscript -->
    <script type="text/javascript" src="<?php echo base_url()?>js/lib/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/login.js"></script>
</head>
<body>
<div class="login">
    <div class="space"></div>
    <div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form action="" method="post" accept-charset="utf-8">
    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <h3 class="form-title">Login to your account</h3>
        <div class="alert alert-danger hide">
            <div class="close"></div>
            <span id="errorMessage"><?php echo validation_errors(); ?></span>
        </div>
        <div class="form-group">
            <label class="control-label hide">Username</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input id="username" class="form-control enterLogin placeholder-no-fix" type="text" value="<?php echo $username ?>" autocomplete="off" placeholder="Username" name="username">
            </div>
			<span for="username" class="help-block hide"></span>
        </div>
        <div class="form-group">
            <label class="control-label hide">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input id="password" class="form-control enterLogin placeholder-no-fix" type="password" value="<?php echo $password ?>" autocomplete="off" placeholder="Password" name="password">
            </div>
			<span for="username" class="help-block hide"></span>
        </div>
        <div class="form-actions">
            <label class="checkbox">
            <div class="checker"><span <?php if($remember == 1) { ?> class="checked" <?php } ?>><input type="checkbox" id="remember" name="remember" value="<?php echo $remember ?>"></span></div> Remember me </label>
            <button type="button" id="login" class="btn green pull-right">
            Login <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    </div>
    <!-- END LOGIN FORM -->
</div>
</body>
</html>