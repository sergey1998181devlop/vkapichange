<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesChatNotExistException extends VKApiException {

	/**
	 * VKApiMessagesChatNotExistException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(927, 'Chat does not exist', $error);
	}
}
