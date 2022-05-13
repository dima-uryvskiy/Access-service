<?php

namespace App\Service;

use Exception;

class CheckAccess
{
    public static function checkFtpAccess($data): bool
    {
        try {
            $connection = ftp_connect($data['host'], $data['port']);

            return ftp_login($connection, $data['user_name'], $data['password']);
        } catch (Exception $exception) {
            dump($exception->getMessage());

            return false;
        }
    }

    public static function checkSshAccess($data): bool
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