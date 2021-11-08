<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiTooManyException extends VKApiException {

	/**
	 * VKApiTooManyException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(6, 'Too many requests per second', $error);
	}
}