<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesTooLongForwardsException extends VKApiException {

	/**
	 * VKApiMessagesTooLongForwardsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(913, 'Too many forwarded messages', $error);
	}
}
