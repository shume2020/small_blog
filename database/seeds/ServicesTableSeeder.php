<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker= Faker\Factory::create();
        $limit=10;
        for($i=0;$i<$limit;$i++){
            DB::table('services')->insert([
                'title'=>$faker->sentence,
                'description'=>$faker->word,
                 'location'=>$faker->address,
                  'contact'=>$faker->companyEmail,
                  'created_at'=>$faker->dateTimeAD,
                   'updated_at'=>$faker->dateTimeThisCentury,


            ]);

        }
    }
}
