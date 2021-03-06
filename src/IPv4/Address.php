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
     * @var int
     */
    private $address;

    /**
     * Address constructor.
     * @param int $address
     */
    private function __construct(int $address)
    {
        $this->address = $address;
    }

    /**
     * @param string $ipv4Address
     * @return self
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
        return $this->address;
    }

    public function getAsBinary(): string
    {
        return str_pad(decbin($this->address), 32, '0', STR_PAD_LEFT);
    }
}
