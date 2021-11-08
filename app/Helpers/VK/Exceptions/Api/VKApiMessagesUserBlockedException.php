<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesUserBlockedException extends VKApiException {

	/**
	 * VKApiMessagesUserBlockedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(900, 'Can\'t send messages for users from blacklist', $error);
	}
}
