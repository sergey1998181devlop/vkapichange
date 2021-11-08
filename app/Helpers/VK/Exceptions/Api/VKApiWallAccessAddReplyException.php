<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiWallAccessAddReplyException extends VKApiException {

	/**
	 * VKApiWallAccessAddReplyException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(213, 'Access to status replies denied', $error);
	}
}
