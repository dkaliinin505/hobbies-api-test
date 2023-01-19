<?php

namespace Database\Seeders;

use App\Models\Hobby;
use App\Models\HobbyType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class HobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('storage/i_sport_en.csv');

        // check if the file exists
        if (!File::exists($path)) {
            return;
        }

        // insert data from the CSV file
        $data = File::get($path);
        $rows = explode("\n", $data);

        foreach ($rows as $row) {
            $type = str_getcsv($row);

            /** @var HobbyType $hobbyType*/
            $hobbyType = HobbyType::firstOrCreate(['name' => $type[1]], []);

            $newHobby = $hobbyType->hobbies()->firstOrCreate(['name' => $type[0]]);

            if ($newHobby->wasRecentlyCreated) {
                echo "Hobby $type[0] was created\n";
            } else {
                echo "Hobby $type[0] exists\n";
            }

        }
    }
}
