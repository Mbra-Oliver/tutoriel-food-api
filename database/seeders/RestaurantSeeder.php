<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Restaurants fictifs avec leurs détails
        $restaurants = [
            [
                'name' => 'Le Vieux-Port Steakhouse',
                'email' => 'info@levieuxport.ca',
                'main_phone' => '514-283-8880',
                'latitude' => '45.5017',
                'longitude' => '-73.5550',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Joe Beef',
                'email' => 'info@joebeef.ca',
                'main_phone' => '514-935-6504',
                'latitude' => '45.4898',
                'longitude' => '-73.5853',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Schwartz\'s Deli',
                'email' => 'info@schwartzsdeli.com',
                'main_phone' => '514-842-4813',
                'latitude' => '45.5165',
                'longitude' => '-73.5772',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Restaurant Toqué!',
                'email' => 'info@restaurant-toque.com',
                'main_phone' => '514-499-2084',
                'latitude' => '45.5040',
                'longitude' => '-73.5653',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Au Pied de Cochon',
                'email' => 'info@restaurantaupieddecochon.ca',
                'main_phone' => '514-281-1114',
                'latitude' => '45.5150',
                'longitude' => '-73.5753',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insertion des restaurants dans la table 'restaurants'
        DB::table('restaurants')->insert($restaurants);
  
    }
}
