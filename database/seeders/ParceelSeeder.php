<?php

namespace Database\Seeders;

use Database\Factories\ParceelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParceelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParceelFactory::new()->createOne();
    }
}
