<?php

use Discussion\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([

            'name' => 'Laravel 5.8',

            'slug' => str_slug('Laravel 5.8'),

        ]);

        Channel::create([

            'name' => 'Vue Js',

            'slug' => str_slug('Vue Js'),

        ]);

        Channel::create([

            'name' => 'Angular 7',

            'slug' => str_slug('Angular 7'),

        ]);

        Channel::create([

            'name' => 'Node Js',

            'slug' => str_slug('Node Js'),

        ]);
    }
}
