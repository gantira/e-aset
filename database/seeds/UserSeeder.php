<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');

        DB::table('users')->truncate();
        DB::table('users')->insert(array(
                    [
                        'email' =>'admin',
                        'password' => bcrypt('admin'),
                        'active' => 1,
                        'created_at' => $faker->datetime
                    ],
                    [
                        'email' =>'kabid',
                        'password' => bcrypt('kabid'),
                        'active' => 1,
                        'created_at' => $faker->datetime
                    ])
        );

        DB::table('profiles')->truncate();
        DB::table('profiles')->insert(array(
            [
                'nama_sekolah'=>'ADMIN'
            ],
            [
                'nama_sekolah'=>'KEPALA BIDANG'
            ])
        );

        

        $limit = 0;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'email' => $faker->email,
                'password' => bcrypt('123123'),
                'created_at' => $faker->datetime
            ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('profiles')->insert([
                'nama_sekolah' => $faker->company,
                'status' => $faker->phoneNumber,
                'nss' => $faker->isbn13,
                'jenis' => $faker->imageUrl($width = 640, $height = 480),
                'tahun_pendirian' => $faker->year,
                'kurikulum' => $faker->year,
                'kepsek' => $faker->name,
                'komsek' => $faker->name,
                'luas_m2' => $faker->year,
                'alamat' => $faker->address,
                'created_at' => $faker->datetime
            ]);
        }

    }
}