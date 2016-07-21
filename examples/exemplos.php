<?php

$path = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
$fileName = $path . "/vendor/autoload.php";
//echo $fileName;
require_once($fileName);

/*
echo ('<h2>spl_autoload_functions()</h2>');
\Zend\Debug\Debug::dump(spl_autoload_functions());
exit;
*/


// 20/07/2016
// http://apidocs.braspag.com.br/
// https://developercielo.github.io/Webservice-3.0/

use Braspag\ApiService;
use Braspag\Model\Sale\Sale;

$data = [
    'merchantOrderId' => 2016080600,
    'customer' => [
        'name' => 'Comprador de Testes',
    ],
    'payment' => [
        'type' => 'CreditCard',
        'amount' => 100,
        'provider' => 'Simulado',
        'installments' => 1,
        'creditCard' => [
            'cardNumber' => '4532117080573700',
            'holder' => 'Test T S Testando',
            'expirationDate' => '12/2021',
            'securityCode' => '000',
            'brand' => 'Visa'
        ]
    ]
];

$sale = new Sale($data);

$service = new ApiService([
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
]);

/*
$service = new ApiService([
    'apiUri' => 'https://apisandbox.braspag.com.br/v2',
    'apiQueryUri' => 'https://apiquerysandbox.braspag.com.br/v2',
    'merchantId' => '1985000c-22f7-4429-9a92-fa5cb27de0e0',
    'merchantKey' => 'VJGOUODUJMCLCDAVPIBSSAPMWCTQVQBTHOXRUZFS',
]);

$service = new ApiService([
    'apiUri' => 'https://apisandbox.cieloecommerce.cielo.com.br/1',
    'apiQueryUri' => 'https://apiquerysandbox.cieloecommerce.cielo.com.br/1',
    'merchantId' => 'a2133427-a0f8-4fe8-b605-6469161e7711',
    'merchantKey' => 'XUMUBMGQBPNUAYIESMSHTCNLVTNEXIDPHXQRZYOC',
]);

$service = new ApiService([
    'apiUri' => 'https://api.braspag.com.br/v2',
    'apiQueryUri' => 'https://apiquery.braspag.com.br/v2',
    'merchantId' => '1985000c-22f7-4429-9a92-fa5cb27de0e0',
    'merchantKey' => 'VJGOUODUJMCLCDAVPIBSSAPMWCTQVQBTHOXRUZFS',
]);


$service = new ApiService([
    'apiUri' => 'https://api.braspag.com.br/v2',
    'apiQueryUri' => 'https://apiquery.braspag.com.br/v2',
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
    'authenticate' => true
]);
*/

// retorna Api\Model\Sale
$result = $service->authorize($sale);


echo '<pre>';
/*$_class = $result;
$method = get_class_methods(get_class($_class));
print_r($method);
print_r($result);*/

if ($result->isValid()) {
    // Braspag\Model\Payment
    $payment = $result->getPayment();

    // Array do pagamento
    $paymentArray = $result->getPayment()->toArray();

    // Braspag\Model\Customer
    $customer = $result->getCustomer();

    // Array do cliente
    $customerArray = $result->getCustomer()->toArray();

    // Array do pedido completo
    $saleArray = $result->toArray();

    echo '<h2>isValid</h2>';

    print_r($saleArray);

/*
    if($saleArray['payment']['returnCode'] == 6){
        printf("Transação autorizada com sucesso. TID=%s\n", $saleArray['payment']['tid']);
    }
*/

} else {
    $messages = $result->getMessages();
    // mensagens de alerta e erros

    echo '<h2>Not isValid</h2>';
    print_r($messages);
}


/*

 curl --request POST "https://apisandbox.braspag.com.br/v2/sales/" --header "Content-Type: application/json" --header "MerchantId: 1985000c-22f7-4429-9a92-fa5cb27de0e0" --header "MerchantKey: VJGOUODUJMCLCDAVPIBSSAPMWCTQVQBTHOXRUZFS" --header "RequestId: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" --data-binary '{ "MerchantOrderId":"2014111703", "Customer":{ "Name":"Comprador Teste" }, "Payment":{ "Type":"CreditCard", "Amount":15700, "Provider":"Simulado", "Installments":1, "CreditCard":{ "CardNumber":"1234123412341231", "Holder":"Teste Holder", "ExpirationDate":"12/2021", "SecurityCode":"123", "Brand":"Visa" } } }' --verbose

*/
