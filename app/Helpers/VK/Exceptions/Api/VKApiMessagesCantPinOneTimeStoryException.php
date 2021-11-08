<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesCantPinOneTimeStoryException extends VKApiException {

	/**
	 * VKApiMessagesCantPinOneTimeStoryException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(942, 'Cannot pin one-time story', $error);
	}
}
