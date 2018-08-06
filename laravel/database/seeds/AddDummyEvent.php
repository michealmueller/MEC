<?php

use App\Event;
use Illuminate\Database\Seeder;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [

            ['title'=>'Rom Event', 'start_date'=>'2018-08-10', 'end_date'=>'2018-08-15', 'start_time'=>'', 'comments'=>''],

            ['title'=>'Coyala Event', 'start_date'=>'2018-08-11', 'end_date'=>'2018-08-16', 'start_time'=>'', 'comments'=>''],

            ['title'=>'Lara Event', 'start_date'=>'2018-08-16', 'end_date'=>'2018-08-22', 'start_time'=>'', 'comments'=>''],

        ];

        foreach ($data as $key => $value) {

            Event::create($value);

        }
    }
}
