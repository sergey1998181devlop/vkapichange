<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;

/**
 * Юридические реквизиты в системе МОНЕТА.РУ. Данные представляются в виде "ключ-значение".
	 * Возможные ключи:
	 * inn. ИНН.
	 * kpp. КПП.
	 * ogrn. ОГРН.
	 * ogrnip. ОГРНИП.
	 * okpo. ОКПО.
	 * okved. ОКВЭД.
	 * Legal information in the list of key-value pairs.
	 * Valid keys are:
	 * inn. Tax Reference Number.
	 * kpp. Industrial Enterprises Classifier.
	 * ogrn. Primary State Registration Number (PSRN).
	 * ogrnip. Primary State Registration Number of the Sole Proprietor.
	 * okpo. Russian National Nomenclature of Businesses and Organizations.
	 * okved. Russian National Classifier of Economic Activities.
	 *
 */
class LegalInformation
{

	/**
	 * ID юридических реквизитов.
	 * Legal information ID.
	 *
	 *
	 * @var long
	 */
	 public $id = null;

	/**
	 *
	 *
	 * @var KeyValueAttribute
	 */
	 public $attribute = null;

	/**
	 *
	 *
	 * @param KeyValueAttribute
	 *
	 * @return void
	 */
	public function addAttribute(KeyValueAttribute $item)
	{
		$this->attribute[] = $item;
	}

}