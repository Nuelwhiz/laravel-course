<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\listingFactory;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()-> count(5)->create(); 

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

 */
Listing::factory(6)->create();
       /*  Listing::create([
'title'=>'laravel senior dev',
'tags'=>'laravel javascript',
'company'=>'acme corps',
'location'=>'ghdgdhdg ps',
'email'=>'nuel@gmail.com',
'website'=>'http://www.acme.com',
'discription'=>'Plan, write, and share with the
 industry-standard software used by over 2 million
  screenwriters, TV shows, and blockbusters.',
        ]);

        Listing::create([
'title'=>'senior dev',
'tags'=>'laravel javascript',
'company'=>'senior corps',
'location'=>'boston, ma',
'email'=>'mile@gmail.com',
'website'=>'http://www.acme.com',
'discription'=>'Plan, write, and share with the
 industry-standard software used by over 2 million
  screenwriters, TV shows, and blockbusters.',
        ]); */
    }
}
