<?php

use Illuminate\Database\Seeder;

class AttachmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $attachments = [


        ];
        foreach ($attachments as $attachment) {
            \App\Entities\OccurrenceObject::create($attachment);
        }
    }
}
