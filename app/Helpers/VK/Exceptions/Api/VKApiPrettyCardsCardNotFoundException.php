<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiPrettyCardsCardNotFoundException extends VKApiException {

	/**
	 * VKApiPrettyCardsCardNotFoundException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1900, 'Card not found', $error);
	}
}
