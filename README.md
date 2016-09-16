![valid XHTML][checkmark]
[checkmark]: https://raw.githubusercontent.com/mozgbrasil/mozgbrasil.github.io/master/assets/images/logos/Red_star_32_32.png "MOZG"
[psr4]: http://www.php-fig.org/psr/psr-4/
[requirements]: http://mozgbrasil.github.io/requirements/
[getcomposer]: https://getcomposer.org/
[uninstall-mods]: https://getcomposer.org/doc/03-cli.md#remove

# Mozg\CieloBraspagSdkPhp

## Sinopse

SDK de integração a Cielo e Braspag

## Instalação - Atualização - Desinstalação

Esta biblioteca destina-se a ser instalado usando o [Composer][getcomposer].

Autoloading compatível é [PSR-4][psr4]

--

### Para instalar o módulo execute o comando a seguir no terminal do seu servidor

    composer require mozgbrasil/cielo-braspag-sdk-php

-- 

### Para atualizar o módulo execute o comando a seguir no terminal do seu servidor

    composer clear-cache && composer update

--

### Para [desinstalar][uninstall-mods] o módulo execute o comando a seguir no terminal do seu servidor

    composer remove mozgbrasil/cielo-braspag-sdk-php && composer clear-cache && composer update

## Perguntas mais frequentes "FAQ"

### Obtendo o MerchantId e MerchantKey

Efetue o cadastro no seguinte ambiente para obter os dados de integração

https://cadastrosandbox.cieloecommerce.cielo.com.br/

https://cadastrosandbox.braspag.com.br/

#### Simulação de transação

Braspag API (V2) - http://apidocs.braspag.com.br/

Temos o devido retorno ao processar a seguinte requisição via terminal local

    curl --request POST https://apisandbox.braspag.com.br/v2/sales/ --header "Content-Type: application/json" --header "MerchantId: 1985000c-22f7-4429-9a92-fa5cb27de0e0" --header "MerchantKey: VJGOUODUJMCLCDAVPIBSSAPMWCTQVQBTHOXRUZFS" --header "RequestId: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" --data '{  
        "MerchantOrderId":"2014111703",
        "Customer":{  
            "Name":"Comprador Teste"     
        },
        "Payment":{  
            "Type":"CreditCard",
            "Amount":15700,
            "Provider":"Simulado",
            "Installments":1,
            "CreditCard":{  
                "CardNumber":"1234123412341231",
                "Holder":"Teste Holder",
                "ExpirationDate":"12/2021",
                "SecurityCode":"123",
                "Brand":"Visa"
            }
        }
    }' --verbose

ou acesse http://onlinecurl.com/ e informe o comando

    curl --data { "MerchantOrderId":"2014111703", "Customer":{ "Name":"Comprador Teste" }, "Payment":{ "Type":"CreditCard", "Amount":15700, "Provider":"Simulado", "Installments":1, "CreditCard":{ "CardNumber":"1234123412341231", "Holder":"Teste Holder", "ExpirationDate":"12/2021", "SecurityCode":"123", "Brand":"Visa" } } } --header RequestId: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx --header MerchantKey: VJGOUODUJMCLCDAVPIBSSAPMWCTQVQBTHOXRUZFS --header MerchantId: 1985000c-22f7-4429-9a92-fa5cb27de0e0 --header Content-Type: application/json --request POST https://apisandbox.braspag.com.br/v2/sales/

Cielo API 3.0 - https://developercielo.github.io/Webservice-3.0/

Temos o devido retorno ao processar a seguinte requisição via terminal local

    curl --request POST https://apisandbox.cieloecommerce.cielo.com.br/1/sales/ --header "Content-Type: application/json" --header "MerchantId: a2133427-a0f8-4fe8-b605-6469161e7711" --header "MerchantKey: XUMUBMGQBPNUAYIESMSHTCNLVTNEXIDPHXQRZYOC" --header "RequestId: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" --data '{  
        "MerchantOrderId":"2014111706",
        "Customer":
        {  
            "Name":"Comprador Teste"
        },
        "Payment":
        {  
            "Type":"EletronicTransfer",
            "Amount":15700,
            "Provider":"Bradesco",
            "ReturnUrl":"http://www.cielo.com.br"
        }
    }' --verbose

ou acesse http://onlinecurl.com/ e informe o comando

    curl --data { "MerchantOrderId":"2014111706", "Customer": { "Name":"Comprador Teste" }, "Payment": { "Type":"EletronicTransfer", "Amount":15700, "Provider":"Bradesco", "ReturnUrl":"http://www.cielo.com.br" } } --header RequestId: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx --header MerchantKey: XUMUBMGQBPNUAYIESMSHTCNLVTNEXIDPHXQRZYOC --header MerchantId: a2133427-a0f8-4fe8-b605-6469161e7711 --header Content-Type: application/json --request POST https://apisandbox.cieloecommerce.cielo.com.br/1/sales/

### Sobre o retorno "129 - Affiliation not found" ou "314 - Invalid Integration"

Se trata de erro relacionado ao MerchantId e MerchantKey inválido

Como as simulações acima estão funcionais você pode alterar somente o MerchantId e MerchantKey para testar se seus dados de filiação está retornando o processo de transação

## Badges

[![Join the chat at https://gitter.im/mozgbrasil](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/mozgbrasil/)
[![Latest Stable Version](https://poser.pugx.org/mozgbrasil/cielo-braspag-sdk-php/v/stable)](https://packagist.org/packages/mozgbrasil/cielo-braspag-sdk-php)
[![Total Downloads](https://poser.pugx.org/mozgbrasil/cielo-braspag-sdk-php/downloads)](https://packagist.org/packages/mozgbrasil/cielo-braspag-sdk-php)
[![Latest Unstable Version](https://poser.pugx.org/mozgbrasil/cielo-braspag-sdk-php/v/unstable)](https://packagist.org/packages/mozgbrasil/cielo-braspag-sdk-php)
[![License](https://poser.pugx.org/mozgbrasil/cielo-braspag-sdk-php/license)](https://packagist.org/packages/mozgbrasil/cielo-braspag-sdk-php)
[![Monthly Downloads](https://poser.pugx.org/mozgbrasil/cielo-braspag-sdk-php/d/monthly)](https://packagist.org/packages/mozgbrasil/cielo-braspag-sdk-php)
[![Daily Downloads](https://poser.pugx.org/mozgbrasil/cielo-braspag-sdk-php/d/daily)](https://packagist.org/packages/mozgbrasil/cielo-braspag-sdk-php)
[![Build Status](https://travis-ci.org/mozgbrasil/cielo-braspag-sdk-php.svg?branch=master)](https://travis-ci.org/mozgbrasil/cielo-braspag-sdk-php)

:cat2: