<?php

use Illuminate\Database\Seeder;

class KibaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');

        $limit = 0;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('kibas')->insert([
                'user_id' => 1,
                'kode_barang' => $faker->uuid,
                'nama_barang' => $faker->jobTitle,
                'register' => $faker->uuid,
                'luas_m2' => $faker->latitude($min = -90, $max = 90),
                'tanah_pengadaan' => $faker->stateAbbr,
                'letak_alamat' => $faker->address,
                'status_tanah' => $faker->postcode,
                'penggunaan' => $faker->state,
                'asal_usul' => $faker->word,
                'harga' => $faker->numberBetween($min = 1000, $max = 9000),
                'tanggal' => $faker->date,
                'keterangan' => $faker->userAgent,
                'status' => 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
