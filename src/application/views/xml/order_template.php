<?xml version="1.0"?> 
<AmazonEnvelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
xsi:noNamespaceSchemaLocation="amzn-envelope.xsd"> 
<Header> 
 <DocumentVersion>1.01</DocumentVersion> 
 <MerchantIdentifier>{MerchantIdentifier}</MerchantIdentifier> 
</Header> 
<MessageType>OrderAcknowledgement</MessageType> 
<Message> 
 <MessageID>1</MessageID> 
 <OrderAcknowledgement> 
 <AmazonOrderID>{AmazonOrderID}</AmazonOrderID> 
 <MerchantOrderID>1234567</MerchantOrderID> 
 <StatusCode>Failure</StatusCode>
 {Orders}<Item> 
 <AmazonOrderItemCode>{orderItemId}</AmazonOrderItemCode> 
 <MerchantOrderItemID>1234567</MerchantOrderItemID>
 <CancelReason>BuyerCanceled</CancelReason>
 </Item>{/Orders}
</OrderAcknowledgement> 
</Message> 
</AmazonEnvelope>