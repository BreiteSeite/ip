<?php
/**
 * Created by PhpStorm.
 * User: breiti
 * Date: 14/06/16
 * Time: 21:32
 */

namespace BreiteSeite\IP\IPv6;


class Address
{
    /**
     * @var \GMP
     */
    private $gmpAddress;

    /**
     * Address constructor.
     * @param \GMP $gmpAddress
     */
    private function __construct(\GMP $gmpAddress)
    {
        $this->gmpAddress = $gmpAddress;
    }

    public static function createIPv4Mapped(\BreiteSeite\IP\IPv4\Address $ipv4Address) : self
    {
        $mappedIpBinaryString = str_repeat('0', 80) . str_repeat('1', 16) . $ipv4Address->getAsBinary();

        return new self(gmp_init($mappedIpBinaryString, 2));
    }

    /**
     * @return string returns the binary representation of the IP with leading zeros (16 characters)
     */
    public function getAsBinary(): string
    {
        return str_pad(gmp_strval($this->gmpAddress, 2), 128, '0', STR_PAD_LEFT);
    }
}
