<?php
/**
 * Created by PhpStorm.
 * User: breiti
 * Date: 14/06/16
 * Time: 21:58
 */

namespace BreiteSeite\IPTests\IPv4;


use BreiteSeite\IP\IPv4\Address;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $ip
     * @param int $integer
     *
     * @dataProvider getIpAddressAsStringAndInteger
     */
    public function testFromString(string $ip, int $integer)
    {
        $ip = Address::fromString($ip);

        $this->assertSame($integer, $ip->getAsInteger());
    }

    /**
     * @return array
     */
    public function getIPAddressAsStringAndInteger(): array
    {
        return [
           ['0.0.0.0', 0],
           ['127.0.0.1', 2130706433]
        ];
    }
}
