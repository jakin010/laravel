<?php

namespace Database\Seeders;

use Database\Factories\BewonerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BewonerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BewonerFactory::new()->count(15)->create();
    }
}
