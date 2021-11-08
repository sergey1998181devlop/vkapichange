<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesPrivacyException extends VKApiException {

	/**
	 * VKApiMessagesPrivacyException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(902, 'Can\'t send messages to this user due to their privacy settings', $error);
	}
}
