<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiFriendsAddInEnemyException extends VKApiException {

	/**
	 * VKApiFriendsAddInEnemyException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(175, 'Cannot add this user to friends as they have put you on their blacklist', $error);
	}
}
