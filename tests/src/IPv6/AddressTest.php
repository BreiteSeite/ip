<?php
/**
 * Created by PhpStorm.
 * User: breiti
 * Date: 16/06/16
 * Time: 00:54
 */

namespace BreiteSeite\IPTests\IPv6;


use BreiteSeite\IP\IPv6\Address;

class AddressTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers BreiteSeite\IP\IPv6\Address::createIPv4Mapped()
     * @covers BreiteSeite\IP\IPv6\Address::getAsBinary()
     */
    public function testCreateIpv4Mapped()
    {
        $address = Address::createIPv4Mapped(\BreiteSeite\IP\IPv4\Address::fromString('0.0.0.1'));

        $this->assertSame('00000000000000000000000000000000000000000000000000000000000000000000000000000000111111111111111100000000000000000000000000000001', $address->getAsBinary());
    }
}
