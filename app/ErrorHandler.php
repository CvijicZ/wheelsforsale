<?php

class ErrorHandler
{
    public static function handleError($errstr, $errno, $errfile, $errline)
    {
        $errtime = date('Y-m-d H:i:s');

        self::logError($errno, $errstr, $errfile, $errline, $errtime);

        self::safeRedirect();
        exit();
    }

    public static function handleException($exception)
    {
        $errstr = $exception->getMessage();
        $errno = $exception->getCode();
        $errfile = $exception->getFile();
        $errline = $exception->getLine();
        $errtime = date('Y-m-d H:i:s');

        self::logError($errstr, $errno, $errfile, $errline, $errtime);

        self::safeRedirect();
        exit();
    }

    private static function logError($errstr, $errno, $errfile, $errline, $errtime)
    {
        $errorData = [
            'error' => [
                'code' => $errno,
                'message' => $errstr,
                'file' => $errfile,
                'line' => $errline,
                'time' => $errtime
            ]
        ];

        $logFilePath = $_SERVER['DOCUMENT_ROOT'] . '/wheelsforsale/error_log.json';
        $existingData = file_exists($logFilePath) ? file_get_contents($logFilePath) : '';

        $existingArray = json_decode($existingData, true);

        $existingArray[] = $errorData;

        $jsonErrorData = json_encode($existingArray, JSON_PRETTY_PRINT);

        file_put_contents($logFilePath, $jsonErrorData);
    }

    private static function safeRedirect()
    {
        if (!isset($_GET['errorShown'])) {
            header('Location: /wheelsforsale/index.php?error=internal&errorShown=true');
            exit();
        }
    }
}