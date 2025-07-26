<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Question_Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        // Check if user is logged in, redirect if not
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $user = $request->user();

        // Check if user already has an incomplete quiz
        $existingQuiz = Quiz::where('user_id', $user->id)
            ->where('completed', 0)
            ->first();

        if ($existingQuiz) {
            // User has an existing incomplete quiz, load it
            $quiz = $existingQuiz;
            $questions = $quiz->getQuestions();
        } else {
            // Create a new quiz
            $categories = ['History', 'Art', 'Geography', 'Science', 'Sports'];
            $questions = [];

            // Getting 4 random questions from each category
            foreach ($categories as $cat) {
                $query_questions = Question::inRandomOrder()->where('category', $cat)->limit(4)->get();
                foreach ($query_questions as $qq) {
                    array_push($questions, $qq);
                }
            }

            shuffle($questions);

            // Create new quiz record
            $quiz = Quiz::create([
                'completed' => 0,
                'user_id' => $user->id
            ]);

            // Associate questions with the quiz
            foreach ($questions as $question) {
                Question_Quiz::create([
                    'question_id' => $question->id,
                    'quizzes_id' => $quiz->id
                ]);
            }
        }

        return view('questions.list', ['quiz' => $quiz, 'questions' => $questions]);
    }

    public function results(Request $request)
    {
        // Get quiz from DB
        $quiz = Quiz::where('id', $request->quiz)->get()->first();
        $request = $request->all();

        // Makes quiz completed
        $quiz['completed'] = 1;

        $results = array('overall' => 0, 'art' => 0, 'geography' => 0, 'history' => 0, 'science' => 0, 'sports' => 0);
        $xp = 0;

        // Get all questions for this quiz
        $quizQuestions = $quiz->getQuestions();

        // Figuring out which answers are correct
        foreach ($request as $key => $value) {
            if (is_numeric($key)) {
                $correct_answer = Answer::where('question_id', $key)
                    ->where('correct', 1)
                    ->get()
                    ->first()['answer'];

                if ($correct_answer == $value) {
                    $question = Question::where('id', $key)->get()->first();
                    $results['overall']++;
                    $results[strtolower($question->category)]++;
                    $xp += $question->xp;
                }
            }
        }

        // Adding XP to the user
        Auth::user()['xp'] += $xp;

        // Adding categories score to the user
        foreach ($results as $key => $value) {
            if ($key != 'overall') {
                $currentScore = Auth::user()[$key];
                $scoreParts = explode("/", $currentScore);
                $correct = intval($scoreParts[0]);
                $total = intval($scoreParts[1]);

                Auth::user()[$key] = ($correct + $value) . "/" . ($total + 4);
            }
        }

        // Save changes in DB
        Auth::user()->save();
        $quiz->save();


        return view('questions.results', ['results' => $results]);
    }
}
