<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

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

use Mozg\Cielo\ApiService;

//

$service_production_braspag = new ApiService([
    'apiUri' => 'https://api.braspag.com.br/v2',
    'apiQueryUri' => 'https://apiquery.braspag.com.br/v2',
    'merchantId' => '1985000c-22f7-4429-9a92-fa5cb27de0e0',
    'merchantKey' => 'VJGOUODUJMCLCDAVPIBSSAPMWCTQVQBTHOXRUZFS',
]);

$service_sandbox_braspag = new ApiService([
    'apiUri' => 'https://apisandbox.braspag.com.br/v2',
    'apiQueryUri' => 'https://apiquerysandbox.braspag.com.br/v2',
    'merchantId' => '1985000c-22f7-4429-9a92-fa5cb27de0e0',
    'merchantKey' => 'VJGOUODUJMCLCDAVPIBSSAPMWCTQVQBTHOXRUZFS',
]);


$service_production_cielo = new ApiService([
    'apiUri' => 'https://api.cieloecommerce.cielo.com.br/1',
    'apiQueryUri' => 'https://apiquery.cieloecommerce.cielo.com.br/1',
    'merchantId' => 'a2133427-a0f8-4fe8-b605-6469161e7711',
    'merchantKey' => 'XUMUBMGQBPNUAYIESMSHTCNLVTNEXIDPHXQRZYOC',
]);

$service_sandbox_cielo = new ApiService([
    'apiUri' => 'https://apisandbox.cieloecommerce.cielo.com.br/1',
    'apiQueryUri' => 'https://apiquerysandbox.cieloecommerce.cielo.com.br/1',
    'merchantId' => 'a2133427-a0f8-4fe8-b605-6469161e7711',
    'merchantKey' => 'XUMUBMGQBPNUAYIESMSHTCNLVTNEXIDPHXQRZYOC',
]);

$service_test_ = new ApiService([
    'apiUri' => 'https://api.braspag.com.br/v2',
    'apiQueryUri' => 'https://apiquery.braspag.com.br/v2',
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
    'authenticate' => true
]);

//

$orderId = date('YmdHi');

$dados_venda_simplificada_credito = [
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

$dados_venda_completa_credito = [
    'merchantOrderId' => 2016060900,
    'customer' => [
        'name' => 'Comprador de Testes',
        'identity' => '11225468954',
        'identityType' => 'CPF',
        'email' => 'compradordetestes@braspag.com.br',
        'birthDate' => '1991-01-02',
        'address' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ],
        'deliveryAddress' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ]
    ],
    'payment' => [
        'type' => 'CreditCard',
        'amount' => 100,
        'currency' => 'BRL',
        'country' => 'BRA',
        'provider' => 'Simulado',
        'serviceTaxAmount' => 0,
        'installments' => 1,
        'interest' => 'ByMerchant',
        'capture' => true,
        'authenticate' => false,
        'softDescriptor' => 'tst',
        'creditCard' => [
            'cardNumber' => '4532117080573700',
            'holder' => 'Test T S Testando',
            'expirationDate' => '12/2021',
            'securityCode' => '000',
            'saveCard' => false,
            'brand' => 'Visa',
        ],
        'extraDataCollection' => [
            [
                'name' => 'NomeDoCampo',
                'value' => '1234567'
            ]
        ]
    ]
];

$dados_venda_autenticada_credito = [
    'merchantOrderId' => 2016080600,
    'customer' => [
        'name' => 'Comprador de Testes',
    ],
    'payment' => [
        'type' => 'CreditCard',
        'amount' => 100,
        'provider' => 'Simulado',
        'installments' => 1,
        'authenticate' => true,
        'returnUrl' => 'http://www.braspag.com.br/',
        'creditCard' => [
            'cardNumber' => '4532117080573700',
            'holder' => 'Test T S Testando',
            'expirationDate' => '12/2021',
            'securityCode' => '000',
            'brand' => 'Visa'
        ]
    ]
];

$dados_venda_analise_fraude_credito = [
    'merchantOrderId' => 2016060900,
    'customer' => [
        'name' => 'Comprador de Testes',
        'identity' => '11225468954',
        'identityType' => 'CPF',
        'email' => 'compradordetestes@braspag.com.br',
        'birthDate' => '1991-01-02',
        'address' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ],
        'deliveryAddress' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ]
    ],
    'payment' => [
        'type' => 'CreditCard',
        'amount' => 100,
        'currency' => 'BRL',
        'country' => 'BRA',
        'provider' => 'Simulado',
        'serviceTaxAmount' => 0,
        'installments' => 1,
        'interest' => 'ByMerchant',
        'capture' => false,
        'authenticate' => false,
        'softDescriptor' => 'tst',
        'creditCard' => [
            'cardNumber' => '4532117080573700',
            'holder' => 'Test T S Testando',
            'expirationDate' => '12/2021',
            'securityCode' => '000',
            'saveCard' => false,
            'brand' => 'Visa',
        ],
        'extraDataCollection' => [
            [
                'name' => 'NomeDoCampo',
                'value' => '1234567'
            ]
        ],
        'fraudAnalysis' => [
            'sequence' => 'AnalyseFirst',
            'sequenceCriteria' => 'Always',
            'fingerprintId' => '074c1ee676ed4998ab66491013c565e2',
            'captureOnLowRisk' => false,
            'voidOnHighRisk' => true,
            'browser' => [
                'cookieAccepted' => false,
                'email' => 'compradorteste@live.com',
                'ipAddress' => '200.242.30.253',
                'type' => 'Chrome',
            ],
            'cart' => [
                'isGift' => false,
                'returnsAccepted' => true,
                'items' => [
                    [
                        'giftCategory' => 'undefined',
                        'hostHedge' => 'Off',
                        'nonSensicalHedge' => 'Off',
                        'obscenitiesHedge' => 'Off',
                        'phoneHedge' => 'Off',
                        'name' => 'ItemTeste',
                        'quantity' => 1,
                        'sku' => '201411170235134521346',
                        'unitPrice' => 123,
                        'risk' => 'High',
                        'timeHedge' => 'Normal',
                        'type' => 'AdultContent',
                        'velocityHedge' => 'High',
                        'passenger' => [
                            'email' => 'compradorteste@live.com',
                            'identity' => '11225468954',
                            'name' => 'Comprador Accepted',
                            'rating' => 'Adult',
                            'phone' => '987654321',
                            'status' => 'Accepted'
                        ]
                    ]
                ]
            ],
            'merchantDefinedFields' => [
                [
                    'id' => '95',
                    'value' => 'Eu defini isto'
                ]
            ],
            'shipping' => [
                'addressee' => 'Sr. Comprador Teste',
                'method' => 'LowCost',
                'phone' => '987654321'
            ],
            'travel' => [
                'departureTime' => '2016-06-11',
                'journeyType' => 'Ida',
                'route' => 'MAO-RJO',
                'legs' => [
                    [
                        'destination' => 'GYN',
                        'origin' => 'VCP'
                    ]
                ]
            ]

        ]

    ]

];

