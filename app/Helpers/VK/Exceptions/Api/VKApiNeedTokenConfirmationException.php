<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiNeedTokenConfirmationException extends VKApiException {

	/**
	 * VKApiNeedTokenConfirmationException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(25, 'Token confirmation required', $error);
	}
}
