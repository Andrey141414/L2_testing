<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\CalculateCommand;
class PowerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_power(): void
    {
        $result = CalculateCommand::Power(10,2);
        echo($result);
        $this->assertEquals($result,100,"ERROR");
    }
}