$dados_venda_simplificada_debito = [
    'merchantOrderId' => 2016080600,
    'customer' => [
        'name' => 'Comprador de Testes',
    ],
    'payment' => [
        'type' => 'DebitCard',
        'amount' => 100,
        'ReturnUrl' => 'http://www.cielo.com.br',
        'debitCard' => [
            'cardNumber' => '4532117080573700',
            'holder' => 'Test T S Testando',
            'expirationDate' => '12/2021',
            'securityCode' => '000',
            'brand' => 'Visa'
        ]
    ]
];

$dados_venda_simplificada_boleto = [
    'merchantOrderId' => 2016080600,
    'customer' => [
        'name' => 'Comprador de Testes',
    ],
    'payment' => [
        'type' => 'Boleto',
        'amount' => 100,
        'provider' => 'Bradesco',
    ]
];

$dados_venda_completa_boleto = [
    'merchantOrderId' => 2016080600,
    'customer' => [
        'name' => 'Comprador de Testes',
        /*'identity' => '11225468954',
        'identityType' => 'CPF',
        'email' => 'compradordetestes@braspag.com.br',
        'birthDate' => '1991-01-02',
        'address' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ],
        'deliveryAddress' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ]*/
    ],
    'payment' => [
        'type' => 'Boleto',
        'amount' => 100,
        'provider' => 'Bradesco',
        'Address' => 'Rua Teste',
        'BoletoNumber' => '123',
        'Assignor' => 'Empresa Teste',
        'Demonstrative' => 'Desmonstrative Teste',
        'ExpirationDate' => '2015-01-05',
        'Identification' => '11884926754',
        'Instructions' => 'Aceitar somente até a data de vencimento, após essa data juros de 1% dia.'
    ]
];

//

$service = $service_production_braspag;
$service = $service_sandbox_braspag;
$service = $service_production_cielo;
$service = $service_sandbox_cielo;

//

$parameters = $dados_venda_simplificada_credito;
$parameters = $dados_venda_completa_credito;
$parameters = $dados_venda_autenticada_credito;
$parameters = $dados_venda_analise_fraude_credito;
$parameters = $dados_venda_simplificada_debito;
$parameters = $dados_venda_simplificada_boleto;
$parameters = $dados_venda_completa_boleto;

//

$service = $service_sandbox_cielo;
$parameters = $dados_venda_simplificada_boleto;

//

$response = $service->authorize($parameters);

echo '<h2>request</h2>';
//\Zend\Debug\Debug::dump($service);
\Zend\Debug\Debug::dump($parameters);

echo '<h2>response</h2>';

// isValid
if (array_key_exists("Volvo",$response)) {



    echo '<h2>isValid</h2>';
    \Zend\Debug\Debug::dump($response);

    /*
    if($response['payment']['returnCode'] == 6){
        printf("Transação autorizada com sucesso. TID=%s\n", $saleArray['payment']['tid']);
    }
    */

} else {

    echo '<h2>Not isValid</h2>';
    \Zend\Debug\Debug::dump($response);

}


/*

 curl --request POST "https://apisandbox.braspag.com.br/v2/sales/" --header "Content-Type: application/json" --header "MerchantId: 1985000c-22f7-4429-9a92-fa5cb27de0e0" --header "MerchantKey: VJGOUODUJMCLCDAVPIBSSAPMWCTQVQBTHOXRUZFS" --header "RequestId: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" --data-binary '{ "MerchantOrderId":"2014111703", "Customer":{ "Name":"Comprador Teste" }, "Payment":{ "Type":"CreditCard", "Amount":15700, "Provider":"Simulado", "Installments":1, "CreditCard":{ "CardNumber":"1234123412341231", "Holder":"Teste Holder", "ExpirationDate":"12/2021", "SecurityCode":"123", "Brand":"Visa" } } }' --verbose


 curl --request POST "https://apisandbox.cieloecommerce.cielo.com.br/1/sales/" --header "Content-Type: application/json" --header "MerchantId: a2133427-a0f8-4fe8-b605-6469161e7711" --header "MerchantKey: XUMUBMGQBPNUAYIESMSHTCNLVTNEXIDPHXQRZYOC" --header "RequestId: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" --data-binary '{   "MerchantOrderId":"2014111706", "Customer": {   "Name":"Comprador Teste" }, "Payment": {   "Type":"Boleto", "Amount":15700, "Provider":"Bradesco" } }' --verbose 

*/
