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
    public readonly string $accessType;

    public readonly string $host;

    /**
     * @SerializedName("user_name")
     */
    public readonly string $userName;

    public readonly string $password;

    public readonly string $port;

    public function __construct(string $clientName, $accessType, $host, $userName, $password, $port)
    {
        $this->clientName = $clientName;
        $this->accessType = $accessType;
        $this->host = $host;
        $this->userName = $userName;
        $this->password = $password;
        $this->port = $port;
    }
}
