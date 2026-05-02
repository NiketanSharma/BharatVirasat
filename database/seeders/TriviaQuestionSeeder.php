<?php

namespace Database\Seeders;

use App\Models\TriviaQuestion;
use Illuminate\Database\Seeder;

class TriviaQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Which classical dance form originated in the temples of Tamil Nadu?',
                'option_a' => 'Kathak',
                'option_b' => 'Odissi',
                'option_c' => 'Bharatanatyam',
                'option_d' => 'Manipuri',
                'correct_option' => 'c',
                'explanation' => 'Bharatanatyam is one of the oldest and most widely practiced classical dance forms of India, with roots going back over 2,000 years to the temples of Tamil Nadu.'
            ],
            [
                'question' => 'The Taj Mahal was commissioned by which Mughal Emperor?',
                'option_a' => 'Akbar',
                'option_b' => 'Shah Jahan',
                'option_c' => 'Aurangzeb',
                'option_d' => 'Jahangir',
                'correct_option' => 'b',
                'explanation' => 'The Taj Mahal was commissioned in 1632 by Mughal Emperor Shah Jahan to house the tomb of his beloved wife, Mumtaz Mahal.'
            ],
            [
                'question' => 'What is the primary ingredient in authentic Hyderabadi Biryani?',
                'option_a' => 'Sella Rice',
                'option_b' => 'Jasmine Rice',
                'option_c' => 'Basmati Rice',
                'option_d' => 'Sona Masuri',
                'correct_option' => 'c',
                'explanation' => 'Key ingredients for authentic Hyderabadi Biryani include premium basmati rice, tender meat, and a carefully balanced blend of spices.'
            ],
            [
                'question' => 'Madhubani painting is a traditional art form from which Indian state?',
                'option_a' => 'Bihar',
                'option_b' => 'Gujarat',
                'option_c' => 'Rajasthan',
                'option_d' => 'West Bengal',
                'correct_option' => 'a',
                'explanation' => 'Madhubani painting, also known as Mithila painting, is a style of Indian painting practiced in the Mithila region of Bihar.'
            ],
            [
                'question' => 'In Baul music, what is the name of the traditional one-stringed instrument commonly used?',
                'option_a' => 'Sitar',
                'option_b' => 'Ektara',
                'option_c' => 'Sarod',
                'option_d' => 'Bansuri',
                'correct_option' => 'b',
                'explanation' => 'The Bauls often perform with a distinctive one-stringed instrument called the ektara, along with other traditional instruments.'
            ],
            [
                'question' => 'Which festival is known as the "Festival of Colors"?',
                'option_a' => 'Diwali',
                'option_b' => 'Navratri',
                'option_c' => 'Pongal',
                'option_d' => 'Holi',
                'correct_option' => 'd',
                'explanation' => 'Holi is known as the Festival of Colors. It heralds the arrival of spring and celebrates the triumph of good over evil.'
            ],
            [
                'question' => 'The Konark Sun Temple in Odisha is designed in the shape of what?',
                'option_a' => 'A Lotus Flower',
                'option_b' => 'A Gigantic Chariot',
                'option_c' => 'A Rising Sun',
                'option_d' => 'A Royal Crown',
                'correct_option' => 'b',
                'explanation' => 'The Konark Sun Temple is designed in the form of a gigantic chariot with 24 elaborately carved stone wheels pulled by seven spirited horses.'
            ]
        ];

        foreach ($questions as $q) {
            TriviaQuestion::create($q);
        }
    }
}
