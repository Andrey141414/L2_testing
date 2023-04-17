<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\CalculateCommand;
class Log10Test extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_log_10(): void
    {
        $result = CalculateCommand::log10(1000);
        $this->assertEquals($result,3,"ERROER");
    }
}
