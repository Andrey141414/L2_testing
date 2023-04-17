<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\CalculateCommand;
class DivTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_div(): void
    {
        $result = CalculateCommand::div(8,4);
        $this->assertEquals($result,2,"ERROR");
        
        $result = CalculateCommand::div(8,0);
        $this->assertNull($result,"NOT NULL");
        
    }
}
