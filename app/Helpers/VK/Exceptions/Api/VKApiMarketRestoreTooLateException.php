<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketRestoreTooLateException extends VKApiException {

	/**
	 * VKApiMarketRestoreTooLateException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1400, 'Too late for restore', $error);
	}
}
