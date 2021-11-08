<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;

/**
 * Ответ на запрос информации о финансовых потоках.
	 * Response to the financial flow request.
	 *
 */
class GetFinancialFlowsListResponse
{

	/**
	 *
	 *
	 * @var GetFinancialFlowsListResponseFinancialFlow
	 */
	 public $financialFlow = null;

	/**
	 *
	 *
	 * @param GetFinancialFlowsListResponseFinancialFlow
	 *
	 * @return void
	 */
	public function addFinancialFlow(GetFinancialFlowsListResponseFinancialFlow $item)
	{
		$this->financialFlow[] = $item;
	}

}
