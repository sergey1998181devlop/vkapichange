<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiAppsAlreadyUnlockedException extends VKApiException {

	/**
	 * VKApiAppsAlreadyUnlockedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1251, 'This achievement is already unlocked', $error);
	}
}
