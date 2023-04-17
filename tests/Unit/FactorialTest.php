<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\CalculateCommand;

class FactorialTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_factorial(): void
    {
        $result = CalculateCommand::Factorial(5);
        $this->assertEquals($result,120,"ERROR");

        $result = CalculateCommand::Factorial(-1);
        $this->assertNull($result,"ERROR");
    }
}
