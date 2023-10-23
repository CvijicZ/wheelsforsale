<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/app/ErrorHandler.php";
error_reporting(E_ALL | E_ERROR);
ini_set("display_errors", 0);
set_error_handler('ErrorHandler::handleError');
set_exception_handler('ErrorHandler::handleException');

