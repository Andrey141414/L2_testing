<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Constants;

class CalculateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:calculate-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    protected $PI;

    public function handle(): void
    {
        //
        //echo($this->Circlesquare(1)); 
    }

    public static function Plus($a, $b)
    {
        return $a + $b;
    }
    public static function Minus($a, $b)
    {
        return $a - $b;
    }
    public static function Mult($a, $b)
    {
        return $a * $b;
    }
    public static function Div($a, $b)
    {
        if ($b == 0) {
            return null;
        }
        return $a / $b;
    }

    public static function Power($base, $exponent)
    {
        $result = 1;
        for ($i = 0; $i < $exponent; $i++) {
            $result *= $base;
        }
        return $result;
    }

    public function Circlesquare($r)
    {
        $PI = 3.1415;
        return $PI * $r * $r;
    }

    public static function TetraSquare($a, $b)
    {
        return $a * $b;
    }

    public static function RectangleSquare($a, $h)
    {
        return $a * $h / 2;
    }
    public static function Factorial($number){
        if($number < 1)
        {
            return null;
        }
        $factorial = 1;
        for ($i = 1; $i <= $number; $i++){
        $factorial = $factorial * $i;
        }
        return $factorial;
    }

    public static function log10($a)
    {
        return log10($a);
    }

    
}
