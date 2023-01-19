<?php

namespace Database\Seeders;

use App\Models\HobbyType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class HobbyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get the path of the CSV file
        $path = public_path('storage/i_sport_en.csv');

        // check if the file exists
        if (!File::exists($path)) {
            return;
        }

        // insert data from the CSV file
        $data = File::get($path);
        $rows = explode("\n", $data);
        $checkedTypes = [];

        foreach ($rows as $row) {
            $type = str_getcsv($row);

            if (in_array($type[1], $checkedTypes)) {
                continue;
            }

            /** @var HobbyType $createdType*/
            $createdType = HobbyType::firstOrCreate(['name' => $type[1]], []);

            if ($createdType->wasRecentlyCreated) {
                echo "$type[1] was created\n";
            } else {
                echo "$type[1] exists\n";
            }

            $checkedTypes[] = $type[1];
        }
    }
}
