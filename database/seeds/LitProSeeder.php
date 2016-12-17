<?php

use Illuminate\Database\Seeder;
use App\Band;
use App\Album;

class LitProSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->delete();
        DB::table('albums')->delete();

        $this->command->info('Tables have been cleared');

        $beatles = Band::create([
            'name' => 'The Beatles',
            'start_date' => new DateTime('1960-01-01'),
            'still_active' => false,
            'website' => 'http://thebeatleseightdaysaweek.com/'
        ]);

        $panic = Band::create([
            'name' => 'Panic! at the Disco',
            'start_date' => new DateTime('2004-01-01'),
            'still_active' => true,
            'website' => 'http://www.panicatthedisco.com/'
        ]);

        $evanescence = Band::create([
            'name' => 'Evanescence',
            'start_date' => new DateTime('1995-01-01'),
            'still_active' => true,
            'website' => 'http://www.evanescence.com/'
        ]);

        $metalica = Band::create([
            'name' => 'Metallica',
            'start_date' => new DateTime('1981-10-28'),
            'still_active' => true,
            'website' => 'https://metallica.com/'
        ]);

        $this->command->info('Bands have been seeded');

        $sandm = Album::create([
            'name' => 'S&M',
            'band_id' => $metalica->id,
            'recorded_date' => new DateTime('1999-4-21'),
            'release_date' => new DateTime('1999-11-23'),
            'number_of_tracks' => 21,
            'label' => 'Elektra',
            'producer' => 'Bob Rock',
            'genre' => 'Heavy metal'
        ]);

        $this->command->info('Albums have been seeded');

    }
}