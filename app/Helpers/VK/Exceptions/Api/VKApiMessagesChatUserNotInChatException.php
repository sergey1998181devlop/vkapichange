<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesChatUserNotInChatException extends VKApiException {

	/**
	 * VKApiMessagesChatUserNotInChatException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(935, 'User not found in chat', $error);
	}
}
