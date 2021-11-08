<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiAppsSubscriptionInvalidStatusException extends VKApiException {

	/**
	 * VKApiAppsSubscriptionInvalidStatusException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1257, 'Subscription is in invalid status', $error);
	}
}
