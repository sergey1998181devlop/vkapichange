<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiPollsAccessWithoutVoteException extends VKApiException {

	/**
	 * VKApiPollsAccessWithoutVoteException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(253, 'Access denied, please vote first', $error);
	}
}
