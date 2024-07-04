<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class ArraySplitController
{
    public function index(int $num): array {
        $list = [1,2,3,4,5,6,7,8,9,10];
        return array_chunk($list, ($num ?: 1));
    }
}
