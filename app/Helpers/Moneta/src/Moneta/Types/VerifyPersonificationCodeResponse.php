<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;

/**
 * Ответ, который приходит на запрос VerifyPersonificationCodeRequest.
	 * Если код идентификации можно использовать (то есть, он найден и срок его действия не закончился), то в ответе придут данные пользователя, которые есть в системе Монета.Ру.
	 * Если код идентификации использовать нельзя, то возникнет Exception.
	 * Response to VerifyPersonificationCodeRequest.
	 * If the identification code is valid (that is MONETA.RU recognized the code and it is not expired), the response contains user information.
	 * If the identification code is invalid, an error occurs.
	 *
 */
class VerifyPersonificationCodeResponse
{

	/**
	 * В profile могут быть следующие поля (если они заполнены пользователем):
	 * first_name
	 * middle_initial_name
	 * last_name
	 * date_of_birth формат: yyyy-mm-dd
	 * legal_address
	 * inn
	 * User information might include the following attributes:
	 * first_name
	 * middle_initial_name
	 * last_name
	 * date_of_birth Use the following format: yyyy-mm-dd
	 * legal_address
	 * inn
	 *
	 *
	 * @var PersonalInformation
	 */
	 public $personalInformation = null;

}
