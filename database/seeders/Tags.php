<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class Tags extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['title' => 'damaged', 'url' => 'tag_damaged',]);
        Tag::create(['title' => 'sport', 'url' => 'tag_sport',]);
    }
}
