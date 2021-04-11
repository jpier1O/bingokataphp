<?php

namespace Bingo\Value;

class RandomIntRange
{
    /**
     * @param int $min
     * @param int $max
     *
     * @return int[]
     *
     * @throws \Exception
     */
    public static function create(int $min, int $max): array
    {
        self::validate($min, $max);
        $range = range($min, $max);
        shuffle($range);

        return array_slice($range, 0, $length);
    }

    /**
     * @param int $min
     * @param int $max
     * @param int $length
     *
     * @return bool
     *
     * @throws \Exception
     */
    public static function validate(int $min, int $max): bool
    {
        if ($min >= $max || $length <= 0) {
            throw new \InvalidArgumentException();
        }

        return true;
    }
}
