<?php

namespace Moneta;

use App\Helpers\Moneta\src\Moneta;

class MonetaSdkEmptyKassa implements MonetaSdkKassa
{
    public function __construct() { }

    public function __destruct() { }

    public function authoriseKassa() { }

    public function checkKassaStatus() { }

    public function sendDocument($document) { }

    public function checkDocumentStatus() { }

}
