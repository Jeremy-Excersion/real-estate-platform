<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\ListingPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // set constraints to 0
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Listing::truncate();
        ListingPhoto::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Listing::factory()->hasPhotos(50)->count(500)->create();
    }
}
