<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        $this->faqs();
        $this->faqCategories();
    }

    public function faqCategories() 
    {
        $category1 = FaqCategory::create([
            'name' => [
                'en' => "Top six",
                'es' => "Top seis"
            ],            
        ]);

        $category2 = FaqCategory::create([
            'name' => [
                'en' => "Deliveries",
                'es' => "Entregas"
            ],            
        ]);

        $category3 = FaqCategory::create([
            'name' => [
                'en' => "Bookings",
                'es' => "Reservas"
            ],            
        ]);

        foreach(Faq::all() as $faq) {
            $faq->faqCategories()->attach($category1->id);

            if($faq->id % 2 == 0) {
                $faq->faqCategories()->attach($category2->id);
            } else {
                $faq->faqCategories()->attach($category3->id);
            }
        }        
    }

    public function faqs() 
    {
        Faq::create([
            'question' => [
                'en' => "I'm ready to book.",
                'es' => "Estoy listo para reservar."
            ],
            'answer' => [
                'en' => 'EN Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.',
                'es' => 'ES Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.'
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => "So, what's included in the rental price?",
                'es' => "¿Qué incluye el precio?"
            ],
            'answer' => [
                'en' => 'EN Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.',
                'es' => 'ES Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.'
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => "Where do I retrieve my rental? ",
                'es' => "¿Dónde encuentro mi reserva?"
            ],
            'answer' => [
                'en' => 'EN Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.',
                'es' => 'ES Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.'
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => "Just landed! Walk me through what I need to do now?",
                'es' => "¡Acabo de aterrizar! Dime ¿qué debo hacer ahora?"
            ],
            'answer' => [
                'en' => 'EN Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.',
                'es' => 'ES Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.'
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => "Will the vehicle I choose online be available at pick up?",
                'es' => "¿El vehículo que elijo en línea estará disponible en el momento de la recogida?"
            ],
            'answer' => [
                'en' => 'EN Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.',
                'es' => 'ES Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.'
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => "How about my Driver's License? Is it valid in Iceland?",
                'es' => "¿Qué tal mi Licencia de Conducir? ¿Es válido en Islandia?"
            ],
            'answer' => [
                'en' => 'EN Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.',
                'es' => 'ES Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere.'
            ],
        ]);
    }
}