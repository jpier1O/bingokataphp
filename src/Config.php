<?php

namespace Bingo;

use Bingo\Value\MatrixDimensions;
use Bingo\Value\NumberPositive;

final class Config
{
    /** @var string */
    private $version;
    /** @var NumberPositive */
    private $minRange;
    /** @var NumberPositive */
    private $maxRange;
    /** @var MatrixDimensions */
    private $dimensions;
    /** @var NumberPositive */
    private $cantPlayers;

    /**
     * @param string           $version
     * @param NumberPositive      $minRange
     * @param NumberPositive      $maxRange
     * @param MatrixDimensions $dimensions
     * @param NumberPositive      $cantPlayers
     */
    private function __construct(
        string $version,
        NumberPositive $minRange,
        NumberPositive $maxRange,
        MatrixDimensions $dimensions,
        NumberPositive $cantPlayers
    )
    {
        $this->version = $version;
        $this->minRange = $minRange;
        $this->maxRange = $maxRange;
        $this->dimensions = $dimensions;
        $this->cantPlayers = $cantPlayers;
    }

    /**
     * @param array $argv
     *
     * @return Config
     *
     * @throws \Exception
     */
    public static function fromArgs(array $argv): self
    {
        if (count($argv) < 7) {
            throw new \InvalidArgumentException(sprintf('Wrong usage please check --help'));
        }
        if ($argv[1] !== 'us') {
            // ready for implementing UKCardGenerator
            throw new \InvalidArgumentException('Mode not implemented yet.');
        }
        $minRange = NumberPositive::create($argv[2]);
        $maxRange = NumberPositive::create($argv[3]);
        $rows = NumberPositive::create($argv[4]);
        $columns = NumberPositive::create($argv[5]);
        $cantPlayers = NumberPositive::create($argv[6]);

        return new self(
            $argv[1],
            $minRange,
            $maxRange,
            new MatrixDimensions($rows, $columns),
            $cantPlayers
        );
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return NumberPositive
     */
    public function getMinRange(): NumberPositive
    {
        return $this->minRange;
    }

    /**
     * @return NumberPositive
     */
    public function getMaxRange(): NumberPositive
    {
        return $this->maxRange;
    }

    /**
     * @return MatrixDimensions
     */
    public function getDimensions(): MatrixDimensions
    {
        return $this->dimensions;
    }

    /**
     * @return NumberPositive
     */
    public function getcantPlayers(): NumberPositive
    {
        return $this->cantPlayers;
    }
}
