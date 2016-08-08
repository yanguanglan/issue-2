<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

         factory(App\Order::class, 50)->create();
         factory(App\Pool::class, 10)->create();
         factory(App\Log::class, 50)->create();
    }
}
