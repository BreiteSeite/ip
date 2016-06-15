<?php
/**
 * Created by PhpStorm.
 * User: breiti
 * Date: 14/06/16
 * Time: 22:16
 */

namespace BreiteSeite\IP\Formatter\IPv6;


class GmpFormatter implements FormatterInterface
{
    /**
     * @var \GMP
     */
    private $gmpNumber;

    /**
     * GmpFormatter constructor.
     * @param \GMP $gmpNumber
     */
    public function __construct(\GMP $gmpNumber)
    {
        $this->gmpNumber = $gmpNumber;
    }

    /**
     * @return string
     */
    public function getAsHexString(): string
    {
        $ipBinaryString = gmp_strval($this->gmpNumber, 2);
        $ipBinaryString = str_pad($ipBinaryString, 128, '0', STR_PAD_LEFT);

        $ipBinaryBlocks = str_split($ipBinaryString, 16);

        // initialize as ::
        $hexStringBlocks = array_fill(0, 7, 0);

        foreach ($ipBinaryBlocks as $blockIndex => $ipBinaryBlock) {
            $hexStringBlocks[$blockIndex] = bindec($ipBinaryBlock);
        }

        return vsprintf('%X:%X:%X:%X:%X:%X:%X:%X', $hexStringBlocks);
    }
}