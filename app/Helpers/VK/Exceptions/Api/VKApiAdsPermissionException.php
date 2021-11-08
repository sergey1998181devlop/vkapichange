<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiAdsPermissionException extends VKApiException {

	/**
	 * VKApiAdsPermissionException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(600, 'Permission denied. You have no access to operations specified with given object(s)', $error);
	}
}
