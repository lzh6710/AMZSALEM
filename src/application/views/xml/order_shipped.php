<?='<?xml version="1.0"?>'?>
<AmazonEnvelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="amzn-envelope.xsd">
	<Header>
		<DocumentVersion>1.01</DocumentVersion>
		<MerchantIdentifier>{MerchantIdentifier}</MerchantIdentifier>
	</Header>
	<MessageType>OrderFulfillment</MessageType>
	<Message>
		<MessageID>1</MessageID>
		<OrderFulfillment>
			<AmazonOrderID>{AmazonOrderID}</AmazonOrderID>
			<MerchantFulfillmentID>1234567</MerchantFulfillmentID>
			<FulfillmentDate>2014-07-14T15:36:33-08:00</FulfillmentDate>
			<FulfillmentData>
				<CarrierCode>UPS</CarrierCode>
				<ShippingMethod>Second Day</ShippingMethod>
				<ShipperTrackingNumber>1234567890</ShipperTrackingNumber>
			</FulfillmentData>
			{Orders}<Item>
				<AmazonOrderItemCode>{orderItemId}</AmazonOrderItemCode>
				<MerchantFulfillmentItemID>1234567</MerchantFulfillmentItemID>
				<Quantity>{quantity}</Quantity>
			</Item>{/Orders}
		</OrderFulfillment>
	</Message>
</AmazonEnvelope>
