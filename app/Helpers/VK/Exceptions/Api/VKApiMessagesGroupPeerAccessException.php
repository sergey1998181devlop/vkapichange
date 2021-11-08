<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesGroupPeerAccessException extends VKApiException {

	/**
	 * VKApiMessagesGroupPeerAccessException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(932, 'Your community can\'t interact with this peer', $error);
	}
}
