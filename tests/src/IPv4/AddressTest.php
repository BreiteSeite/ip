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
     * @covers \BreiteSeite\IP\IPv4\Address::getAsInteger()
     */
    public function testFromString(string $ip, int $integer, string $binary)
    {
        $ip = Address::fromString($ip);

        $this->assertSame($integer, $ip->getAsInteger());
        $this->assertSame($binary, $ip->getAsBinary());
    }

    /**
     * @return array
     */
    public function getIPAddressAsStringAndInteger(): array
    {
        return [
           ['0.0.0.0', 0, '00000000000000000000000000000000'],
           ['127.0.0.1', 2130706433, '01111111000000000000000000000001'],
        ];
    }

}
