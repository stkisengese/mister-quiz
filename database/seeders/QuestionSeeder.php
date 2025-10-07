<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question')->insert([
            ['question' => 'World War I began in which year?', 'xp' => 25, 'category' => 'History'],
            ['question' => 'Adolf Hitler was born in which country?', 'xp' => 25, 'category' => 'History'],
            ['question' => 'John F. Kennedy was assassinated in:', 'xp' => 25, 'category' => 'History'],
            ['question' => 'Who fought in the war of 1812?', 'xp' => 75, 'category' => 'History'],
            ['question' => 'Which general famously stated "I shall return?"', 'xp' => 25, 'category' => 'History'],
            ['question' => 'The Magna Carta was published by the King of which country?', 'xp' => 25, 'category' => 'History'],
            ['question' => 'The first successful printing press was developed by this man.', 'xp' => 25, 'category' => 'History'],
            ['question' => 'The disease that ravaged and killed a third of Europe\'s population in the 14th century is known as:', 'xp' => 75, 'category' => 'History'],
            ['question' => 'The Hundred Years War was fought between what two countries?', 'xp' => 25, 'category' => 'History'],
            ['question' => 'Which man wrote a document known as the 95 Theses?', 'xp' => 25, 'category' => 'History'],
            ['question' => 'What famous 5th century A.D conqueror was known as "The Scourge of God?"', 'xp' => 25, 'category' => 'History'],
            ['question' => 'What famous rifle is known in America as "The Gun that Won the West?"', 'xp' => 75, 'category' => 'History'],
            ['question' => 'Who wrote "To be, or not to be, that is the question"?', 'xp' => 25, 'category' => 'Art'],
            ['question' => 'According to Guinness world records, what is the best selling book of all time?', 'xp' => 25, 'category' => 'Art'],
            ['question' => 'What type of glass is used in movies and TV special effects to break, without harming the actors?', 'xp' => 25, 'category' => 'Art'],
            ['question' => 'Van Gogh\'s "The Starry Night" illustrates the view from the window of which building', 'xp' => 75, 'category' => 'Art'],
            ['question' => 'Which composer had his heart buried in Poland and his body buried in France?', 'xp' => 75, 'category' => 'Art'],
            ['question' => 'Who is Stefani Joanne Angelina Germanotta?', 'xp' => 75, 'category' => 'Art'],
            ['question' => 'Which painter continued his work despite having crippling arthritis?', 'xp' => 75, 'category' => 'Art'],
            ['question' => 'La Giaconda is better known as what?', 'xp' => 25, 'category' => 'Art'],
            ['question' => 'Tom Hanks won two consecutive Oscars in 1994 and 1995. Which films were they for?', 'xp' => 75, 'category' => 'Art'],
            ['question' => 'Who played the lead role in the 2001 movie Lara Croft: Tomb Raider?', 'xp' => 25, 'category' => 'Art'],
            ['question' => 'Which singer has the most UK Number One singles ever?', 'xp' => 75, 'category' => 'Art'],
            ['question' => 'What was Britney Spears\' first single called?', 'xp' => 75, 'category' => 'Art'],
            ['question' => 'What is the highest mountain in the world?', 'xp' => 25, 'category' => 'Geography'],
            ['question' => 'How many islands belong to the Philippines?', 'xp' => 75, 'category' => 'Geography'],
            ['question' => 'Which one of these countries has more than one capital?', 'xp' => 25, 'category' => 'Geography'],
            ['question' => 'Where is the largest pyramid in the world?', 'xp' => 25, 'category' => 'Geography'],
            ['question' => 'How did the Marshall Islands get its name?', 'xp' => 75, 'category' => 'Geography'],
            ['question' => 'What\'s the name of the second biggest waterfall in the world, located in South Africa?', 'xp' => 75, 'category' => 'Geography'],
            ['question' => 'In which city is located the statue "Christ the Redeemer"?', 'xp' => 25, 'category' => 'Geography'],
            ['question' => 'Which city is the capital of Australia?', 'xp' => 25, 'category' => 'Geography'],
            ['question' => 'What is the smallest state in the world?', 'xp' => 25, 'category' => 'Geography'],
            ['question' => 'Which Turkish city has the name of a cartoon character?', 'xp' => 75, 'category' => 'Geography'],
            ['question' => 'Which country did once have the name Rhodesia?', 'xp' => 75, 'category' => 'Geography'],
            ['question' => 'What is the largest state of the United States?', 'xp' => 75, 'category' => 'Geography'],
            ['question' => 'Which part of the body has the thinnest skin?', 'xp' => 25, 'category' => 'Science'],
            ['question' => 'which of these chemicals is often found in nail polish remover?', 'xp' => 25, 'category' => 'Science'],
            ['question' => 'Where in the human body is the pharynx?', 'xp' => 25, 'category' => 'Science'],
            ['question' => 'How many teeth does an adult human have?', 'xp' => 25, 'category' => 'Science'],
            ['question' => 'Which creature has the longest pregnancy?', 'xp' => 75, 'category' => 'Science'],
            ['question' => 'Which animal has more than one heart?', 'xp' => 25, 'category' => 'Science'],
            ['question' => 'Who was the first woman to win the Nobel Prize?', 'xp' => 75, 'category' => 'Science'],
            ['question' => 'Where is the smallest bone of the human body?', 'xp' => 25, 'category' => 'Science'],
            ['question' => 'What are phosphenes?', 'xp' => 75, 'category' => 'Science'],
            ['question' => 'Which plant, known as "the bearer of hope", survived the atomic bomb of Hiroshima in 1945?', 'xp' => 75, 'category' => 'Science'],
            ['question' => 'Which hormone causes cells to absorb glucose from the blood?', 'xp' => 25, 'category' => 'Science'],
            ['question' => 'Which marine animal is the only male creature that reproduces through the female\'s ovulation?', 'xp' => 75, 'category' => 'Science'],
            ['question' => 'In which year did Maradona score a goal with his hand?', 'xp' => 75, 'category' => 'Sports'],
            ['question' => 'How many minutes is a rugby match?', 'xp' => 75, 'category' => 'Sports'],
            ['question' => 'In which country were the first Olympic Games held?', 'xp' => 25, 'category' => 'Sports'],
            ['question' => 'How many matches did Mohammed Ali lose in his career?', 'xp' => 75, 'category' => 'Sports'],
            ['question' => 'Which cyclist was also called "The Cannibal"?', 'xp' => 75, 'category' => 'Sports'],
            ['question' => 'In which country is the Interlagos F1-circuit?', 'xp' => 75, 'category' => 'Sports'],
            ['question' => 'What is the name of the Barcelona FC football stadium?', 'xp' => 25, 'category' => 'Sports'],
            ['question' => 'Which popular fitness method was invented by a German?', 'xp' => 75, 'category' => 'Sports'],
            ['question' => 'How many times has Michael Schumacher been a Formula 1 champion?', 'xp' => 75, 'category' => 'Sports'],
            ['question' => 'What is the national sport in Japan?', 'xp' => 25, 'category' => 'Sports'],
            ['question' => 'With which car did Fernando Alonso won his first tittle in Formula 1?', 'xp' => 75, 'category' => 'Sports'],
            ['question' => 'Which snooker player is nicknamed as "The Rocket"?', 'xp' => 25, 'category' => 'Sports'],
        ]);
    }
}