<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\CalculateCommand;
class MinusTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_minus(): void
    {
        $result = CalculateCommand::Minus(6,4);
        $this->assertEquals($result,2,"ERROR");
    }
}
