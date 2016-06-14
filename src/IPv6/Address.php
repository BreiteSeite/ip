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
    private $ip;

    /**
     * Address constructor.
     * @param \GMP $ip
     */
    public function __construct(\GMP $ip)
    {
        $this->ip = $ip;
    }


    public static function createIPv4Mapped(\BreiteSeite\IP\IPv4\Address $ipv4Address) : self
    {
        $IPv4MappedIPv6BinaryString = str_repeat('0', 80) . str_repeat('1', 16) . decbin($ipv4Address->getAsInteger());

        return new self(gmp_init($IPv4MappedIPv6BinaryString, 2));
    }

    /**
     * @return FormatterInterface
     */
    public function createFormatter() : FormatterInterface
    {
        return new GmpFormatter($this->ip);
    }
}
