<?php

declare(strict_types=1);

namespace App\Tests;

use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @return void
     */
    public function testAdd(): void
    {
        $calc = new Calculator();
        $data = $this->argumentsSource();
        foreach ($data as $assert) {
            [$a, $b, $expected] = $assert;
            $this->assertEquals($expected, $calc->add($a, $b));
        }
    }

    public function argumentsSource(): array
    {
        return [
            [1, 2, 3],
            [5, 5, 10],
            [7, 3, 10],
            [-10, 10, 0]
        ];
    }
}
