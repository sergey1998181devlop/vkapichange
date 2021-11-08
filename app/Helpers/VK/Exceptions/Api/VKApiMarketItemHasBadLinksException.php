<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketItemHasBadLinksException extends VKApiException {

	/**
	 * VKApiMarketItemHasBadLinksException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1408, 'Item has bad links in description', $error);
	}
}
