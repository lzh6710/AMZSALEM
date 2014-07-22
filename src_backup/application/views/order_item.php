<script>
var base_url = "<?php echo base_url()?>";
</script>
<script type="text/javascript"
    src="<?php echo base_url()?>js/order_item.js"></script>
<div class="row" id="orderItem">
    <div class="col-md-12">
        <div class="panel panel-default">
        
            <div class="panel-body">
             	<div class="col-xs-4">
                    <p class="size-h2 ng-binding "></p>
                </div>
    			<div class="col-xs-8 text-right" style="text-transform: uppercase;">
                    <p class="size-h2">ORDER NO<br/>
                    <?php echo $order->amazonOrderId ?>
                    <br/>
                    <span 
                     <?php if ($order->orderStatus == "Canceled") { ?> style="color: #FF6C60" <?php }?>
                      <?php if ($order->orderStatus == "Pending") { ?> style="color: #8175c7" <?php }?>
                       <?php if ($order->orderStatus == "Unshipped") { ?> style="color: #FCB322" <?php }?>
                    
                     class="btn-status"><?php echo $order->orderStatus ?></span>
                    </p>
                </div>
                
                <div style="border-top: 1px solid #eee;width: 100%;margin: 20px 0px;" class="clearfix"></div>

                <div class="panel panel-dark">
                    <div class="panel-heading">
                        <h3 class="panel-title">BUYER INFORMATION</h3>
                    </div>
                    <div class="panel-body">
	                   	<table class="demo">
		                	<tr>
		                		<th>Name</th>
		                		<td> <?php echo $order->buyerName ?></td>
		                	</tr>
		                	<tr>
		                		<th>Email</th>
		                		<td> <?php echo $order->buyerEmail ?></td>
		                	</tr>
	                	</table>
                    </div>
                </div>
                
                <div class="panel panel-dark">
                    <div class="panel-heading">
                        <h3 class="panel-title">Shipping Address</h3>
                    </div>
                    <div class="panel-body">
	                   	<table class="demo">
		                	<tr>
		                		<th>Name</th>
		                		<td> <?php echo $order->shippingAddressName ?></td>
		                	</tr>
		                	<tr>
		                		<th>Address Line 1</th>
		                		<td> <?php echo $order->shippingAddressAddressLine1 ?></td>
		                	</tr>
		                	<tr>
		                		<th>Address Line 2</th>
		                		<td> <?php echo $order->shippingAddressAddressLine2 ?></td>
		                	</tr>
		                	<tr>
		                		<th>State/Region</th>
		                		<td> <?php echo $order->shippingAddressStateOrRegion ?></td>
		                	</tr>
		                	<tr>
		                		<th>Postal Code</th>
		                		<td> <?php echo $order->shippingAddressPostalCode ?></td>
		                	</tr>
		                	<tr>
		                		<th>Country Code</th>
		                		<td> <?php echo $order->shippingAddressCountryCode ?></td>
		                	</tr>
		                	<tr>
		                		<th>Phone</th>
		                		<td> <?php echo $order->shippingAddressPhone ?></td>
		                	</tr>
	                	</table>
                    </div>
                </div>
				
				
				 <div class="panel panel-dark">
                    <div class="panel-heading">
                        <h3 class="panel-title">ORDER INFORMATION</h3>
                    </div>
                    <div class="panel-body">
	                   	<table class="demo">
		                		
                	<tr>
                		<th>Purchase Date</th>
                		<td> <?php echo $order->purchaseDate ?></td>
                	</tr>
                	<tr>
                		<th>Last Update Date</th>
                		<td> <?php echo $order->lastUpdateDate ?></td>
                	</tr>
                	<tr>
                		<th>Order Status</th>
                		<td> <?php echo $order->orderStatus ?></td>
                	</tr>
                	<tr>
                		<th>Fulfillment Channel</th>
                		<td> <?php echo $order->fulfillmentChannel ?></td>
                	</tr>
                	<tr>
                		<th>Sales Channel</th>
                		<td> <?php echo $order->salesChannel ?></td>
                	</tr>
                	<tr>
                		<th>Ship Service Level</th>
                		<td> <?php echo $order->shipServiceLevel ?></td>
                	</tr>
                	<tr>
                		<th>Currency Code</th>
                		<td> <?php echo $order->orderTotalCurrencyCode ?></td>
                	</tr>
                	<tr>
                		<th>Amount</th>
                		<td> <?php echo $order->orderTotalAmount ?></td>
                	</tr>
                	<tr>
                		<th>Items Shipped</th>
                		<td> <?php echo $order->numberOfItemsShipped ?></td>
                	</tr>
                	<tr>
                		<th>Items Unshipped</th>
                		<td> <?php echo $order->numberOfItemsUnshipped ?></td>
                	</tr>
                	<tr>
                		<th>Payment Execution Detail</th>
                		<td> <?php echo $order->paymentExecutionDetail ?></td>
                	</tr>
                	<tr>
                		<th>Payment Method</th>
                		<td> <?php echo $order->paymentMethod ?></td>
                	</tr>
                	<tr>
                		<th>Shipment Service Level Category</th>
                		<td> <?php echo $order->shipmentServiceLevelCategory ?></td>
                	</tr>
                	<tr>
                		<th>Shipped By Amazon TFM</th>
                		<td> <?php echo $order->shippedByAmazonTFM ?></td>
                	</tr>
                	<tr>
                		<th>Order Type</th>
                		<td> <?php echo $order->orderType ?></td>
                	</tr>
                	<tr>
                		<th>Earliest Ship Date</th>
                		<td> <?php echo $order->earliestShipDate ?></td>
                	</tr>
                	<tr>
                		<th>Latest Ship Date</th>
                		<td> <?php echo $order->latestShipDate ?></td>
                	</tr>
                	<tr>
                		<th>Earliest Delivery Date</th>
                		<td> <?php echo $order->earliestDeliveryDate ?></td>
                	</tr>
                	<tr>
                		<th>Latest Delivery Date</th>
                		<td> <?php echo $order->latestDeliveryDate ?></td>
                	</tr>
	                	</table>
                    </div>
                </div>
               
                	
                
                <div class="panel panel-dark">
                    <div class="panel-heading">
                        <h3 class="panel-title">ORDER ITEMS</h3>
                    </div>
                    <div class="panel-body">
                    <form id="orderForm" method="post" action="<?php echo base_url()?>order/cancel">
	                   	 <table class="table  item-list table-invoice">
                        <thead>
                            <tr class="bg-dark">
                                <th width="10%" class="text-center">ID</th>
                                <th width="25%" class="text-center">Title</th>
                                <th width="22%" class="text-center">Quantity Ordered</th>
                                <th width="22%" class="text-center">Quantity Shipped</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($order_item_list as $order_item) : ?>
							<tr>
								<td><?php echo $order_item->orderItemId?></td>
								<td><?php echo $order_item->title?></td>
								<td><?php echo $order_item->quantityOrdered?></td>
								<td><?php echo $order_item->quantityShipped?></td>
								<td class="text-center"><?php if (($order_item->quantityOrdered > $order_item->quantityShipped) && $order_item->quantityOrdered > 0) { ?>
									<span data="ship_<?php echo $order_item->orderItemId?>" style="text-transform: uppercase;color: green;margin-right: 5px;" class="pointer action_span">Ship</span>
									<span class="action_span cancel_bt pointer" data="cancel_<?php echo $order_item->orderItemId?>" style="text-transform: uppercase;color: red;" > Cancel</span>
								<?php }?>
								</td>
							</tr>
							<tr id="cancel_<?php echo $order_item->orderItemId?>" class="action_div">
								<td colspan="5" style="text-transform: uppercase;">
								<div class="col-md-12" style="text-align: left;">
								<span class="col-md-3" style="vertical-align: middle;padding: 8px 0px;"></span>
								<div class="col-md-9">
								<div class="icheck">
								<div class="checkbox">
												<div class="gui icheckbox_minimal ">
												</div>
												<input type="checkbox" class="item" value="<?php echo $order_item->orderItemId?>" name="cancelItem[]">
												<label>I want cancel this item</label>
											</div>
											</div>
								</div>
								</div>
								<div class="col-md-12" style="text-align: left;">
								<span class="col-md-3" style="vertical-align: middle;padding: 8px 0px;">cancel reason</span>
								<div class="col-md-9">
								<select class="form-control" size="1"
                                        name="cancelItemReason[]"
                                        aria-controls="hidden-table-info"><option
                                                value="NoInventory"
                                                selected="selected" style="color:#fff;">No Inventory</option>
                                            <option value="ShippingAddressUndeliverable_<?php echo $order_item->orderItemId?>">Shipping Address Undeliverable</option>
                                            <option value="CustomerExchange_<?php echo $order_item->orderItemId?>">Customer Exchange</option>
                                            <option value="BuyerCanceled_<?php echo $order_item->orderItemId?>">Buyer Canceled</option>
                                            <option value="CarrierCreditDecision_<?php echo $order_item->orderItemId?>">Carrier Credit Decision</option>
                                            <option value="GeneralAdjustment_<?php echo $order_item->orderItemId?>">General Adjustment</option>
                                            <option value="RiskAssessmentInformationNotValid_<?php echo $order_item->orderItemId?>">Risk Assessment Information Not Valid</option>
                                            <option value="CarrierCoverageFailure_<?php echo $order_item->orderItemId?>">Carrier Coverage Failure</option>
                                            <option value="CustomerReturn_<?php echo $order_item->orderItemId?>">Customer Return</option>
                                            <option value="MerchandiseNotReceived_<?php echo $order_item->orderItemId?>">Merchandise Not Received</option>
                                    </select>
                                    </div>
                                    </div>
                                    </td>
							</tr>
							<tr id="ship_<?php echo $order_item->orderItemId?>" class="action_div">
								<td colspan="5" style="text-transform: uppercase;">
								<div class="col-md-12" style="text-align: left;">
								<span class="col-md-3" style="vertical-align: middle;padding: 8px 0px;">Ship's quantily</span>
								<div class="col-md-9">
										<input type="type" class="item form-control" name="shipItem[]">
										<input type="hidden" class="item form-control" value="<?php echo $order_item->orderItemId?>" name="shipId[]">
									</div>
								</div>
								</div>
                                    </td>
							</tr>
							<?php endforeach;?>
                            
                        </tbody>
                    </table>
                    
                     <div class="icheck">
								<div class="checkbox">
												<div class="gui icheckbox_minimal ">
												</div>
												<input type="checkbox" class="item" id="isAll" value="1" name="isAll">
												<label>Select All Item</label>
											</div>
											</div>
											
											<input type="hidden" id="orderId" name="orderId" value="<?php echo $order->amazonOrderId ?>" />
                    	<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    	<input type="hidden" id="reasonAll" name="reasonAll">
											
                    </form>
                    
                     
                    
                    </div>
                    
                    
                </div>	
               


                <br/>
               
                
                     <div class="text-center invoice-btn">
                     		<?php if ($order->orderStatus == 'Unshipped'){ ?><a id="ship" href="javascript:void(0);" target="_blank" class="btn btn-success btn-lg">Ship </a><?php } ?>
                     		<?php if ($order->orderStatus == 'Unshipped' || $order->orderStatus == 'Pending'){ ?><a id="cancel" href="javascript:void(0);" target="_blank" class="btn btn-danger btn-lg">Cancel </a><?php } ?>
                            <a href="javascript:$('#orderItem').printElement();" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print </a>
                        </div>
            	</div>
            
        </div>
    </div>
