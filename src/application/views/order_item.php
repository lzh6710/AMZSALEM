<script type="text/javascript"
    src="<?php echo base_url()?>js/product_list.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Detail
                </h3>
            </div>
            <div class="panel-body">
                <h2 class="lead">ORDER NO :
                    <?php echo $order->amazonOrderId ?></h2>
                <table class="demo">
                	<tr>
                		<th colspan="2" class="title"> Buyer</th>
                	</tr>
                	<tr>
                		<th>Name</th>
                		<td> <?php echo $order->buyerName ?></td>
                	</tr>
                	<tr>
                		<th>Email</th>
                		<td> <?php echo $order->buyerEmail ?></td>
                	</tr>
                	<tr>
                		<th colspan="2" class="title"> Shipping Address</th>
                	</tr>
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
                	<tr>
                		<th colspan="2" class="title"> Order</th>
                	</tr>
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
               


                <br/>
               
                
                <table class="table table-bordered item-list table-striped">
                        <thead>
                            <tr class="bg-dark">
                                <th width="15%" class="text-center">ID</th>
                                <th width="45%" class="text-center">Title</th>
                                <th width="20%" class="text-center">Quantity Ordered</th>
                                <th width="20%" class="text-center">Quantity Shipped</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($order_item_list as $order_item) : ?>
							<tr>
								<td><?php echo $order_item->orderItemId?></td>
								<td><?php echo $order_item->title?></td>
								<td><?php echo $order_item->quantityOrdered?></td>
								<td><?php echo $order_item->quantityShipped?></td>
							</tr>
							<?php endforeach;?>
                            
                        </tbody>
                    </table>
                     <div class="text-center invoice-btn">
                            <a href="javascript:void(0)" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print </a>
                        </div>
            </div>
            
        </div>
    </div>
   
</div>

