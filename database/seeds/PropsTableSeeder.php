<?php

use Illuminate\Database\Seeder;
use App\Prop;

class PropsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
        	[
        		'name' => 'The Victoria',
        		'price' => 374662, 
        		'bedrooms' =>  4,
        		'bathrooms' => 2,
        		'storeys' => 2,
        		'garages' => 2
        	],
        	[
        		'name' => 'The Xavier',
        		'price' => 513268, 
        		'bedrooms' =>  4,
        		'bathrooms' => 2,
        		'storeys' => 1,
        		'garages' => 2
        	],
        	[
        		'name' => 'The Como',
        		'price' => 454990, 
        		'bedrooms' =>  4,
        		'bathrooms' => 3,
        		'storeys' => 2,
        		'garages' => 3
        	],
        	[
        		'name' => 'The Aspen',
        		'price' => 384356, 
        		'bedrooms' =>  4,
        		'bathrooms' => 2,
        		'storeys' => 2,
        		'garages' => 2
        	],
        	[
        		'name' => 'The Lucretia',
        		'price' => 572002, 
        		'bedrooms' =>  4,
        		'bathrooms' => 3,
        		'storeys' => 2,
        		'garages' => 2
        	],
        	[
        		'name' => 'The Toorak',
        		'price' => 521951, 
        		'bedrooms' =>  5,
        		'bathrooms' => 2,
        		'storeys' => 1,
        		'garages' => 2
        	],
        	[
        		'name' => 'The Skyscape',
        		'price' => 263604, 
        		'bedrooms' =>  3,
        		'bathrooms' => 2,
        		'storeys' => 2,
        		'garages' => 2
        	],
        	[
        		'name' => 'The Clifton',
        		'price' => 386103, 
        		'bedrooms' =>  3,
        		'bathrooms' => 2,
        		'storeys' => 1,
        		'garages' => 1
        	],
        	[
        		'name' => 'The Geneva',
        		'price' => 390600, 
        		'bedrooms' =>  4,
        		'bathrooms' => 3,
        		'storeys' => 2,
        		'garages' => 2
        	],
        ];

        foreach ($properties as $row) {
        	$prop = new Prop;
        	$prop->name = $row['name'];
        	$prop->price = $row['price'];
        	$prop->bedrooms = $row['bedrooms'];
        	$prop->bathrooms = $row['bathrooms'];
        	$prop->storeys = $row['storeys'];
        	$prop->garages = $row['garages'];
        	$prop->save();
        }
    }
}
