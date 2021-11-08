<?php

namespace App\Helpers\Moneta\src\Moneta;

use App\Helpers\Moneta\src\Moneta;


class MonetaSdkUtils
{
    /**
     * Paths
     */
	const INI_FILES_PATH 				= "/../../config/";
	const VIEW_FILES_PATH 				= "/../../view/";
    const EVENTS_FILES_PATH 			= "/../../events/";
	const LOGS_FILES_PATH 				= "/../../logs/";

    /**
     * ini Files
     */
	const INI_FILE_BASIC_SETTINGS 		= "basic_settings.ini";
    const INI_FILE_KASSA_SETTINGS 		= "kassa_settings.ini";
	const INI_FILE_DATA_STORAGE 		= "data_storage.ini";
	const INI_FILE_PAYMENT_SYSTEMS 		= "payment_systems.ini";
	const INI_FILE_PAYMENT_URLS 		= "payment_urls.ini";
	const INI_FILE_SUCCESS_FAIL_URLS 	= "success_fail_urls.ini";
	const INI_FILE_ERROR_TEXTS			= "error_texts.ini";
    const INI_FILE_ADDITIONAL_FIELDS	= "additional_field_names.ini";
    const INI_FILE_REGULAR_PAYMENTS	    = "regular_payments.ini";

    /**
     * Exception messages text
     */
	const EXCEPTION_NO_INI_FILE 		= ".ini file not found: ";
	const EXCEPTION_NO_VIEW_FILE 		= "view file not found: ";
	const EXCEPTION_NO_VALUE_IN_ARRAY 	= "no vallue in array: ";
    const EXCEPTION_NO_CERT_FILE 		= ".pem cert file not found: ";

    /**
     * Date format
     */
    const DATETIME_FORMAT               = 'c';

    const EXCEPTION_NO_PERMISSIONS = 'Please set 0777 permissions to the "logs" folder';

    /**
     * @var
     */
    public static $redirectArray;


    /**
     * @param null $configPath
     * @return array
     * @throws MonetaSdkException
     */
	public static function getAllSettings($configPath = null)
	{
        $iniFilesPath = $configPath ? $configPath : __DIR__ . self::INI_FILES_PATH;

		$arBasicSettings 	= self::getSettingsFromIniFile($iniFilesPath . self::INI_FILE_BASIC_SETTINGS);
        $arKassaSettings 	= self::getSettingsFromIniFile($iniFilesPath . self::INI_FILE_KASSA_SETTINGS);
		$arDataStorage 		= self::getSettingsFromIniFile($iniFilesPath . self::INI_FILE_DATA_STORAGE);
		$arPaymentSystems 	= self::getSettingsFromIniFile($iniFilesPath . self::INI_FILE_PAYMENT_SYSTEMS);
		$arPaymentUrls 		= self::getSettingsFromIniFile($iniFilesPath . self::INI_FILE_PAYMENT_URLS);
		$arSuccessFailUrls 	= self::getSettingsFromIniFile($iniFilesPath . self::INI_FILE_SUCCESS_FAIL_URLS);
		$arErrorTexts 		= self::getSettingsFromIniFile($iniFilesPath . self::INI_FILE_ERROR_TEXTS);
        $arAdditionalFields	= self::getSettingsFromIniFile($iniFilesPath . self::INI_FILE_ADDITIONAL_FIELDS);
        $arRegularPayments	= self::getSettingsFromIniFile($iniFilesPath . self::INI_FILE_REGULAR_PAYMENTS);

		return array_merge($arBasicSettings, $arKassaSettings, $arDataStorage, $arPaymentSystems, $arPaymentUrls, $arSuccessFailUrls, $arErrorTexts, $arAdditionalFields, $arRegularPayments);
	}

    /**
     * @param $attributes
     * @param $key
     * @return bool
     */
    public static function getValueFromMonetaAttributes($attributes, $key)
    {
        $result = false;
        if (is_array($attributes) && count($attributes)) {
            foreach ($attributes AS $attribute) {
                if (isset($attribute['key']) && isset($attribute['value']) && $attribute['key'] == $key) {
                    $result = $attribute['value'];
                    break;
                }
            }
        }

        return $result;
    }

    /**
     * @param $value
     * @param $array
     * @return mixed
     * @throws MonetaSdkException
     */
	public static function getValueFromArray($value, $array)
	{
	    $res = false;
        if (isset($array[$value])) {
            $res = $array[$value];
        }
		return $res;
	}

    /**
     * @param $viewName
     * @param $data
     * @param null $externalPath
     * @return bool|string
     */
	public static function requireView($viewName, $data, $externalPath = null)
	{
        $result = false;
        if ($externalPath && $externalPath != '') {
            $viewFileName = __DIR__ . $externalPath . $viewName . '.php';
        }
        else {
            $viewFileName = __DIR__ . self::VIEW_FILES_PATH . $viewName . '.php';
        }
		if (file_exists($viewFileName)) {
            ob_start();
			require($viewFileName);
            $result = ob_get_contents();
            ob_end_clean();
		}

        return $result;
	}

