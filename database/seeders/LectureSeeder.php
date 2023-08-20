<?php

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\TypeLecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $now = Carbon::now();
        // $randomMinutes = mt_rand(0, 1440);
        // $randomTime = $now->addMinutes($randomMinutes);

        $now = Carbon::now();
        $randomDate = $now->copy()->addDays(rand(1, 30));

        for ($i=1; $i <= 20 ; $i++)
        {
            $typeLectures = TypeLecture::pluck('type')->toArray();
            $randomIndex = array_rand($typeLectures);
            $randomTypeLectures = $typeLectures[$randomIndex];
            Lecture::factory()->create([

                // 'name' => "book #"."$i",
                // 'author' => 'author'."$i",
                // 'amount' =>  rand(1, $i*5)  ,
                // 'row'    => $i,
                // // 'type'   => "Department#".$faker->numberBetween(1, $i) ,
                // 'type' => "Department#".rand(1, $i),

                'name' => "lecture #"."$i",
                'type' =>  $randomTypeLectures,
                'start_date' =>   $randomDate,
                'start_time' => '08:00' ,
                'end_time' =>  '08:00',
                'target_people' => "people with age ".$i ,
                'teacher_experience' => 'No Experience' ,
                'teacher_name' => 'teacher #'.$i ,

            ]);

    }
    }
}
