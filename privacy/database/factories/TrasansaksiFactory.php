<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\transaksi::class, function (Faker $faker) {
    return [
        'no_transaksi'=> $faker->randomDigit,
    	'no_polisi'=> $faker->bothify('BG #### ??'),
        'no_po'=> $faker->bothify('PO####??'),
        'no_container'=> $faker->bothify('AR####??'),
        'no_seal'=> $faker->bothify('CR####??'),
        'id_size'=> $faker->name,
        'muatan'=> $faker->words,
    	'kode_barang'=> function () {
            return factory(App\Barang::class)->create()->kode_barang;
        },
        'kode_supplier'=> $faker->numberBetween($min = 1, $max = 9),
        'kode_company'=> $faker->numberBetween($min = 1, $max = 6), 
        'kode_customer'=> $faker->numberBetween($min = 1, $max = 9), 
    	'nama_supir'=> $faker->streetName,
    	'keterangan'=> $faker->text,
    	'tanggal_masuk'=> $faker->dateTimeBetween($startDate = '2018-11-1', $endDate = '2018-11-30'),
    	'berat1'=> $faker->numberBetween(1000,50000),
    	'berat2'=> $faker->numberBetween(1000,30000),
    ];
});