    /**
     * @param $eventName
     * @param $data
     * @param null $externalPath
     * @return bool
     */
    public static function handleEvent($eventName, $data, $externalPath = null)
    {
        $result = false;
        if (!$externalPath && $externalPath != '') {
            $eventFileName = __DIR__ . $externalPath . $eventName . '.php';
        }
        else {
            $eventFileName = __DIR__ . self::EVENTS_FILES_PATH . $eventName . '.php';
        }
        if (file_exists($eventFileName)) {
            require($eventFileName);
            $result = true;
        }

        return $result;
    }

    /**
     * @param $fileName
     * @return array
     * @throws MonetaSdkException
     */
	private static function getSettingsFromIniFile($fileName)
	{
		if (!file_exists($fileName)) {
			throw new MonetaSdkException(self::EXCEPTION_NO_INI_FILE . $fileName);
		}

		return parse_ini_file($fileName, true);
	}

    /**
     * @param $cookieName
     * @return null
     */
	public static function getSdkCookie($cookieName)
	{
		$result = null;
		if ($cookieName && isset($_COOKIE['mnt_data']) && $_COOKIE['mnt_data']) {
			$cookieMntSerializedData = $_COOKIE['mnt_data'];
			$cookieMntData = @unserialize($cookieMntSerializedData);
			if (isset($cookieMntData[$cookieName]) && $cookieMntData[$cookieName]) {
				$result = $cookieMntData[$cookieName];
			}
		}

		return $result;
	}

    /**
     * @param $cookieName
     * @param $cookieValue
     * @return bool
     */
	public static function setSdkCookie($cookieName, $cookieValue)
	{
		if (!$cookieName) {
			return false;
		}
		if (!$cookieValue) {
			$cookieValue = '';
		}
        self::$redirectArray[$cookieName] = $cookieValue;
		$cookieMntData = null;
		if (isset($_COOKIE['mnt_data']) && $_COOKIE['mnt_data']) {
			$cookieMntSerializedData = $_COOKIE['mnt_data'];
			$cookieMntData = @unserialize($cookieMntSerializedData);
		}
		if (!$cookieMntData) {
			$cookieMntData = array();
		}
		$cookieMntData[$cookieName] = $cookieValue;
        $cookieMntData = array_merge($cookieMntData, self::$redirectArray);
		setcookie('mnt_data', serialize($cookieMntData));

		return true;
	}

	public static function placeAdditionalValues($postData, $additionalData) {
	    $newPostData = array();
        if (is_array($postData) && count($postData)) {
            foreach ($postData AS $postDataItemKey => $postDataItemValue) {
                if (is_array($postDataItemValue) && isset($postDataItemValue['var'])) {
                    $keyName = str_replace('.', '_', $postDataItemValue['var']);
                    if (isset($additionalData[$keyName])) {
                        $postDataItemValue['value'] = $additionalData[$keyName];
                    }
                }
                $newPostData[$postDataItemKey] = $postDataItemValue;
            }
        }
        else {
            $newPostData = $postData;
        }

        return $newPostData;
    }

    /**
     * @param $message
     * @return int|null|void
     * @throws MonetaSdkException
     */
	public static function addToLog($message)
	{
		$errorHandlerFileName = __DIR__ . self::LOGS_FILES_PATH . date("Ymd").".txt";
        $result = null;
        if (substr(sprintf('%o', fileperms(__DIR__ . self::LOGS_FILES_PATH)), -4) != '0777') {
            if (!@chmod(__DIR__ . self::LOGS_FILES_PATH, 0777)) {
                throw new MonetaSdkException(self::EXCEPTION_NO_PERMISSIONS);
            }
        }
        // save error message to log file
        $fp = fopen($errorHandlerFileName, "a");
        if ($fp) {
            $message = "------------------------------------\n" . date("d.m.Y, H:i:s") . "\n" . $message;
            flock($fp, LOCK_EX);
            $result = fwrite($fp, $message);
            flock($fp, LOCK_UN);
            fclose($fp);
        }

        return $result;
	}

    /**
     * @param $string
     * @param $secret
     * @return string
     */
    public static function encrypt($string, $secret)
    {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $secret, utf8_encode($string), MCRYPT_MODE_ECB, $iv);

        return $encrypted_string;
    }

    /**
     * @param $string
     * @param $secret
     * @return string
     */
    public static function decrypt($string, $secret)
    {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $secret, $string, MCRYPT_MODE_ECB, $iv);

        return $decrypted_string;
    }

    /**
     * @return string
     */
    public static function getGUID()
    {
        return md5(uniqid(rand(0, 99999)));
    }

    /**
     * @param null $modification
     * @return bool|string
     */
    public static function getDateWithModification($modification = null)
    {
        $result = null;
        if (!$modification) {
            $result = date(self::DATETIME_FORMAT);
        }
        else {
            $currentTs = strtotime(date(self::DATETIME_FORMAT));
            $modifiedTs = strtotime($modification, $currentTs);
            $result = date(self::DATETIME_FORMAT, $modifiedTs);
        }

        return $result;
    }

    /**
     * @param $string
     * @return string
     */
    public static function convertEscapedUnicode($string = '')
    {
        $strName = (string)$string;
        $strName = preg_replace_callback('/u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $strName);
        return $strName = str_replace('\\', '', $strName);
    }
}
