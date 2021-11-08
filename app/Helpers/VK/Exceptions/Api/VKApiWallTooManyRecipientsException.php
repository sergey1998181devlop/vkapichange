<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiWallTooManyRecipientsException extends VKApiException {

	/**
	 * VKApiWallTooManyRecipientsException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(220, 'Too many recipients', $error);
	}
}
