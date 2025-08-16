<?php

declare(strict_types=1);

namespace App\Service;

class Calculator
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
}
