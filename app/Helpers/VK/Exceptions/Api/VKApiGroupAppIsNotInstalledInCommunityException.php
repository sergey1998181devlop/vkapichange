<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiGroupAppIsNotInstalledInCommunityException extends VKApiException {

	/**
	 * VKApiGroupAppIsNotInstalledInCommunityException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(711, 'Application is not installed in community', $error);
	}
}
