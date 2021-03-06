<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiWeightedFloodException extends VKApiException {

	/**
	 * VKApiWeightedFloodException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(601, 'Permission denied. You have requested too many actions this day. Try later.', $error);
	}
}
