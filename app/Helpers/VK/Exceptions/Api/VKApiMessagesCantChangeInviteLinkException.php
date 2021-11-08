<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMessagesCantChangeInviteLinkException extends VKApiException {

	/**
	 * VKApiMessagesCantChangeInviteLinkException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(931, 'You can\'t change invite link for this chat', $error);
	}
}
