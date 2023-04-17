<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\CalculateCommand;
class RectangleSquareTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_rectangle_square(): void
    {
        $result = CalculateCommand::RectangleSquare(10,5);
        $this->assertEquals($result,25,"ERROR");
    }
}
