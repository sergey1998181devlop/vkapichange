<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiFriendsAddYourselfException extends VKApiException {

	/**
	 * VKApiFriendsAddYourselfException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(174, 'Cannot add user himself as friend', $error);
	}
}
