<?php

// Warning! This code was generated by WSDL2PHP tool.
// author: Filippov Andrey <afi.work@gmail.com>
// see https://solo-framework-lib.googlecode.com

namespace App\Helpers\Moneta\src\Moneta\Types;

/**
 * Ответ на запрос создания/редактирования файла документа.
	 * Если в процессе сохранения файла произошла ошибка, то возникнет Exception. Если Exception не возник - значит файл гарантированно сохранен.
	 * Response to the request for adding or modifying a file (UploadProfileDocumentFileRequest).
	 * If MONETA.RU processes the request successfully, the response contains no data. If MONETA.RU cannot process the request, an error occurs.
	 *
 */
class UploadProfileDocumentFileResponse
{

	/**
	 * ID файла.
	 * File ID.
	 *
	 *
	 * @var long
	 */
	 public $fileId = null;

}