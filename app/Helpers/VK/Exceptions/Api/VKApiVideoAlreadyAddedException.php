<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiVideoAlreadyAddedException extends VKApiException {

	/**
	 * VKApiVideoAlreadyAddedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(800, 'This video is already added', $error);
	}
}
