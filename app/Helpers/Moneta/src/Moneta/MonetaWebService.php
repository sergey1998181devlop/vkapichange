<?php
/**
 * Класс для доступа к методам вебсервиса платежной системы www.moneta.ru
 *
 * PHP version 5
 *
 * @package Moneta
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace Moneta;

use App\Helpers\Moneta\src\Moneta\MonetaWebServiceConnector;

class MonetaWebService extends MonetaWebServiceConnector
{

	/**
	 * Версия API
	 *
	 * @var string
	 */
	public $version = "VERSION_2";

	/**
	 * Конструктор
	 *
	 * @param string $wsdl путь к файлу описания методов Moneta.MerchantAPI
	 * @param string $username Имя пользователя  для доступа к методам
	 * @param string $password Пароль для доступа к методам
	 * @param array $options Опции, аналогичные SoapClient->__construct()
	 *
	 * @param bool $isDebug Режим отладки (кешируется WSDL)
	 *
	 * @return \MonetaWebService
	 */
	function __construct($wsdl, $username, $password, $options = null, $isDebug = false)
	{
		// Отключаем кэширование в режиме отладки
		ini_set("soap.wsdl_cache_enabled", !$isDebug);

		// время жизни кэша
		if (!$isDebug)
			ini_set("soap.wsdl_cache_ttl", "86400");

		if ($options === null)
			$options = array();

		parent::__construct($wsdl, $options);
		$this->inputHeaders[] = $this->createSecurityHeader($username, $password);
	}

	/**
	 * Создает заголовок для авторизации в веб-сервисе
	 * в соответствии со схемой
	 * http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd
	 *
	 * @param string $userName Имя пользователя
	 * @param string $password Пароль для доступа к веб-сервису
	 *
	 * @return \SoapHeader
	 */
	private function createSecurityHeader($userName, $password)
	{
		$sns = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd";

		// формируем параметр username
		$username = new \SoapVar($userName, XSD_STRING, NULL, $sns, NULL, $sns);

		// формируем параметр password
		$password = new \SoapVar($password, XSD_STRING, NULL, $sns, NULL, $sns);

		// Для того чтобы выразить тег <UserNameToken> с вложенными внутри него тегами <Username> и <Password>,
		// мы должны определить промежуточный класс
		$tmp = new \stdClass();
		$tmp->Username = $username;
		$tmp->Password = $password;

		// содержимое сложного XML-тега <UsernameToken> в виде SoapVar,
		// тип которого не XSD_STRING, а SOAP_ENC_OBJECT
		$authData = new \SoapVar($tmp, SOAP_ENC_OBJECT, null, $sns, 'wsse:UsernameToken', $sns);

		// формируем содержимое тега Security , т.е. сам UsernameToken
		$tmp = new \stdClass();
		$tmp->UsernameToken = $authData;

		$usernameToken = new \SoapVar($tmp, SOAP_ENC_OBJECT, null, $sns, 'wsse:UsernameToken', $sns);

		//Объект UsernameToken присоединяется к своему родительскому XML-тегу <Security>
		// и создается SoapHeader <Security>
		$secHeaderValue = new \SoapVar($usernameToken, SOAP_ENC_OBJECT, NULL, $sns, 'wsse:Security', $sns);
		return new \SoapHeader($sns, 'Security', $secHeaderValue, true);
	}


	/**
	 * Call method of web-service
	 *
	 * @param string $method Method name
	 * @param mixed $data Data
	 * @param mixed $options Options corresponding like SoapClient->__soapCall()
	 *
	 * @return mixed
	 */
	protected function call($method, $data, $options = null)
	{
		// этот костыль для установки версии API (нужен рефакторинг метода call)
		if (is_object($data[0]))
			$data[0]->version = $this->version;
		return $this->client->__soapCall($method, $data, $options, $this->inputHeaders, $this->outputHeaders);
	}
}
