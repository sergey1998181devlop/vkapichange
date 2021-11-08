<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMethodPermissionException extends VKApiException {

	/**
	 * VKApiMethodPermissionException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(20, 'Permission to perform this action is denied for non-standalone applications', $error);
	}
}
