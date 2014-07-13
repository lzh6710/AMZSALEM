<?xml version="1.0"?> 
     <AmazonEnvelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="amzn-envelope.xsd"> 
        <Header> 
            <DocumentVersion>1.01</DocumentVersion> 
            <MerchantIdentifier>{MerchantIdentifier}</MerchantIdentifier> 
        </Header> 
        <MessageType>
            OrderAcknowledgment
        </MessageType> 
        <Message> 
            <MessageID>1</MessageID> 
            <OrderAcknowledgement> 
                <AmazonOrderID>{AmazonOrderID}</AmazonOrderID> 
                <StatusCode>Failure</StatusCode>
                <CancelReason>BuyerCanceled</CancelReason>
            </OrderAcknowledgement> 
        </Message> 
    </AmazonEnvelope>