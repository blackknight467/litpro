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

        Album::create([
            'name' => 'S&M',
            'band_id' => $metalica->id,
            'recorded_date' => new DateTime('1999-4-21'),
            'release_date' => new DateTime('1999-11-23'),
            'number_of_tracks' => 21,
            'label' => 'Elektra',
            'producer' => 'Bob Rock',
            'genre' => 'Heavy metal'
        ]);

        Album::create([
            'name' => "Kill 'Em All",
            'band_id' => $metalica->id,
            'recorded_date' => new DateTime('1983-5-10'),
            'release_date' => new DateTime('1983-7-25'),
            'number_of_tracks' => 10,
            'label' => 'Megaforce',
            'producer' => 'Paul Curcio',
            'genre' => 'Thrash metal'
        ]);

        Album::create([
            'name' => "Ride the Lightning",
            'band_id' => $metalica->id,
            'recorded_date' => new DateTime('1984-2-20'),
            'release_date' => new DateTime('1984-7-27'),
            'number_of_tracks' => 8,
            'label' => 'Megaforce',
            'producer' => 'Flemming Rasmussen',
            'genre' => 'Thrash metal'
        ]);

        Album::create([
            'name' => "Master of Puppets",
            'band_id' => $metalica->id,
            'recorded_date' => new DateTime('1985-9-1'),
            'release_date' => new DateTime('1986-3-3'),
            'number_of_tracks' => 8,
            'label' => 'Elektra',
            'producer' => 'Flemming Rasmussen',
            'genre' => 'Thrash metal'
        ]);

        Album::create([
            'name' => "...And Justice for All",
            'band_id' => $metalica->id,
            'recorded_date' => new DateTime('1988-1-28'),
            'release_date' => new DateTime('1988-8-25'),
            'number_of_tracks' => 8,
            'label' => 'Elektra',
            'producer' => 'Flemming Rasmussen',
            'genre' => 'Thrash metal'
        ]);

        Album::create([
            'name' => "Fallen",
            'band_id' => $evanescence->id,
            'recorded_date' => new DateTime('2002-8-1'),
            'release_date' => new DateTime('2003-3-4'),
            'number_of_tracks' => 12,
            'label' => 'Wind-up',
            'producer' => 'Dave Fortman',
            'genre' => 'Nu metal'
        ]);

        Album::create([
            'name' => "The Open Door",
            'band_id' => $evanescence->id,
            'recorded_date' => new DateTime('2005-9-1'),
            'release_date' => new DateTime('2006-9-25'),
            'number_of_tracks' => 13,
            'label' => 'Wind-up',
            'producer' => 'Dave Fortman',
            'genre' => 'Alternative metal'
        ]);

        Album::create([
            'name' => "The Open Door",
            'band_id' => $evanescence->id,
            'recorded_date' => new DateTime('2005-9-1'),
            'release_date' => new DateTime('2006-9-25'),
            'number_of_tracks' => 13,
            'label' => 'Wind-up',
            'producer' => 'Dave Fortman',
            'genre' => 'Alternative metal'
        ]);

        Album::create([
            'name' => "Introducing... The Beatles",
            'band_id' => $beatles->id,
            'recorded_date' => new DateTime('1962-9-11'),
            'release_date' => new DateTime('1964-1-10'),
            'number_of_tracks' => 12,
            'label' => 'Vee-Jay',
            'producer' => 'George Martin',
            'genre' => 'Rock and roll'
        ]);

        Album::create([
            'name' => "Introducing... The Beatles",
            'band_id' => $panic->id,
            'recorded_date' => new DateTime('2005-6-1'),
            'release_date' => new DateTime('2005-9-27'),
            'number_of_tracks' => 13,
            'label' => 'Fueled by Ramen',
            'producer' => 'Matt Squire',
            'genre' => 'Pop punk'
        ]);

        $this->command->info('Albums have been seeded');

    }
}