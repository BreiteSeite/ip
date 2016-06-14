<?php
/**
 * Created by PhpStorm.
 * User: breiti
 * Date: 14/06/16
 * Time: 21:32
 */

namespace BreiteSeite\IP\IPv6;


use BreiteSeite\IP\Formatter\IPv6\FormatterInterface;
use BreiteSeite\IP\Formatter\IPv6\GmpFormatter;

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
        $mappedIpBinaryString = str_repeat('0', 80) . str_repeat('1', 16) . decbin($ipv4Address->getAsInteger());

        return new self(gmp_init($mappedIpBinaryString, 2));
    }

    /**
     * @return FormatterInterface
     */
    public function createFormatter() : FormatterInterface
    {
        return new GmpFormatter($this->gmpAddress);
    }
}
