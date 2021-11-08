<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;

/**
 * Тип для запроса на регистрацию операции с блокировкой средств на счете плательщика.
	 * Request parameters for an authorization hold on the payment amount in a customer's account.
	 *
 */
class AuthoriseTransactionRequestType extends TransactionRequestType
{

	/**
	 * Номер операции.
	 * MONETA.RU transaction ID.
	 *
	 *
	 * @var long
	 */
	 public $transactionId = null;

}