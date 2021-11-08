<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesKeyboardInvalidException extends VKApiException {

	/**
	 * VKApiMessagesKeyboardInvalidException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(911, 'Keyboard format is invalid', $error);
	}
}
