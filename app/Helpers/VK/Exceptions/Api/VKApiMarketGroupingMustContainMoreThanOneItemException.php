<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketGroupingMustContainMoreThanOneItemException extends VKApiException {

	/**
	 * VKApiMarketGroupingMustContainMoreThanOneItemException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1425, 'Grouping must have two or more items', $error);
	}
}
