<?php
/**
 * Created by PhpStorm.
 * User: breiti
 * Date: 14/06/16
 * Time: 22:15
 */

namespace BreiteSeite\IP\Formatter\IPv6;


interface FormatterInterface
{
    public function getAsHexString(): string;
}