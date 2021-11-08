<?php
namespace App\Helpers\VK\Exceptions\Api;

use App\Helpers\VK\Client\VKApiError;
use App\Helpers\VK\Exceptions\VKApiException;

/**
 */
class VKApiStatusNoAudioException extends VKApiException {

	/**
	 * VKApiStatusNoAudioException constructor.
	 *
	 * @param VkApiError $error
	 */
	public function __construct(VkApiError $error) {
		parent::__construct(221, 'User disabled track name broadcast', $error);
	}
}
