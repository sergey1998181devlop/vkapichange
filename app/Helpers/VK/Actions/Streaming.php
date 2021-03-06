<?php
namespace VK\Actions;

use App\Helpers\VK\Actions\Enums\StreamingMonthlyTier;
use App\Helpers\VK\Client\VKApiRequest;
use App\Helpers\VK\Exceptions\VKApiException;
use App\Helpers\VK\Exceptions\VKClientException;

/**
 */
class Streaming {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Streaming constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Allows to receive data for the connection to Streaming API.
	 *
	 * @param string $access_token
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getServerUrl($access_token) {
		return $this->request->post('streaming.getServerUrl', $access_token);
	}

	/**
	 * @param string $access_token
	 * @param array $params
	 * - @var StreamingMonthlyTier monthly_tier
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function setSettings($access_token, array $params = []) {
		return $this->request->post('streaming.setSettings', $access_token, $params);
	}
}
