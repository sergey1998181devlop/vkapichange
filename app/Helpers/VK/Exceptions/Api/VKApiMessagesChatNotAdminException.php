<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesChatNotAdminException extends VKApiException {

	/**
	 * VKApiMessagesChatNotAdminException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(925, 'You are not admin of this chat', $error);
	}
}
