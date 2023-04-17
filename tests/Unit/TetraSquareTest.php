<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\CalculateCommand;

class TetraSquareTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_tetra_square(): void
    {
        $result = CalculateCommand::TetraSquare(5,1);
        $this->assertEquals($result,5,"ERROR");
    }
}
