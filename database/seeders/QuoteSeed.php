<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteSeed extends Seeder
{
    public function run()
    {
        Quote::factory(500)->create();
    }
}
