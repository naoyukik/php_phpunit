<?php

namespace Tddbc;

class ClosedRange
{
    /** @var int $lowerEndpoint */
    protected $lowerEndpoint;

    /** @var int $upperEndpoint */
    protected $upperEndpoint;

    public function __construct(int $lower, int $upper)
    {
        $this->lowerEndpoint = $lower;
        $this->upperEndpoint = $upper;
    }

    public function getLowerEndpoint(): int
    {
        return $this->lowerEndpoint;
    }

    public function getUpperEndpoint(): int
    {
        return $this->upperEndpoint;
    }

    /**
     * 閉区間を生成する
     *
     * 返値は文字列
     *
     * @return string
     */
    public function toString(): string
    {
        return sprintf('[%s,%s]', $this->lowerEndpoint, $this->upperEndpoint);
    }

    public function containsSpecifiedInt(int $int): bool
    {
        if ($this->lowerEndpoint <= $int && $this->upperEndpoint >= $int) {
            return true;
        }
        return false;
    }
}