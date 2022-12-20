<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ClientData
{
    /**
     * @SerializedName("client_name")
     */
    public readonly string $clientName;

    /**
     * @SerializedName("access_type")
     */
    public readonly  string $accessType;

    public readonly string $host;

    /**
     * @SerializedName("user_name")
     */
    public readonly string $userName;

    public readonly string $password;

    public readonly string $port;

    /**
     * @param string $clientName
     */
    public function setClientName(string $clientName): void
    {
        $this->clientName = $clientName;
    }

    /**
     * @param string $accessType
     */
    public function setAccessType(string $accessType): void
    {
        $this->accessType = $accessType;
    }

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $port
     */
    public function setPort(string $port): void
    {
        $this->port = $port;
    }
}
