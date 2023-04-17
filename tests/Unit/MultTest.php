<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\CalculateCommand;
class MultTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_mult(): void
    {
        $result = CalculateCommand::Mult(6,4);
        $this->assertEquals($result,24,"ERROER");
    }
}
