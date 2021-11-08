<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiPhoneAlreadyUsedException extends VKApiException {

	/**
	 * VKApiPhoneAlreadyUsedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1004, 'This phone number is used by another user', $error);
	}
}
