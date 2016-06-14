<?php
/**
 * Created by PhpStorm.
 * User: breiti
 * Date: 14/06/16
 * Time: 21:28
 */

namespace BreiteSeite\IP\IPv4;


class Address
{
    /**
     * @var integer
     */
    private $ip;

    /**
     * Address constructor.
     * @param int $ip
     */
    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @param string $ipv4Address
     * @return $this
     */
    public static function fromString(string $ipv4Address)
    {
        return new self(ip2long($ipv4Address));
    }

    /**
     * @return int
     */
    public function getAsInteger(): int
    {
        return $this->ip;
    }
}
