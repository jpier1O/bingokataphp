<?php

namespace Bingo\Generator;

use Bingo\Player;
use Bingo\Value\NumberPositive;

class PlayerGenerator implements PlayerGeneratorInterface
{
    public const MAX_NUM_PLAYERS = 10;

    /** @var CardGeneratorInterface */
    private $cardGenerator;
    /** @var int */
    private $cantPlayers;

    /**
     * @param CardGeneratorInterface $cardGenerator
     * @param NumberPositive            $cantPlayers
     */
    public function __construct(CardGeneratorInterface $cardGenerator, NumberPositive $cantPlayers)
    {
        $this->cardGenerator = $cardGenerator;
        $this->cantPlayers = $cantPlayers->value();
    }

    /**
     * @return Player[]
     *
     * @throws \InvalidArgumentException
     */
    public function generate(): array
    {
        if ($this->cantPlayers > self::MAX_NUM_PLAYERS) {
            throw new \InvalidArgumentException(
                sprintf('Wrong number of players, please enter again', self::MAX_NUM_PLAYERS)
            );
        }

        $players = [];
        for ($i = 0; $i < $this->cantPlayers; $i++) {
            $players[] = new Player($this->cardGenerator->generate());
        };

        return $players;
    }
}
