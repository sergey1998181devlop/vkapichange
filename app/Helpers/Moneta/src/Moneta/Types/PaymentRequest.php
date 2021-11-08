<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;

/**
 * Запрос на перевод денежных средств. Отличается от TransferRequest тем, что в качестве получателя можно указывать не только номер счета.
	 * Request for transferring money to another account. Unlike the Transfer request, the payee element in Payment request can specify not only the account number, but also a transaction ID, e-mail, or phone number.
	 *
 */
class PaymentRequest extends PaymentRequestType
{

}