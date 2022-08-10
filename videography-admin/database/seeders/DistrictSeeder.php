<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['district' => 'Colombo'],
            ['district' => 'Gampaha'],
            ['district' => 'Kalutara'],
            ['district' => 'Ratnapura'],
            ['district' => 'Galle'],
            ['district' => 'Kegalla'],
            ['district' => 'Kurunegala'],
            ['district' => 'Puttalam'],
            ['district' => 'Matara'],
            ['district' => 'Kandy'],
            ['district' => 'Anuradhapura'],
            ['district' => 'Ampara'],
            ['district' => 'Badulla'],
            ['district' => 'Batticalao'],
            ['district' => 'Embilipitiya'],
            ['district' => 'Hambanthota'],
            ['district' => 'Matale'],
            ['district' => 'Mullaittivu'],
            ['district' => 'Nuwara Eliya'],
            ['district' => 'Moneragala'],
            ['district' => 'Mannar'],
            ['district' => 'Jaffna'],
            ['district' => 'Polonnaruwa'],
            ['district' => 'Trincomalee'],
            ['district' => 'Vavuniya'],
        ];

        foreach ($array as $data) {
            $row = District::where('district',$data['district'])->first();
            if (!$row) {
                District::create($data);
            }
        }
    }
}
