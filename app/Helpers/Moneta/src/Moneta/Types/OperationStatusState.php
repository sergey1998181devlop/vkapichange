<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;
/**
 *
 */
class OperationStatusState
{

	/**
	 * Средства списаны.
	 * The funds were debited from the payer's account.
	 *
	 *
	 * @var string
	 */
	const DEBITED = 'DEBITED';

	/**
	 * Средства зачислены.
	 * The funds were credited to the payee's account
	 *
	 *
	 * @var string
	 */
	const CREDITED = 'CREDITED';

	/**
	 * Выполнено.
	 * The transaction is completed.
	 *
	 *
	 * @var string
	 */
	const COMPLETED = 'COMPLETED';

	/**
	 * Заморожено.
	 * The transaction is frozen.
	 *
	 *
	 * @var string
	 */
	const FROZEN = 'FROZEN';

	/**
	 * Отменено.
	 * The transaction is cancelled.
	 *
	 *
	 * @var string
	 */
	const CANCELED = 'CANCELED';

}