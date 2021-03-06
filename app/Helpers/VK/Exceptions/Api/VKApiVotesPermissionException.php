<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiVotesPermissionException extends VKApiException {

	/**
	 * VKApiVotesPermissionException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(500, 'Permission denied. You must enable votes processing in application settings', $error);
	}
}
