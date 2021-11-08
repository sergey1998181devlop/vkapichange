<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;

/**
 * Тип, описывающий суммы и комиссии в предварительном расчете операции.
	 * Transaction amount and estimated fees for a transaction.
	 *
 */
class ForecastTransactionResponseType
{

	/**
	 * Номер счета плательщика.
	 * Account number of the payer.
	 *
	 *
	 * @var long
	 */
	 public $payer = null;

	/**
	 * Валюта счета плательщика.
	 * Currency of the payer's account.
	 *
	 *
	 * @var string
	 */
	 public $payerCurrency = null;

	/**
	 * Сумма к списанию.
	 * The amount to be transferred from the payer's account.
	 *
	 *
	 * @var decimal
	 */
	 public $payerAmount = null;

	/**
	 * Комиссия списания средств.
	 * Transaction fee to the payer.
	 *
	 *
	 * @var decimal
	 */
	 public $payerFee = null;

	/**
	 * Номер счета получателя.
	 * Payee's account number.
	 *
	 *
	 * @var long
	 */
	 public $payee = null;

	/**
	 * Валюта счета получателя.
	 * Currency of the payee's account.
	 *
	 *
	 * @var string
	 */
	 public $payeeCurrency = null;

	/**
	 * Сумма к зачислению.
	 * The amount to be transferred to the payee's account.
	 *
	 *
	 * @var decimal
	 */
	 public $payeeAmount = null;

	/**
	 * Комиссия зачисления средств.
	 * Transaction fee to the payee.
	 *
	 *
	 * @var decimal
	 */
	 public $payeeFee = null;

	/**
	 * Название счета плательщика.
	 * Payer's account alias.
	 *
	 *
	 * @var string
	 */
	 public $payerAlias = null;

	/**
	 * Название счета получателя.
	 * Payee's account alias.
	 *
	 *
	 * @var string
	 */
	 public $payeeAlias = null;

}
