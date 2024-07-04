<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FizzBuzzController extends Controller
{
    public function index(int $num) {
        for ($i = 1; $i <= $num; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                echo "FizzBuzz \n";
                continue;
            }
            if ($i % 3 == 0) {
                echo "Fizz \n";
                continue;
            }
            if ($i % 5 == 0) {
                echo "Buzz \n";
                continue;
            }
            echo "$i \n";
        }
    }
}
