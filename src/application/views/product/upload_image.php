<div class="col-lg-4">
    <!-- The container for the uploaded files -->
    <form id="files" class="files clearfix">
    	<?php foreach ($imageList as $image) {?>
    		<span id="<?php echo $image->ImageType;?>" style="float: left;">
    			<h5><?php echo $image->ImageType;?></h5>
    			<img src="<?php echo $image->ImageLocation;?>" class="thumbnail" style="max-height: 150px;max-width: 150px;" />
    			<input type="hidden" name="<?php echo $image->ImageType;?>" value="<?php echo $image->ImageLocation;?>" />
    		</span>
    	<?php }?>
    </form>
    <span id="updateImage" class="btn btn-primary" style="display: none;">
	        <i class="glyphicon glyphicon-plus"></i>
	        <span>Update Image</span>
    </span>
	<form id="productForm" method="POST">
		<input type="hidden" id="token2" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
		<!-- The fileinput-button span is used to style the file input field as button -->
	    <span class="btn btn-success fileinput-button">
	        <i class="glyphicon glyphicon-plus"></i>
	        <span>Select files...</span>
	        <!-- The file input field used as target for the file upload widget -->
	        <input id="fileupload" type="file" name="files[]" multiple>
	    </span>
	</form>
    <div>
    	<select name="ImageType" class="form-control">
    		<option value="Main">Main</option>
    		<option value="Swatch">Swatch</option>
    		<option value="PT1">PT1</option>
    		<option value="PT2">PT1</option>
    		<option value="PT3">PT3</option>
    		<option value="PT4">PT4</option>
    		<option value="PT5">PT5</option>
    		<option value="PT6">PT6</option>
    		<option value="PT7">PT7</option>
    		<option value="PT8">PT8</option>
    		<option value="Search">Search</option>
    	</select>
    </div>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
</div>

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/js/jquery.fileupload.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="/js/lib/bootstrap.min.js"></script>
<script src="/js/image_upload.js"></script>
