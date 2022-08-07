<?php

declare(strict_types=1);

namespace App\Service;

use Exception;
use Psr\Log\LoggerInterface;

class CheckAccess
{
//    private LoggerInterface $logger;
//
//    public function __constructor(LoggerInterface $logger): void
//    {
//        $this->logger = $logger;
//    }

    public function checkFtpAccess($data, LoggerInterface $ftpLogger): bool
    {
        try {
            $connection = ftp_connect($data['host'], $data['port']);
            $ftpLogger->info('Test');
            return ftp_login($connection, $data['user_name'], $data['password']);
        } catch (Exception $exception) {
            dump($exception->getMessage());

            return false;
        }
    }

    public function checkSshAccess($data): bool
    {
        try {
            $connection = ssh2_connect($data['host'], $data['port']);

            return ssh2_auth_password($connection, $data['user_name'], $data['password']);
        } catch (Exception $exception) {
            dump($exception->getMessage());

            return false;
        }
    }
}