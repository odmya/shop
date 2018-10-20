<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserAddress::class, function (Faker $faker) {

  $addresses = [
       ["Israel", " 58670", "holon"],
       ["United States", "49525", "Grand Rapids"],
       ["United States", "95355-3641", "Modesto"],
       ["France", " 92140", "Clamart"],
       ["Germany", "21643", "Beckdorf"],
   ];
   $address   = $faker->randomElement($addresses);


   return [
   'country'      => $address[0],
   'city'          => $address[2],
   'address'       => sprintf('%d Villa cour creuse',  $faker->randomNumber(3)),
   'zip'           => $address[1],
   'contact_name'  => $faker->name,
   'contact_phone' => $faker->phoneNumber,
];
});
