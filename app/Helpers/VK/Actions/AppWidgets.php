<?php
namespace VK\Actions;

use App\Helpers\VK\Actions\Enums\AppWidgetsType;
use App\Helpers\VK\Client\VKApiRequest;
use App\Helpers\VK\Exceptions\Api\VKApiBlockedException;
use App\Helpers\VK\Exceptions\Api\VKApiCompileException;
use App\Helpers\VK\Exceptions\Api\VKApiParamGroupIdException;
use App\Helpers\VK\Exceptions\Api\VKApiRuntimeException;
use App\Helpers\VK\Exceptions\Api\VKApiWallAccessPostException;
use App\Helpers\VK\Exceptions\Api\VKApiWallAccessRepliesException;
use App\Helpers\VK\Exceptions\VKApiException;
use App\Helpers\VK\Exceptions\VKClientException;

/**
 */
class AppWidgets {

	/**
	 * @var VKApiRequest
	 */
	private $request;

	/**
	 * AppWidgets constructor.
	 *
	 * @param VKApiRequest $request
	 */
	public function __construct(VKApiRequest $request) {
		$this->request = $request;
	}

	/**
	 * Allows to update community app widget
	 *
	 * @param string $access_token
	 * @param array $params
	 * - @var string code
	 * - @var AppWidgetsType type
	 * @throws VKClientException
	 * @throws VKApiException
	 * @throws VKApiCompileException Unable to compile code
	 * @throws VKApiRuntimeException Runtime error occurred during code invocation
	 * @throws VKApiBlockedException Content blocked
	 * @throws VKApiWallAccessPostException Access to wall's post denied
	 * @throws VKApiWallAccessRepliesException Access to post comments denied
	 * @throws VKApiParamGroupIdException Invalid group id
	 * @return mixed
	 */
	public function update($access_token, array $params = []) {
		return $this->request->post('appWidgets.update', $access_token, $params);
	}
}
