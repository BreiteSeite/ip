<?php
/**
 * Created by PhpStorm.
 * User: breiti
 * Date: 14/06/16
 * Time: 22:30
 */

namespace BreiteSeite\IPTests\Formatter\IPv6;


use BreiteSeite\IP\Formatter\IPv6\GmpFormatter;

class GmpFormatterTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAsHexString()
    {
        // https://en.wikipedia.org/wiki/IPv6_address#/media/File:Ipv6_address_leading_zeros.svg
        $formatter = new GmpFormatter(
            gmp_init('00100000000000010000110110111000101011000001000011111110000000010000000000000000000000000000000000000000000000000000000000000000', 2)
        );

        $this->assertSame('2001:DB8:AC10:FE01:0:0:0:0', $formatter->getAsHexString());
    }
}
