<script>
var base_url = "<?php echo base_url()?>";
</script>
<script type="text/javascript" src="<?php echo base_url()?>js/order_list.js"></script>
<link rel="template/jsrender" type="text/html" href="<?php echo base_url()?>tmpl/order.tmpl" />
<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Order List
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
				<div class="alert alert-success alert-block fade in" id="updateNote" <?php if (!isset($update_id)) {?> style="display:none;" <?php } ?>>
					<button data-dismiss="alert" class="close close-sm" type="button">
						<i class="fa fa-times" onclick ="javascript:$('#updateNote').fadeOut();" ></i>
					</button>
					<h4>
						<i class="icon-ok-sign" id="closeNote"></i>
						Update Success! ORDER ID : <?php if (isset($update_id)) { echo $update_id; }?>
					</h4>
					<p>Please wait a few minutes while Amazon processing...<br>
					Then please enter conditions and click 'Get Orders From Amazon' button is below to refest order list.</p>
				</div>
			
                <div class="clearfix fill" style="display: table;width: 100%; margin-bottom: 20px;">
                    <div class="btn-group" style="display: table-cell;">
                        <a href="javascript:void(0);"><button type="button" id="amazon-btn" class="btn btn-info" title="Get new order from amazon"><i class="fa fa-cloud"></i> Get Orders From Amazon</button></a>
                        <a href="javascript:void(0);" class="hide"><button type="button" class="btn btn-primary">Default Button</button></a>
                    </div>
					
					
					
					
                    <div style="display: table-cell; padding: 0px 5px;">
                    <div id="order-search" class="input-group m-bot15">
                                <div class="input-group-btn dropdown btn-group">
                                	<button id="filter-btn" type="button" class="btn btn-info"><i class="fa fa-search"></i> <span id="text">Search</span></button>
                                    <button id="action-btn" type="button" style="display: none;" class="btn btn-info dropdown-toggle"><span id="text"></span> <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li key="amazonOrderId"><a href="javascript:void(0);">Order ID</a></li>
                                        <li key="buyerName"><a href="javascript:void(0);">Buyer Name</a></li>
                                        <li key="purchaseDate" class="date-btn"><a href="javascript:void(0);">Purchase Date</a></li>
                                        <li class="divider"></li>
                                        <li class="close-btn"><a class="javascript:void(0);" href="javascript:void(0);">Close</a></li>
                                    </ul>
                                </div>
                                <input  type="text" class="form-control search-txt" style="border-right: none;border-left: none;display: none;">
                                        <input id="startDate" type="text" style="border-radius: 0px !important; border-right: 0px;border-left: 0px;display: none; " size="16" class="form-control date-cp">
                                              <span class="input-group-btn add-on date-cp timepicker" date-type="start" data-date-format="yyyy-mm-dd" data-date="" style="display: none;">
                                                <button class="btn btn-primary" style="border-radius: 0px;" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                        <input id="endDate" type="text" style="border-radius: 0px !important; border-right: 0px;border-left: 0px; display: none;" size="16" class="form-control date-cp">
                                              <span  class="input-group-btn add-on date-cp timepicker" date-type="end" data-date-format="yyyy-mm-dd" data-date="" style="display: none;">
                                                <button class="btn btn-primary" style="border-radius: 0px;" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                       
                                <span id="submit-btn" class="input-group-btn" style="display: none;">
                                                <button class="btn btn-default"  type="button"><i class="fa fa-search"></i> Search</button>
                                              </span>
                            </div>
                           </div> 
                           <div style="display: table-cell;">
                    <div class="btn-group pull-right dropdown">
                        <button class="btn btn-default dropdown-toggle">Tools <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Print</a></li>
                            <li><a href="javascript:void(0);">Save as PDF</a></li>
                            <li><a href="javascript:void(0);">Export to Excel</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                
                <section id="orderDate" class="panel" style="border: 1px solid #ddd;display:none;">
                    <div class="panel-body form" style="padding-top: 30px;">
						<div class="alert alert-warning" style="display:none">
    <h4><i class="fa fa-warning"></i> Error!</h4>
Can't connect to Amazon service now.
  </div>
					
                        <form action="#" class="form-horizontal ">
							<div class="col-lg-6">
                             <div class="form-group">
                                <label class="control-label col-md-4">Create Before</label>
                                <div class="col-md-8 col-xs-11">

                                    <div  class="input-append date">
                                        <input type="text" id="createBefore"  value="" size="16" class="form-control">
                                              <span  date-type="start" data-date-format="yyyy-mm-dd" data-date="" class="input-group-btn add-on timepicker2">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Create After</label>
                                <div class="col-md-8 col-xs-11">

                                    <div  class="input-append date">
                                        <input type="text" id="createAfter"  value="" size="16" class="form-control">
                                              <span date-type="start" data-date-format="yyyy-mm-dd" data-date="" class="input-group-btn add-on timepicker2">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label col-md-4">Last Update Before</label>
                                <div class="col-md-8 col-xs-11">

                                    <div class="input-append date">
                                        <input type="text" id="updateBefore"  value="" size="16" class="form-control">
                                              <span date-type="start" data-date-format="yyyy-mm-dd" data-date="" class="input-group-btn add-on timepicker2">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Last Update After</label>
                                <div class="col-md-8 col-xs-11">

                                    <div class="input-append date">
                                        <input type="text" id="updateAfter"  value="" size="16" class="form-control">
                                              <span date-type="start" data-date-format="yyyy-mm-dd" data-date="" class="input-group-btn add-on timepicker2">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                    </div>
                                </div>
                            </div>
						</div>
                        </form>
						<div style="text-align:right;padding-right: 15px;">
						<button id="update-btn" class="btn btn-primary  ">
                            <i class="fa fa-refresh"></i>
                            Update
                        </button>
						</div>
                    </div>
                </section>
                
                <div id="dynamic-table_length"
                    class="dataTables_length">
                    <label><select class="form-control" size="1"
                        name="dynamic-table_length"
                        aria-controls="dynamic-table">
                            <option value="10" selected="selected">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="0">All</option>
                    </select> records per page</label>
                </div>
                <div id="orderListContent"></div>
            </div>
        </section>
    </div>
</div>

