<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMobileNotActivatedException extends VKApiException {

	/**
	 * VKApiMobileNotActivatedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(146, 'The mobile number of the user is unknown', $error);
	}
}
