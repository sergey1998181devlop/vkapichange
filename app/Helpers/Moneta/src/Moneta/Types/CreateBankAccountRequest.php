<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;

/**
 * Запрос на создание банковских реквизитов.
	 * Request for adding information about your bank account to your MONETA.RU profile.
	 *
 */
class CreateBankAccountRequest extends BankAccount
{

	/**
	 * Пользователь, которому будут принадлежать банковские реквизиты.
	 * Если это поле не задано, то банковские реквизиты создаются для текущего пользователя.
	 * The unique identifier of the user who will own the bank account.
	 * If you omit this element, MONETA.RU uses the ID of the user who sends the request.
	 *
	 *
	 * @var long
	 */
	 public $unitId = null;

	/**
	 *
	 *
	 *
	 * @var long
	 */
	 public $profileId = null;

}