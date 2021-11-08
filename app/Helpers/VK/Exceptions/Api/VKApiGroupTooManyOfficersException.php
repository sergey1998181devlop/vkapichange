<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiGroupTooManyOfficersException extends VKApiException {

	/**
	 * VKApiGroupTooManyOfficersException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(702, 'Too many officers in club', $error);
	}
}
