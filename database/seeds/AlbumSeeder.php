<?php

use Illuminate\Database\Seeder;
use App\Album;
class AlbumSeeder extends Seeder
{
    public function run()
    {
        factory(Album::class, 10)->create();
    }
}
