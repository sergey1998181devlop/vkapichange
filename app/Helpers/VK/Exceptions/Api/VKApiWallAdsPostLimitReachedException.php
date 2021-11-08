<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiWallAdsPostLimitReachedException extends VKApiException {

	/**
	 * VKApiWallAdsPostLimitReachedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(224, 'Too many ads posts', $error);
	}
}
