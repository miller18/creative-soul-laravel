<?php

class SchedulesTableSeeder extends Seeder {

    public function run()
    {

        DB::table('schedules')->truncate();

        $now = date('Y-m-d H:i:s');

        DB::table('schedules')->insert(array(
            array(
                'id'             => 1,
                'class_date'     => $now,
                'class_time'     => $now,
                'class_type'     => 'private',
                'student_id'     => 1,
                'instructor_id'  => 1,
                'class_duration' => 2.5,
                'class_notes'    => 'These are some notes',
                'created_at'     => $now,
                'updated_at'     => $now,
            ),
            array(
                'id'             => 2,
                'class_date'     => $now,
                'class_time'     => $now,
                'class_type'     => 'band',
                'student_id'     => 2,
                'instructor_id'  => 2,
                'class_duration' => 2.5,
                'class_notes'    => 'These are some notes',
                'created_at'     => $now,
                'updated_at'     => $now,
            ),
            array(
                'id'             => 3,
                'class_date'     => $now,
                'class_time'     => $now,
                'class_type'     => 'demo',
                'student_id'     => 5,
                'instructor_id'  => 2,
                'class_duration' => 1,
                'class_notes'    => 'These are some notes',
                'created_at'     => $now,
                'updated_at'     => $now,
            ),
            array(
                'id'             => 4,
                'class_date'     => $now,
                'class_time'     => $now,
                'class_type'     => 'semi-private',
                'student_id'     => 1,
                'instructor_id'  => 3,
                'class_duration' => 2,
                'class_notes'    => 'These are some notes',
                'created_at'     => $now,
                'updated_at'     => $now,
            ),
            array(
                'id'             => 5,
                'class_date'     => $now,
                'class_time'     => $now,
                'class_type'     => 'private',
                'student_id'     => 4,
                'instructor_id'  => 5,
                'class_duration' => 1,
                'class_notes'    => 'These are some notes',
                'created_at'     => $now,
                'updated_at'     => $now,
            )

        ));
    }
}