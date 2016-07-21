<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

return [
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
    'apiUri' => 'https://apisandbox.braspag.com.br/v2',
    'apiQueryUri' => 'https://apiquerysandbox.braspag.com.br/v2',
    'currency' => 'BRL',
    'country' => 'BRA',
    'interest' => 'ByMerchant',
    'capture' => true,
    'authenticate' => false,
    'sequence' => 'AuthorizeFirst',
    'sequenceCriteria' => 'OnSuccess',
    'reasonCodes' => [
        0 => 'Successful',
        1 => 'AffiliationNotFound',
        2 => 'IssuficientFunds',
        3 => 'CouldNotGetCreditCard',
        4 => 'ConnectionWithAcquirerFailed',
        5 => 'InvalidTransactionType',
        6 => 'InvalidPaymentPlan',
        7 => 'Denied',
        8 => 'Scheduled',
        9 => 'Waiting',
        10 => 'Authenticated',
        11 => 'NotAuthenticated',
        12 => 'ProblemsWithCreditCard',
        13 => 'CardCanceled',
        14 => 'BlockedCreditCard',
        15 => 'CardExpired',
        16 => 'AbortedByFraud',
        17 => 'CouldNotAntifraud',
        18 => 'TryAgain',
        19 => 'InvalidAmount',
        20 => 'ProblemsWithIssuer',
        21 => 'InvalidCardNumber',
        22 => 'TimeOut',
        23 => 'CartaoProtegidoIsNotEnabled',
        24 => 'PaymentMethodIsNotEnabled',
        98 => 'InvalidRequest',
        99 => 'InternalError',
    ],
    'statusCodes' => [
        0 => 'NotFinished',
        1 => 'Authorized',
        2 => 'PaymentConfirmed',
        3 => 'Denied',
        10 => 'Voided',
        11 => 'Refunded',
        12 => 'Pending',
        13 => 'Aborted',
        20 => 'Scheduled',
    ]
];

