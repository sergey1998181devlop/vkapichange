<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiGroupTooManyAddressesException extends VKApiException {

	/**
	 * VKApiGroupTooManyAddressesException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(706, 'Too many addresses in club', $error);
	}
}
