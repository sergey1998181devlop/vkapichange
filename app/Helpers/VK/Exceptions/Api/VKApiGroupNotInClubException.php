<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiGroupNotInClubException extends VKApiException {

	/**
	 * VKApiGroupNotInClubException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(701, 'User should be in club', $error);
	}
}
