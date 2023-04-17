<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase; 
use App\Console\Commands\CalculateCommand;

class PlusTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_plus(): void
    {
        $result = CalculateCommand::Plus(6,4);
        echo($result);
        $this->assertEquals($result,10,"ERROR");
    }
}
