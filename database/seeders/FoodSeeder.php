<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\SubCategorie;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

 $foods = [
            // Petit-déjeuner
            ['name' => 'Oeuf à la coque','default_image'=>'default/images/foods/oeuf_coq.jpg', 'description' => 'Oeuf cuit à la coque, servi avec des mouillettes de pain grillé.', 'price' => 1500],
            ['name' => 'Pancakes aux myrtilles','default_image'=>'default/images/foods/panckake_myrtille.jpg', 'description' => 'Pancakes moelleux garnis de myrtilles fraîches et sirop d’érable.', 'price' => 1800],
            ['name' => 'Pain grillé à l\'avocat','default_image'=>'default/images/foods/pain_grille_avocat.jpg', 'description' => 'Tranche de pain grillé garnie d’avocat écrasé et d’un filet d’huile d’olive.', 'price' => 1200],
            ['name' => 'Céréales avec lait','default_image'=>'default/images/foods/cereales-lait.webp', 'description' => 'Mélange de céréales croquantes avec du lait froid.', 'price' => 1000],

            // Déjeuner
            ['name' => 'Sandwich au poulet grillé','default_image'=>'default/images/foods/sandwich_poulet_grille.jpg','description' => 'Sandwich garni de poulet grillé, laitue, tomate et sauce mayo.', 'price' => 2000],
            ['name' => 'Salade César', 'default_image'=>'default/images/foods/salade_cesar.jpg', 'description' => 'Salade croquante avec laitue romaine, poulet grillé, croûtons et parmesan.', 'price' => 2200],
            ['name' => 'Soupe de tomates', 'default_image'=>'default/images/foods/soupe_tomate.jpg','description' => 'Soupe veloutée à base de tomates fraîches, assaisonnée d’herbes aromatiques.', 'price' => 1500],
            ['name' => 'Pâtes à la bolognaise','default_image'=>'default/images/foods/pate_bolognaise.webp', 'description' => 'Pâtes al dente avec une sauce bolognaise riche en viande et tomates.', 'price' => 2500],

            // Dîner
            ['name' => 'Filet mignon sauce au poivre', 'default_image'=>'default/images/foods/filet_mignon.jpg','description' => 'Filet mignon tendre servi avec une sauce crémeuse au poivre.', 'price' => 3500],
            ['name' => 'Poisson grillé avec légumes','default_image'=>'default/images/foods/poisson_grille_legume.jpg', 'description' => 'Poisson frais grillé accompagné de légumes de saison.', 'price' => 3000],
            ['name' => 'Curry de légumes', 'default_image'=>'default/images/foods/curry_legume','description' => 'Mélange de légumes dans une sauce curry épicée, servi avec du riz basmati.', 'price' => 2200],
            ['name' => 'Pizza Margherita', 'default_image'=>'default/images/foods/pizza_margeritta.jpg', 'description' => 'Pizza traditionnelle avec sauce tomate, mozzarella et basilic frais.', 'price' => 2400],

            // Collations
            ['name' => 'Mélange de fruits secs','default_image'=>'default/images/foods/melange_fruit_sec.jpg', 'description' => 'Un assortiment de noix et fruits secs, idéal pour une collation rapide.', 'price' => 1300],
            ['name' => 'Yaourt nature', 'default_image'=>'default/images/foods/yaourt_nature.jpg','description' => 'Yaourt crémeux nature, parfait pour une pause fraîcheur.', 'price' => 800],
            ['name' => 'Barres de céréales','default_image'=>'default/images/foods/barre_cereale.jpg','description' => 'Barres énergétiques à base de céréales, fruits secs et graines.', 'price' => 1200],
            ['name' => 'Popcorn au caramel','default_image'=>'default/images/foods/pop_corn_caramel.webp', 'description' => 'Popcorn croustillant enrobé de caramel sucré.', 'price' => 1500],

            // Desserts
            ['name' => 'Gâteau au chocolat','default_image'=>'default/images/foods/gateau_chocolat.jpg', 'description' => 'Gâteau riche en chocolat avec un cœur fondant.', 'price' => 2500],
            ['name' => 'Glace à la vanille','default_image'=>'default/images/foods/gateau_chocolat.jpg', 'description' => 'Glace crémeuse au goût vanillé, servie dans un cône ou un pot.', 'price' => 1800],
            ['name' => 'Tarte aux fruits','default_image'=>'default/images/foods/gateau_chocolat.jpg', 'description' => 'Tarte garnie de fruits frais de saison et d’une crème pâtissière légère.', 'price' => 2000],
            ['name' => 'Assiette de fruits frais', 'default_image'=>'default/images/foods/gateau_chocolat.jpg','description' => 'Sélection de fruits frais de saison, coupés et prêts à déguster.', 'price' => 1700],

            // Boissons
            ['name' => 'Eau minérale','default_image'=>'default/images/foods/eau_mineral.jpg', 'description' => 'Eau minérale naturelle, purifiée et rafraîchissante.', 'price' => 500],
            ['name' => 'Jus d\'orange frais','default_image'=>'default/images/foods/jus_orange_frais.jpg', 'description' => 'Jus d’orange fraîchement pressé, riche en vitamine C.', 'price' => 1200],
            ['name' => 'Café expresso','default_image'=>'default/images/foods/cafe_expresso.jpg', 'description' => 'Café expresso fort et corsé, préparé avec des grains de café finement moulus.', 'price' => 1000],
            ['name' => 'Thé vert','default_image'=>'default/images/foods/the_vert.jpg', 'description' => 'Thé vert léger et revitalisant, parfait pour une pause relaxante.', 'price' => 900],

            // Soups
            ['name' => 'Soupe à l\'oignon','default_image'=>'default/images/foods/the_vert.jpg', 'description' => 'Soupe traditionnelle à base d’oignons caramélisés, gratinée au fromage.', 'price' => 1800],
            ['name' => 'Soupe de tomates','default_image'=>'default/images/foods/soupe_tomate.jpg', 'description' => 'Soupe onctueuse de tomates, relevée avec des herbes aromatiques.', 'price' => 1500],
            ['name' => 'Soupe de légumes','default_image'=>'default/images/foods/soupe_legume.jpg', 'description' => 'Soupe saine et nourrissante avec un mélange de légumes frais.', 'price' => 1600],
            ['name' => 'Soupe au poulet','default_image'=>'default/images/foods/soupe_poulet.jpg', 'description' => 'Soupe réconfortante avec morceaux de poulet, légumes et bouillon savoureux.', 'price' => 1700],

            // Salades
            ['name' => 'Salade César','default_image'=>'default/images/foods/salade_cesar.jpg', 'description' => 'Salade classique avec poulet grillé, croûtons et parmesan.', 'price' => 2200],
            ['name' => 'Salade de quinoa','default_image'=>'default/images/foods/salade_de_quinoa.jpg', 'description' => 'Salade saine de quinoa avec légumes croquants et vinaigrette légère.', 'price' => 2000],
            ['name' => 'Salade de légumes grillés','default_image'=>'default/images/foods/salade_legume_grille.jpg', 'description' => 'Assiette de légumes grillés, assaisonnés d’huile d’olive et d’herbes.', 'price' => 1800],
            ['name' => 'Salade de fruits de mer','default_image'=>'default/images/foods/salade_fruit_mer.jpg', 'description' => 'Salade fraîche avec un mélange de fruits de mer et une vinaigrette citronnée.', 'price' => 2500],

            // Plats principaux
            ['name' => 'Filet mignon','default_image'=>'default/images/foods/filet_mignon_2.jpg', 'description' => 'Filet mignon tendre, servi avec une sauce au vin rouge.', 'price' => 3500],
            ['name' => 'Poulet rôti','default_image'=>'default/images/foods/poulet_roti.jpg', 'description' => 'Poulet rôti à la perfection, avec une garniture de légumes de saison.', 'price' => 2800],
            ['name' => 'Risotto aux champignons','default_image'=>'default/images/foods/risotto-champion.webp', 'description' => 'Risotto crémeux avec des champignons sauvages et du parmesan.', 'price' => 2500],
            ['name' => 'Curry de légumes','default_image'=>'default/images/foods/curry_legume.jpg', 'description' => 'Curry épicé avec un assortiment de légumes, servi avec du riz basmati.', 'price' => 2200],

            // Entrées
            ['name' => 'Bruschetta','default_image'=>'default/images/foods/bruchette.jpg', 'description' => 'Tranches de pain grillé garnies de tomates fraîches, basilic et huile d’olive.', 'price' => 1500],
            ['name' => 'Carpaccio de boeuf','default_image'=>'default/images/foods/carapacio_boeuf.webp', 'description' => 'Fines tranches de boeuf cru, assaisonnées de citron et d’huile d’olive.', 'price' => 2200],
            ['name' => 'Huîtres gratinées','default_image'=>'default/images/foods/huitre_gratine.webp', 'description' => 'Huîtres gratinées au four avec une sauce au beurre et au fromage.', 'price' => 2500],
            ['name' => 'Rolls de printemps','default_image'=>'default/images/foods/spring_rolls.jpg', 'description' => 'Rouleaux de printemps frais garnis de légumes croquants et de crevettes.', 'price' => 2000],
        ];

        foreach ($foods as $foodData) {
            $food = new Food();
            $food->name = $foodData['name'];
            $food->description = $foodData['description'];
            $food->price = $foodData['price'];
            $food->default_image = $foodData['default_image'];
            $food->status = 'IN_STOCK';

            $subCategory = SubCategorie::inRandomOrder()->first();
            $restaurant = Restaurant::inRandomOrder()->first();


            if ($subCategory) {
                $food->sub_category_id = $subCategory->id;
            }
            if ($restaurant) {
                $food->restaurant_id = $restaurant->id;
            }
            $food->save();
    }
}
}
