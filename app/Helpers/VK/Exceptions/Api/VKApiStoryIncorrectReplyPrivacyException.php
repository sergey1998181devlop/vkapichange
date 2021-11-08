<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiStoryIncorrectReplyPrivacyException extends VKApiException {

	/**
	 * VKApiStoryIncorrectReplyPrivacyException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1602, 'Incorrect reply privacy', $error);
	}
}
