<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesEditKindDisallowedException extends VKApiException {

	/**
	 * VKApiMessagesEditKindDisallowedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(920, 'Can\'t edit this kind of message', $error);
	}
}
