<?='<?xml version="1.0" encoding="iso-8859-1"?>'?>
<AmazonEnvelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="amzn-envelope.xsd">
	<Header>
		<DocumentVersion>1.01</DocumentVersion>
		<MerchantIdentifier>{MerchantIdentifier}</MerchantIdentifier>
	</Header>
	<MessageType>Inventory</MessageType>
	<PurgeAndReplace>false</PurgeAndReplace>
	<Message>
		<MessageID>1</MessageID>
		<OperationType>Update</OperationType>
		<Inventory>
			<SKU>{SKU}</SKU>
			<Quantity>{Quantity}</Quantity>
			<FulfillmentLatency>{FulfillmentLatency}</FulfillmentLatency>
		</Inventory>
	</Message>
</AmazonEnvelope>