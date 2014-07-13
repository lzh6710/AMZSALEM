<?xml version="1.0" encoding="iso-8859-1"?>
<AmazonEnvelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="amzn-envelope.xsd">
	<Header>
		<DocumentVersion>1.01</DocumentVersion>
		<MerchantIdentifier>{MerchantIdentifier}</MerchantIdentifier>
	</Header>
	<MessageType>Product</MessageType>
	<PurgeAndReplace>false</PurgeAndReplace>
	<Message>
		<MessageID>1</MessageID>
		<OperationType>Update</OperationType>
		<Product>
			<SKU>{SKU}</SKU>
			<StandardProductID>
				<Type>UPC</Type>
				<Value>{UPC}</Value>
			</StandardProductID>
			<ProductTaxCode>A_GEN_NOTAX</ProductTaxCode>
			<ItemPackageQuantity>{ItemPackageQuantity}</ItemPackageQuantity>
			<DescriptionData>
				<Title>{Title}</Title>
				<Brand>{Brand}</Brand>
				<Description>{Description}</Description>
				<BulletPoint>{Country}</BulletPoint>
				<MSRP currency="USD">{MSRP}</MSRP>
				<Manufacturer>{Manufacturer}</Manufacturer>
				<MfrPartNumber>{MfrPartNumber}</MfrPartNumber>
				<ItemType>{ItemType}</ItemType>
			</DescriptionData>
			{ProductData}
		</Product>
	</Message>
</AmazonEnvelope>