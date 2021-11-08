<?php
namespace VK\Actions;

use App\Helpers\VK\Client\VKApiRequest;
use App\Helpers\VK\Exceptions\VKApiException;
use App\Helpers\VK\Exceptions\VKClientException;

/**
 */
class Search {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * Search constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Allows the programmer to do a quick search for any substring.
	 *
	 * @param string $access_token
	 * @param array $params
	 * - @var string q: Search query string.
	 * - @var integer offset: Offset for querying specific result subset
	 * - @var integer limit: Maximum number of results to return.
	 * - @var array[string] filters
	 * - @var array[string] fields
	 * - @var boolean search_global
	 * @throws VKClientException
	 * @throws VKApiException
	 * @return mixed
	 */
	public function getHints($access_token, array $params = []) {
		return $this->request->post('search.getHints', $access_token, $params);
	}
}
