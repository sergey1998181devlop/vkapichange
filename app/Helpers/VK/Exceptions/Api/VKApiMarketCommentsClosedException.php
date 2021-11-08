<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiMarketCommentsClosedException extends VKApiException {

	/**
	 * VKApiMarketCommentsClosedException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(1401, 'Comments for this market are closed', $error);
	}
}
