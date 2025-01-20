<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Assessment extends Component
{

    public $begun = false;

    public $complete = false;
    public $questions = [
        [
                'question' => 'What is this?',
                'index' => 0,
                'image' => '/images/assessment/dog.jpg',
                'answer' => 'Dog',
                'group' => 'base',
                'answered' => false,
                'is_correct' => null,
                'options' => [
                    'Dog',
                    'Cat',
                    'Ball',
                    'Tree',
            ],
        ],
        [
            'question' => 'What is this?',
            'index' => 1,
            'image' => '/images/assessment/red-apple.jpeg',
            'answer' => 'Red Apple',
            'group' => 'base',
            'answered' => false,
            'is_correct' => null,
            'options' => [
                'Red Apple',
                'Green Apple',
                'Orange',
                'Banana',
            ]
        ],
        [
            'question' => 'What colour is the banana?',
            'index' => 2,
            'answer' => 'Yellow',
            'group' => 'beginner',
            'answered' => false,
            'is_correct' => null,
            'options' => [
                'Yellow',
                'Blue',
                'Red',
                'Green',
            ]
        ],
        [
            'question' => 'Where is the dog?',
            'index' => 3,
            'answer' => 'Under the table',
            'group' => 'beginner',
            'answered' => false,
            'is_correct' => null,
            'options' => [
                'On the table',
                'Under the table',
                'Next to the table',
                'In the car',
            ]
        ],

        [
            'question' => 'Tom went to the park. He played with his friends and ate ice cream. What did Tom eat at the park?',
            'index' => 4,
            'answer' => 'Ice cream',
            'group' => 'elementary',
            'answered' => false,
            'is_correct' => null,
            'options' => [
                'Sandwich',
                'Ice cream',
                'Apple',
                'Banana',
            ]
        ],

        [
            'question' => 'Which word means the same as \'big\'?',
            'index' => 5,
            'answer' => 'Large',
            'group' => 'elementary',
            'answered' => false,
            'is_correct' => null,
            'options' => [
                'Large',
                'Small',
                'Short',
                'Fast',
            ],
        ],

            [
                'question' => 'Where is the cat?',
                'hint' => 'The cat is sleeping on the sofa, and the dog is outside.',
                'index' => 6,
                'answer' => 'On the sofa',
                'group' => 'intermediate',
                'answered' => false,
                'is_correct' => null,
                'options' => [
                    'On the sofa',
                    'Outside',
                    'In the kitchen',
                    'Under the table',
                ],
            ],

            [
                'question' => 'They __ playing football yesterday.',
                'index' => 7,
                'answer' => 'Were',
                'group' => 'intermediate',
                'answered' => false,
                'is_correct' => null,
                'options' => [
                    'Were',
                    'Was',
                    'Is',
                    'Are',
                ],
            ],

            [
                'question' => 'If I __ more time, I would read that book.',
                'index' => 7,
                'answer' => 'Had',
                'group' => 'advanced',
                'answered' => false,
                'is_correct' => null,
                'options' => [
                    'Had',
                    'Have',
                    'Has',
                    'Was',
                ],
            ],

            [
                'question' => 'She will come to the party if she __ the invitation.',
                'index' => 7,
                'answer' => 'Receives',
                'group' => 'advanced',
                'answered' => false,
                'is_correct' => null,
                'options' => [
                    'Receives',
                    'Receive',
                    'Received',
                    'Will receive',
                ],
            ],
    ];

    public $question = null;

    public $answers = [];

    public function render()
    {
        $this->resolveQuestion();

        return view('livewire.assessment')->layout('layouts.app');
    }


    public function resolveQuestion()
    {
        if(!$this->question) {
            $this->question = 0;
        } else {
            $this->question = $this->question++;
        }

    }

    public function resolveAnswer($answer)
    {

        $correct = $this->questions[$this->question]['answer'] == $answer;

        $this->answers[] = $correct;
        $this->questions[$this->question]['answered'] = true;
        $this->questions[$this->question]['is_correct'] = $correct;


        if ($this->question !== 0) {
            if (($this->question + 1) % 2 == 0) {

                $questionOne = $this->answers[$this->question - 1];
                $questionTwo = $this->answers[$this->question];

                $wrongAnswers = 0;

                if (!$questionOne) {
                    $wrongAnswers = $wrongAnswers + 1;
                }

                if (!$questionTwo) {
                    $wrongAnswers = $wrongAnswers + 1;
                }

                $currentGroup = $this->questions[count($this->answers ) - 1]['group'];

                if ($wrongAnswers == 2) {

                    $this->complete = true;

                    $assignedGroup = match ($currentGroup) {
                        'beginner' => 'base',
                        'elementary' => 'beginner',
                        'intermediate' => 'elementary',
                        'Advanced' => 'intermediate',
                        default => 'advanced',
                    };

                    $assessment = new \App\Models\Assessment();
                    $assessment->assessment = $this->questions;
                    $assessment->level = $assignedGroup;
                    $assessment->user_id = Auth::id();
                    $assessment->save();
                }

                if ($wrongAnswers === 1) {
                    $assignedGroup = $currentGroup;

                    $this->complete = true;

                    $assessment = new \App\Models\Assessment();
                    $assessment->assessment = $this->questions;
                    $assessment->level = $assignedGroup;
                    $assessment->user_id = Auth::id();
                    $assessment->save();
                }

            }
        }

        if (isset($this->questions[$this->question + 1])) {
            $this->question = $this->question + 1;
        } else {
            $assignedGroup = $currentGroup;
            $this->complete = true;

            $assessment = new \App\Models\Assessment();
            $assessment->assessment = $this->questions;
            $assessment->level = $assignedGroup;
            $assessment->user_id = Auth::id();
            $assessment->save();
        }




    }
}
