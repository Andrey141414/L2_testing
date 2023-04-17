<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\CalculateCommand;

class CirclesquareTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_circle_square(): void
    {
        $result = (new CalculateCommand())->Circlesquare(1);
        $this->assertEquals($result,3.1415,"ERROR");
    }
}
