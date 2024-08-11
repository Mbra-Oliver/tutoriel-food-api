<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(){

 {
        // Récupération de toutes les catégories de repas
        $categories = DB::table('categories')->pluck('id');

        // Génération de sous-catégories pour chaque catégorie de repas
        $subCategories = [
            // Sous-catégories pour le Petit-déjeuner
            'Oeufs', 'Pancakes', 'Pain grillé', 'Céréales',

            // Sous-catégories pour le Déjeuner
            'Sandwichs', 'Salades', 'Soupes', 'Pâtes',

            // Sous-catégories pour le Dîner
            'Viandes grillées', 'Poissons', 'Plats végétariens', 'Pizzas',

            // Sous-catégories pour les Collations
            'Fruits secs', 'Yaourts', 'Barres de céréales', 'Popcorn',

            // Sous-catégories pour les Desserts
            'Gâteaux', 'Glaces', 'Pâtisseries', 'Fruits frais',

            // Sous-catégories pour les Boissons
            'Eau', 'Jus de fruits', 'Café', 'Thé',

            // Sous-catégories pour les Soup
            'Soupe à l\'oignon', 'Soupe de tomates', 'Soupe de légumes', 'Soupe au poulet',

            // Sous-catégories pour les Salades
            'Salade César', 'Salade de quinoa', 'Salade de légumes grillés', 'Salade de fruits de mer',

            // Sous-catégories pour les Plats principaux
            'Filet mignon', 'Poulet rôti', 'Risotto aux champignons', 'Curry de légumes',

            // Sous-catégories pour les Entrées
            'Bruschetta', 'Carpaccio de boeuf', 'Huîtres gratinées', 'Rolls de printemps',
        ];

        foreach ($subCategories as $subCategory) {
            DB::table('sub_categories')->insert([
                'category_id' => $categories->random(),
                'name' => $subCategory,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }   
}
}