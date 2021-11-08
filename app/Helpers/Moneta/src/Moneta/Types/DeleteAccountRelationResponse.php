<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;

/**
 * Ответ, который приходит на запрос DeleteAccountRelationRequest.
	 * В ответе нет никаких данных. Если в процессе сохранения счета произошла ошибка, то возникнет Exception. Если Exception не возник - значит делегированный доступ гарантированно удален.
	 * Response to DeleteAccountRelationRequest.
	 * If MONETA.RU deletes the information about delegated access successfully, the response contains no data. If MONETA.RU fails to delete the information, an error occurs.
	 *
 */
class DeleteAccountRelationResponse
{

}
