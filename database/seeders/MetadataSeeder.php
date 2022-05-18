<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Metadata;
use Illuminate\Support\Facades\DB;

class MetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metadata')->truncate();
        Metadata::factory()
            ->count(10)
            ->create();
    }
}
