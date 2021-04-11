<?php

namespace Tests;

use Bingo\Card;
use Bingo\Generator\CardGeneratorInterface;
use Bingo\Generator\PlayerGenerator;
use Bingo\Value\NumberPositive;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PlayerGeneratorTest extends TestCase
{
    public function testGenerateThrowsErrorWhenMorePlayersThanExpected(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $cardProphecy = $this->prophesize(Card::class);
        $card = $cardProphecy->reveal();

        $cardGeneratorProphecy = $this->prophesize(CardGeneratorInterface::class);
        $cardGeneratorProphecy->generate()->willReturn($card);

        $maxPlayers = NumberPositive::create(PlayerGenerator::MAX_NUM_PLAYERS+1);
        $playerGenerator = new PlayerGenerator($cardGeneratorProphecy->reveal(), $maxPlayers);

        $playerGenerator->generate();
    }

}
