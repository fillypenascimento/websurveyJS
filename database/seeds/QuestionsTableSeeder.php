<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'path' => '1.png',
                'is_atom' => 1,
                'answer' => 'true',
            ],
            [
                'path' => '2.png',
                'is_atom' => 1,
                'answer' => 'true',
            ],
            [
                'path' => '3.png',
                'is_atom' => 1,
                'answer' => '3 5',
            ],
            [
                'path' => '4.png',
                'is_atom' => 1,
                'answer' => '1 1 true',
            ],
            [
                'path' => '5.png',
                'is_atom' => 1,
                'answer' => '5',
            ],
            [
                'path' => '6.png',
                'is_atom' => 1,
                'answer' => '2 2',
            ],
            [
                'path' => '7.png',
                'is_atom' => 1,
                'answer' => '4',
            ],
            [
                'path' => '8.png',
                'is_atom' => 1,
                'answer' => 'true',
            ],
            [
                'path' => '9.png',
                'is_atom' => 1,
                'answer' => '8 8',
            ],
            [
                'path' => '10.png',
                'is_atom' => 1,
                'answer' => 'true',
            ],
            [
                'path' => '11.png',
                'is_atom' => 1,
                'answer' => '3',
            ],
            [
                'path' => '12.png',
                'is_atom' => 1,
                'answer' => '2 0',
            ],
            [
                'path' => '13.png',
                'is_atom' => 1,
                'answer' => '2',
            ],
            [
                'path' => '14.png',
                'is_atom' => 1,
                'answer' => '11',
            ],
            [
                'path' => '15.png',
                'is_atom' => 1,
                'answer' => '3',
            ],
            [
                'path' => '16.png',
                'is_atom' => 1,
                'answer' => 'a,b1',
            ],
            [
                'path' => '17.png',
                'is_atom' => 1,
                'answer' => '7',
            ],
            [
                'path' => '18.png',
                'is_atom' => 1,
                'answer' => 'erro',
            ],
            [
                'path' => '19.png',
                'is_atom' => 1,
                'answer' => '1',
            ],
            [
                'path' => '20.png',
                'is_atom' => 1,
                'answer' => '3',
            ],
            [
                'path' => '21.png',
                'is_atom' => 1,
                'answer' => '9',
            ],
            [
                'path' => '22.png',
                'is_atom' => 1,
                'answer' => '1 100',
            ],
            [
                'path' => '23.png',
                'is_atom' => 1,
                'answer' => '15 25',
            ],
            [
                'path' => '24.png',
                'is_atom' => 1,
                'answer' => '5 8 20',
            ],
            [
                'path' => '25.png',
                'is_atom' => 0,
                'answer' => 'true',
            ],
            [
                'path' => '26.png',
                'is_atom' => 0,
                'answer' => 'true',
            ],
            [
                'path' => '27.png',
                'is_atom' => 0,
                'answer' => '3 5',
            ],
            [
                'path' => '28.png',
                'is_atom' => 0,
                'answer' => '1 1 true',
            ],
            [
                'path' => '29.png',
                'is_atom' => 0,
                'answer' => '9',
            ],
            [
                'path' => '30.png',
                'is_atom' => 0,
                'answer' => '5 5',
            ],
            [
                'path' => '31.png',
                'is_atom' => 0,
                'answer' => '4',
            ],
            [
                'path' => '32.png',
                'is_atom' => 0,
                'answer' => 'true',
            ],
            [
                'path' => '33.png',
                'is_atom' => 0,
                'answer' => '8 8',
            ],
            [
                'path' => '34.png',
                'is_atom' => 0,
                'answer' => 'true',
            ],
            [
                'path' => '35.png',
                'is_atom' => 0,
                'answer' => '3',
            ],
            [
                'path' => '36.png',
                'is_atom' => 0,
                'answer' => '4 0',
            ],
            [
                'path' => '37.png',
                'is_atom' => 0,
                'answer' => '2',
            ],
            [
                'path' => '38.png',
                'is_atom' => 0,
                'answer' => '23',
            ],
            [
                'path' => '39.png',
                'is_atom' => 0,
                'answer' => '3',
            ],
            [
                'path' => '40.png',
                'is_atom' => 0,
                'answer' => '1,20',
            ],
            [
                'path' => '41.png',
                'is_atom' => 0,
                'answer' => '9',
            ],
            [
                'path' => '42.png',
                'is_atom' => 0,
                'answer' => 'P1 [3, 1, 7]',
            ],
            [
                'path' => '43.png',
                'is_atom' => 0,
                'answer' => '10',
            ],
            [
                'path' => '44.png',
                'is_atom' => 0,
                'answer' => '1',
            ],
            [
                'path' => '45.png',
                'is_atom' => 0,
                'answer' => '1',
            ],
            [
                'path' => '46.png',
                'is_atom' => 0,
                'answer' => '5 7',
            ],
            [
                'path' => '47.png',
                'is_atom' => 0,
                'answer' => '1 3',
            ],
            [
                'path' => '48.png',
                'is_atom' => 0,
                'answer' => '3 10 1',
            ]
        ];
        
        DB::table('questions')->insert($questions);
    }
}
