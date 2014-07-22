<?='<?xml version="1.0" encoding="UTF-8"?>'?>
<AmazonEnvelope xsi:noNamespaceSchemaLocation="amzn-envelope.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <Header>
        <DocumentVersion>1.01</DocumentVersion>
        <MerchantIdentifier>{MerchantIdentifier}</MerchantIdentifier>
    </Header>
    <MessageType>{MessageType}</MessageType>
    <Message>
        <MessageID>{MessageID}</MessageID>
        <OperationType>{OperationType}</OperationType>
        <OrderFulfillment>
            <AmazonOrderID>{AmazonOrderID}</AmazonOrderID>
            <FulfillmentDate>{FulfillmentDate}</FulfillmentDate>
            <FulfillmentData>
                <CarrierName>{CarrierName}</CarrierName>
                <ShippingMethod>{ShippingMethod}</ShippingMethod>
            </FulfillmentData>
            <Item>
                <AmazonOrderItemCode>{AmazonOrderItemCode}</AmazonOrderItemCode>
                <Quantity>{Quantity}</Quantity>
            </Item>
        </OrderFulfillment>
    </Message>
</AmazonEnvelope>