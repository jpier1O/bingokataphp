<?php

namespace Bingo\Value;

class MatrixDimensions
{
    /** @var int */
    private $columns;
    /** @var int */
    private $rows;

    /**
     * @param NumberPositive $rows
     * @param NumberPositive $columns
     */
    public function __construct(NumberPositive $rows, NumberPositive $columns)
    {
        $this->rows = $rows->value();
        $this->columns = $columns->value();
    }

    /**
     * @return int
     */
    public function getRows(): int
    {
        return $this->rows;
    }

    /**
     * @return int
     */
    public function getColumns(): int
    {
        return $this->columns;
    }
}