</div>


<div class="row">
	<div class="admin-bar cancel-bar">
		<div class="admin-bar-inner">
			<div class="left msg">Are you sure you want cancel items of this order?</div>
			<button class="btn btn-danger  btn-yes" type="button"><i class="icon-trash"></i> Yes </button>
			<button class="btn btn-white  btn-cancel" type="button">No</button>
		</div>
	</div>
</div>
<div class="row">
	<div class="admin-bar confirm-bar">
		<div class="admin-bar-inner">
			<div class="left msg">Please choose a cancel reason </div>
			<select id="cancelAllReason"><option
                                                value="NoInventory"
                                                selected="selected" style="color:#fff;">No Inventory</option>
                                            <option value="ShippingAddressUndeliverable">Shipping Address Undeliverable</option>
                                            <option value="CustomerExchange">Customer Exchange</option>
                                            <option value="BuyerCanceled">Buyer Canceled</option>
                                            <option value="CarrierCreditDecision">Carrier Credit Decision</option>
                                            <option value="GeneralAdjustment">General Adjustment</option>
                                            <option value="RiskAssessmentInformationNotValid">Risk Assessment Information Not Valid</option>
                                            <option value="CarrierCoverageFailure">Carrier Coverage Failure</option>
                                            <option value="CustomerReturn">Customer Return</option>
                                            <option value="MerchandiseNotReceived">Merchandise Not Received</option>
                                    </select>
			
			
			<button class="btn btn-danger  btn-ok" type="button"><i class="icon-trash"></i> OK </button>
			<button class="btn btn-white  btn-cancel" type="button">Close</button>
		</div>
	</div>
</div>
