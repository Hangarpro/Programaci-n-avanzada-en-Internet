<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $client = new Client();

      $client->name = 'Jesus';
      $client->phone_number = '6122044457';
      $client->email = 'jcarlos_19@alu.uabcs.mx';
      $client->save();

      $client = new Client();

      $client->name = 'Carlos';
      $client->phone_number = '6122046473';
      $client->email = 'calcantar_19@alu.uabcs.mx';
      $client->save();
    }
}
