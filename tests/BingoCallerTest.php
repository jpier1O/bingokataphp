<?php

namespace Tests;

use Bingo\BingoCaller;
use Bingo\Value\NumberPositive;
use PHPUnit\Framework\TestCase;

class BingoCallerTest extends TestCase
{
    public function testShout(): void
    {
        $min = NumberPositive::create(1);
        $max = NumberPositive::create(75);
        $bingoCaller = new BingoCaller($min, $max);
        $number = $bingoCaller->shoutNumber();

        $this->assertAttributeEquals(1, 'totalShouted', $bingoCaller);
        $this->assertAttributeContains($number, 'numbersToShout', $bingoCaller);
        $this->assertAttributeContains($number, 'shoutedNumbers', $bingoCaller);
    }

    public function testBingoCallerThrowsExceptionWithWrongRange(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $bingoCaller = new BingoCaller(NumberPositive::create(3), NumberPositive::create(1));
    }

}
