<?php

namespace Database\Seeders\IcelandCars;

use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogAuthor;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Create 5 categories
        foreach (range(1, 5) as $i) {

            BlogCategory::factory()->create([
                'name' => [
                    'en' => 'Category ' . $i,
                    'es' => 'Categoría ' . $i,
                    'de' => 'Kategorie ' . $i,
                    'fr' => 'Catégorie ' . $i,
                    'it' => 'Categoria ' . $i,
                    'da' => 'Kategori ' . $i,
                ],
                'slug' => [
                    'en' => 'category-' . $i,
                    'es' => 'categoria-' . $i,
                    'de' => 'kategorie-' . $i,
                    'fr' => 'categorie-' . $i,
                    'it' => 'categoria-' . $i,
                    'da' => 'kategori-' . $i,
                ]
            ]);
        }

        foreach (range(1, 5) as $i) {
            BlogTag::factory()->create();
        }

        //Create 5 authors
        for ($i = 1; $i <= 5; $i++) {
            BlogAuthor::factory()->create();
        }

        //Create 20 posts
        foreach (range(1, 20) as $i) {
            $post = BlogPost::factory()->create([
                'title' => [
                    'en' => 'Example post for languages ' . $i,
                    'es' => 'Post de ejemplo para idiomas ' . $i,
                    'de' => 'Beispielbeitrag für Sprachen ' . $i,
                    'fr' => 'Exemple de message pour les langues ' . $i,
                    'it' => 'Post di esempio per le lingue ' . $i,
                    'da' => 'Eksempelindlæg til sprog ' . $i,
                ],
                'slug' => [
                    'en' => 'example-post-for-languages-' . $i,
                    'es' => 'post-de-ejemplo-para-idiomas-' . $i,
                    'de' => 'beispielbeitrag-fur-sprachen-' . $i,
                    'fr' => 'exemple-de-message-pour-les-langues-' . $i,
                    'it' => 'post-di-esempio-per-le-lingue-' . $i,
                    'da' => 'eksempelindlag-til-sprog-' . $i,
                ]
            ]);

            sleep(1); //for published_at time

            $post->tags()->attach(BlogTag::inRandomOrder()->take(3)->pluck('id')->toArray());

            $post->featured_image = $post->addImage('https://picsum.photos/id/'. rand(0,200). '/1436/960', '');

            $post->save();

        }
    }
}
