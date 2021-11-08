<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketGroupingItemsMustHaveDistinctPropertiesException extends VKApiException {

	/**
	 * VKApiMarketGroupingItemsMustHaveDistinctPropertiesException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1426, 'Item must have distinct properties', $error);
	}
}
