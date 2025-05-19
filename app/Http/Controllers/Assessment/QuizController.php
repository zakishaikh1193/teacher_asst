<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{

    private function loadQuestions()
    {
        $json = storage_path('app/assessment/questions.json');
        $questions = json_decode(file_get_contents($json), true);

        return $questions;
    }

    public function showQuiz()
    {
        if (!session()->has('participant_id')) {
            return redirect()->route('assessment.register');
        }

        $participant = DB::table('participants')->where('id', session('participant_id'))->first();

        return view('assessment.quiz', [
            'questions' => $this->loadQuestions(),
            'total' => count($this->loadQuestions()),
            'startTime' => \Carbon\Carbon::parse($participant->created_at)->timestamp
        ]);
    }

    // public function submitQuiz(Request $request)
    // {
    //     $answers = $request->input('answers'); // question_id => selected answer
    //     $participantId = session('participant_id');

    //     if (!$participantId || empty($answers)) {
    //         return redirect()->route('assessment.register')->withErrors('Please register before attempting the quiz.');
    //     }

    //     // Suggest course based on logic
    //     $suggestedCourse = $this->suggestCourse($answers);

    //     // Store attempt
    //     $attemptId = DB::table('attempts')->insertGetId([
    //         'participant_id' => $participantId,
    //         'suggested_courses' => $suggestedCourse,
    //         'submitted_at' => now(),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     // Load JSON questions
    //     $questions = collect($this->loadQuestions());

    //     // Store each answer
    //     foreach ($answers as $questionId => $selectedAnswer) {
    //         $question = $questions->firstWhere('id', (int)$questionId);
    //         $optionIndex = array_search($selectedAnswer, $question['options']);

    //         if ($optionIndex !== false) {
    //             DB::table('attempt_answers')->insert([
    //                 'attempt_id'   => $attemptId,
    //                 'question_id'  => (int)$questionId,
    //                 'option_no'    => $optionIndex + 1, // convert to 1-based
    //                 'answer'       => $selectedAnswer,
    //                 'created_at'   => now(),
    //                 'updated_at'   => now(),
    //             ]);
    //         }
    //     }
    //     session()->forget('participant_id');


    //     session(['suggested_courses' => json_decode($suggestedCourse, true)]); // regular session
    //     return redirect()->route('assessment.result'); // store as array
    // }

    // private function suggestCourse(array $answers)
    // {
    //     // Flatten all answers into a simple array of keywords
    //     $userResponses = array_map('strtolower', array_values($answers));

    //     // $json = Storage::get('assessment/course_suggestions.json');
    //     $json = file_get_contents(base_path('storage/app/assessment/course_suggestions.json'));
    //     $courseData = json_decode($json, true);

    //     $matchedCourses = [];

    //     foreach ($courseData as $course) {
    //         $keywords = array_map('strtolower', $course['match']);
    //         foreach ($userResponses as $response) {
    //             foreach ($keywords as $keyword) {
    //                 if (Str::contains($response, $keyword)) {
    //                     $matchedCourses[] = $course['id'];
    //                     break;
    //                 }
    //             }
    //         }
    //     }

    //     // Remove duplicates
    //     $matchedCourses = array_unique($matchedCourses);

    //     // Return as JSON for DB storage
    //     return json_encode($matchedCourses);
    // }
private function suggestCourse(array $competencyPercents)
{
    $json = file_get_contents(base_path('storage/app/assessment/course_suggestions.json'));
    $courseData = json_decode($json, true);
    Log::info('📊 Incoming competencyPercents: ' . json_encode($competencyPercents));


    asort($competencyPercents);

    $lowest3 = array_slice(array_keys($competencyPercents), 0, 3);
Log::info('🧩 Lowest 3 competencies: ' . json_encode($lowest3));

    $matchedCourses = [];

    foreach ($courseData as $course) {
        Log::info('🔎 Checking course ID: ' . $course['id'], ['match' => $course['match']]);

        foreach ($course['match'] as $compCode) {
            if (in_array($compCode, $lowest3)) {
                Log::info('✅ Match found!', ['course_id' => $course['id'], 'matched_comp' => $compCode]);
                $matchedCourses[] = $course;
                break;
            }
        }
    }

    Log::info('📦 Final matched course IDs:', $matchedCourses);

    return $matchedCourses;
}





    // public function showResult()
    // {
    //     return view('assessment.result', [
    //         'suggestedCourse' => session('course')
    //     ]);
    // }

    // public function showResult()
    // {
    //     $courseIds = session('suggested_courses', []);

    //     if (empty($courseIds)) {
    //         return redirect()->route('assessment.quiz')->with('error', 'Session expired. Please take the quiz again.');
    //     }

    //     // $json = Storage::get('assessment/course_suggestions.json');
    //     $json = file_get_contents(base_path('storage/app/assessment/course_suggestions.json'));
    //     $courseData = collect(json_decode($json, true));

    //     $courses = $courseData->whereIn('id', $courseIds)->values();
    //     return view('assessment.result', compact('courses'));
    // }


private function buildCompetencyMapFromEnhanced(): array
{
    $json = file_get_contents(base_path('storage/app/assessment/questions_enhanced.json'));
    $questions = json_decode($json, true);
    $map = [];

    foreach ($questions as $q) {
        if (!isset($q['competencies'])) continue;

        foreach ($q['competencies'] as $optionIndex => $compScores) {
            foreach ($compScores as $compCode => $score) {
                // Map directly: [question_id][option_index][competency_code] => score
                $map[$q['id']]['option_scores'][(string)$optionIndex][$compCode] = $score;
            }
        }
    }

    return $map;
}



    public function submitQuiz(Request $request)
    {
        
        $answers = $request->input('answers'); // question_id => selected answer
        $participantId = session('participant_id');

        if (!$participantId || empty($answers)) {
            return redirect()->route('assessment.register')->withErrors('Please register before attempting the quiz.');
        }

        // Load JSON files  
        $questions = collect($this->loadQuestions());

        // ✅ Fix: Combine both enhanced map + score_levels
        $baseMap = json_decode(Storage::get('assessment/competency_meta.json'), true);

        $mappings = [
            'question_competency_map' => $this->buildCompetencyMapFromEnhanced(),
            'score_levels' => collect($baseMap['scoring_levels'] ?? [])
                ->mapWithKeys(fn($item, $key) => [$key => $item['score']])
                ->toArray()
        ];

        // Compute Competency Scores     
        $competencyScores = [];
        foreach ($answers as $questionId => $selectedAnswer) {
            $question = $questions->firstWhere('id', (int)$questionId);

            $optionIndex = collect($question['options'])->search(function ($option) use ($selectedAnswer) {
                return trim($option) === trim($selectedAnswer);
            });
            if ($optionIndex === false) {
                Log::warning('❌ Option not matched:', [
                    'question_id' => $questionId,
                    'selected_answer' => $selectedAnswer,
                    'options' => $question['options']
                ]);
                continue;
            }


            if ($optionIndex === false) continue;

            $map = $mappings['question_competency_map'][$questionId] ?? null;
            if (!$map) {
    Log::warning('❌ Missing competency map for question:', ['question_id' => $questionId]);
    continue;
}


            $optionScores = $map['option_scores'][(string)$optionIndex] ?? null;

            if (!$optionScores) {
                Log::warning('⚠️ No option scores found:', [
                    'question_id' => $questionId,
                    'option_index' => $optionIndex,
                    'map' => $map
                ]);
                continue;
            }

            foreach ($optionScores as $compCode => $score) {
                $competencyScores[$compCode] = ($competencyScores[$compCode] ?? 0) + $score;
            }
        }

        // Normalize to percentage 
        $competencyPercents = [];
        foreach ($competencyScores as $code => $earned) {
            $maxScore = $this->getMaxPoints($code, $mappings['question_competency_map']);
            $competencyPercents[$code] = round(($earned / $maxScore) * 100, 2);
        }

        $suggestedCourse = json_encode($this->suggestCourse($competencyPercents));
        Log::info('🔍 Suggested course raw:', ['suggested_courses' => $suggestedCourse]);

        // Store attempt
        $attemptId = DB::table('attempts')->insertGetId([
            'participant_id' => $participantId,
            'suggested_courses' => $suggestedCourse,
            'competency_scores' => json_encode($competencyPercents),
            'submitted_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Store individual answers
        foreach ($answers as $questionId => $selectedAnswer) {
            $question = $questions->firstWhere('id', (int)$questionId);
            // $optionIndex = array_search($selectedAnswer, $question['options']);
            $optionIndex = array_search($selectedAnswer, $question['options']);

            if ($optionIndex !== false) {
                DB::table('attempt_answers')->insert([
                    'attempt_id'   => $attemptId,
                    'question_id'  => (int)$questionId,
                    'option_no'    => $optionIndex + 1,
                    'answer'       => $selectedAnswer,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        }

        session()->forget('participant_id');
        session(['suggested_courses' => $suggestedCourse]);
        Log::info('✅ Stored course IDs in session: ' . json_encode($suggestedCourse));
        session(['competency_scores' => $competencyPercents]);
        Log::info('👉 Submitting quiz - storing session:', ['suggested_courses' => $suggestedCourse]);


       return redirect()->route('assessment.result');
    }

 private function getMaxPoints($competency, $map)
{
    $maxPoints = 0;

    foreach ($map as $q) {
        if (!isset($q['option_scores'])) continue;

        foreach ($q['option_scores'] as $scores) {
            if (isset($scores[$competency])) {
                $maxPoints += 4; // since 4 is the max score for any option
            }
        }
    }

    return $maxPoints;
}


    // public function showResult()
    // {
    //     $courseIds = session('suggested_courses', []);
    //     $competencyScores = session('competency_scores', []);

    //     if (empty($courseIds)) {
    //         return redirect()->route('assessment.quiz')->with('error', 'Session expired. Please take the quiz again.');
    //     }

    //     $json = file_get_contents(base_path('storage/app/assessment/course_suggestions.json'));
    //     $courseData = collect(json_decode($json, true));

    //     $courses = $courseData->whereIn('id', $courseIds)->values();

    //     return view('assessment.result', compact('courses', 'competencyScores'));
    // }

    // public function showResult()
    // {
    //     $courseIds = session('suggested_courses', []);

    //     if (empty($courseIds)) {
    //         return redirect()->route('assessment.quiz')->with('error', 'Session expired. Please take the quiz again.');
    //     }

    //     // Load course suggestions
    //     $courseData = collect(json_decode(file_get_contents(base_path('storage/app/assessment/course_suggestions.json')), true));
    //     $courses = $courseData->whereIn('id', $courseIds)->values();

    //     // Load user answers
    //     $latestAttempt = DB::table('attempts')->latest()->first();
    //     $attemptAnswers = DB::table('attempt_answers')
    //         ->where('attempt_id', $latestAttempt->id)
    //         ->get();

    //     $questionData = collect(json_decode(file_get_contents(base_path('storage/app/assessment/questions_enhanced.json')), true));
    //     $metaData = json_decode(file_get_contents(base_path('storage/app/assessment/competency_meta.json')), true);
    //     $competencyScores = [];

    //     // Calculate raw scores
    //     foreach ($attemptAnswers as $answer) {
    //         $q = $questionData->firstWhere('id', (int) $answer->question_id);
    //         if (!$q || !isset($q['competencies'][$answer->option_no - 1])) continue;

    //         foreach ($q['competencies'][$answer->option_no - 1] as $compCode => $score) {
    //             if (!isset($competencyScores[$compCode])) $competencyScores[$compCode] = 0;
    //             $competencyScores[$compCode] += $score;
    //         }
    //     }

    //     // Normalize to percentage
    //     $competencyPercentages = [];
    //     foreach ($competencyScores as $code => $earned) {
    //         $maxPossible = collect($questionData)->reduce(function ($carry, $q) use ($code) {
    //             foreach ($q['competencies'] ?? [] as $compLevels) {
    //                 if (isset($compLevels[$code])) {
    //                     $carry += 4;
    //                     break;
    //                 }
    //             }
    //             return $carry;
    //         }, 0);
    //         $competencyPercentages[] = [
    //             'code' => $code,
    //             'title' => $metaData['competency_titles'][$code],
    //             'score' => round(($earned / $maxPossible) * 100)
    //         ];
    //     }

    //     // Determine teaching archetype
    //     $archetype = 'Undefined';
    //     $archetypeDesc = '';
    //     foreach ($metaData['archetypes'] as $type) {
    //         $match = true;
    //         foreach ($type['trigger_logic']['high'] ?? [] as $c) {
    //             $score = collect($competencyPercentages)->firstWhere('code', $c)['score'] ?? 0;
    //             if ($score < 75) $match = false;
    //         }
    //         foreach ($type['trigger_logic']['low'] ?? [] as $c) {
    //             $score = collect($competencyPercentages)->firstWhere('code', $c)['score'] ?? 100;
    //             if ($score > 60) $match = false;
    //         }
    //         if ($match) {
    //             $archetype = $type['label'];
    //             $archetypeDesc = $type['narrative'];
    //             break;
    //         }
    //     }

    //     // Build teacher profile
    //     $teacherProfile = [
    //         'name' => 'Ms. Amina Rahman', // Replace if dynamic
    //         'grade_band' => 'Middle School',
    //         'assessment_date' => now()->format('F d, Y'),
    //         'teaching_archetype' => $archetype,
    //         'archetype_description' => $archetypeDesc
    //     ];

    //     // Strengths (top 3)
    //     // $strengths = collect($competencyPercentages)->sortByDesc('score')->take(3)->map(function ($item) use ($metaData) {
    //     //     return [
    //     //         'competency' => $item['code'],
    //     //         'title' => $item['title'],
    //     //         'summary' => $metaData['strength_feedback'][$item['code']] ?? ''
    //     //     ];
    //     // });
    //     $strengths = collect($competencyPercentages)
    //         ->sortByDesc('score')
    //         ->take(3)
    //         ->map(function ($item) use ($metaData) {
    //             return [
    //                 'competency' => $item['code'],
    //                 'title' => $item['title'],
    //                 'score' => $item['score'], // ✅ Add this line
    //                 'summary' => $metaData['strength_feedback'][$item['code']] ?? ''
    //             ];
    //         });

    //     // Growth Areas (bottom 3)
    //     // $growths = collect($competencyPercentages)->sortBy('score')->take(3)->map(function ($item) use ($metaData) {
    //     //     return [
    //     //         'competency' => $item['code'],
    //     //         'title' => $item['title'],
    //     //         'summary' => $metaData['growth_feedback'][$item['code']] ?? '',
    //     //         'recommended_courses' => $metaData['growth_courses'][$item['code']] ?? []
    //     //     ];
    //     // });

    //     $growths = collect($competencyPercentages)
    //         ->sortBy('score')
    //         ->take(3)
    //         ->map(function ($item) use ($metaData) {
    //             return [
    //                 'competency' => $item['code'],
    //                 'title' => $item['title'],
    //                 'score' => $item['score'], // ✅ Add this line
    //                 'summary' => $metaData['growth_feedback'][$item['code']] ?? '',
    //                 'recommended_courses' => $metaData['growth_courses'][$item['code']] ?? []
    //             ];
    //         });

    //     // Reflective prompts
    //     $lowest = $growths->pluck('competency')->toArray();
    //     $prompts = collect($lowest)->flatMap(function ($c) use ($metaData) {
    //         return $metaData['reflective_prompts'][$c] ?? [];
    //     })->unique()->take(2);

    //     // Learning pathway (sample based on growth areas)
    //     $learning_pathway = $growths->flatMap(function ($g) {
    //         return array_map(fn($course) => [
    //             'course' => $course,
    //             'format' => 'Self-paced',
    //             'duration' => '2 weeks',
    //             // 'justification' => "Supports {$g['code']}: {$g['title']}" 
    //         ], $g['recommended_courses']);
    //     })->take(5);

    //     return view('assessment.result', compact(
    //         'teacherProfile',
    //         'competencyPercentages',
    //         'strengths',
    //         'growths',
    //         'prompts',
    //         'learning_pathway',
    //         'courses'
    //     ));
    // }
    public function showResult()
{
    try {
        Log::info('🟡 Entered showResult()');

            $courseJson = session('suggested_courses', '[]');
            $courseObjects = json_decode($courseJson, true);  // now it's a PHP array of course dicts
            $courseIds = collect($courseObjects)->pluck('id')->all(); // ✅ Get the array of course IDs
            $allCourses = collect(json_decode($courseJson, true));

            Log::info('Session course IDs: ' . json_encode($courseIds));

        if (empty($courseIds)) {
            Log::warning('⚠️ No suggested courses in session. Redirecting to quiz.');
            return redirect()->route('assessment.quiz')->with('error', 'Session expired. Please take the quiz again.');
        }

        // Load course suggestions
        $courseData = collect(json_decode(file_get_contents(base_path('storage/app/assessment/course_suggestions.json')), true));
        $courses = $courseData->whereIn('id', $courseIds)->values();
        Log::info('✅ Courses loaded: ' . $courses->pluck('title')->join(', '));

        // Load user answers
        $latestAttempt = DB::table('attempts')->latest()->first();
        if (!$latestAttempt) {
            throw new \Exception('No attempts found in database.');
        }

        $attemptAnswers = DB::table('attempt_answers')
            ->where('attempt_id', $latestAttempt->id)
            ->get();
        Log::info('✅ Attempt ID: ' . $latestAttempt->id . ' | Answers count: ' . $attemptAnswers->count());

        $questionData = collect(json_decode(file_get_contents(base_path('storage/app/assessment/questions_enhanced.json')), true));
        $metaData = json_decode(file_get_contents(base_path('storage/app/assessment/competency_meta.json')), true);
        $competencyScores = [];

        foreach ($attemptAnswers as $answer) {
            $q = $questionData->firstWhere('id', (int)$answer->question_id);
            if (!$q || !isset($q['competencies'][$answer->option_no - 1])) continue;

            foreach ($q['competencies'][$answer->option_no - 1] as $compCode => $score) {
                $competencyScores[$compCode] = ($competencyScores[$compCode] ?? 0) + $score;
            }
        }

        $competencyPercentages = [];
        foreach ($competencyScores as $code => $earned) {
            $maxPossible = collect($questionData)->reduce(function ($carry, $q) use ($code) {
                foreach ($q['competencies'] ?? [] as $compLevels) {
                    if (isset($compLevels[$code])) {
                        $carry += 4;
                        break;
                    }
                }
                return $carry;
            }, 0);

            $score = $maxPossible > 0 ? round(($earned / $maxPossible) * 100) : 0;

            $competencyPercentages[] = [
                'code' => $code,
                'title' => $metaData['competency_titles'][$code] ?? $code,
                'score' => $score,
                'strength_feedback' => $metaData['strength_feedback'][$code] ?? $code,
                'growth_feedback' => $metaData['growth_feedback'][$code] ?? $code
            ];
        }
        Log::info('✅ Competency scores calculated: ' . json_encode($competencyPercentages));

        // Determine teaching archetype
        $archetype = 'Undefined';
            $archetypeDesc = '';
            foreach ($metaData['archetypes'] as $type) {
                $highs = collect($type['trigger_logic']['high'] ?? []);
                $lows = collect($type['trigger_logic']['low'] ?? []);

                $highMatchCount = $highs->filter(function ($c) use ($competencyPercentages) {
                    $score = collect($competencyPercentages)->firstWhere('code', $c)['score'] ?? 0;
                    return $score >= 75;
                })->count();

                $lowMatchCount = $lows->filter(function ($c) use ($competencyPercentages) {
                    $score = collect($competencyPercentages)->firstWhere('code', $c)['score'] ?? 100;
                    return $score <= 60;
                })->count();

                if (
                    ($highs->isEmpty() || $highMatchCount / $highs->count() >= 0.67) &&
                    ($lows->isEmpty() || $lowMatchCount / $lows->count() >= 0.67)
                ) {
                    $archetype = $type['label'];
                    $archetypeDesc = $type['narrative'];
                    break;
                }
            }

            $participantId = session('participant_id') ?? $latestAttempt->participant_id;
            $participant = DB::table('participants')->find($participantId);

            Log::info('✅ Teacher fetched:', (array) $participant);


            $participant = DB::table('participants')->find($participantId);

            Log::info('The details of teacher: ' . json_encode($participant));

            $teacherProfile = [
                'name' => $participant->full_name ?? 'Anonymous',
                'grade_band' => $participant->designation ?? 'Not specified',
                'assessment_date' => now()->format('F d, Y'),
                'teaching_archetype' => $archetype,
                'archetype_description' => $archetypeDesc
            ];


        // Strengths
        $strengths = collect($competencyPercentages)
            ->sortByDesc('score')
            ->take(3)
            ->map(function ($item) use ($metaData) {
                return [
                    'competency' => $item['code'],
                    'title' => $item['title'],
                    'score' => $item['score'],
                    'summary' => $metaData['strength_feedback'][$item['code']] ?? ''
                ];
            })->values();
        Log::info('✅ Strengths: ' . json_encode($strengths));

            $suggestedCourses = json_decode(session('suggested_courses', '[]'), true);

            // Group suggested courses by competency
            $groupedByCompetency = collect($suggestedCourses)
                ->flatMap(function ($course) {
                    return collect($course['match'] ?? [])->map(fn($c) => [$c => $course]);
                })
                ->reduce(function ($carry, $item) {
                    foreach ($item as $key => $course) {
                        $carry[$key][] = $course;
                    }
                    return $carry;
                }, []);

        // Growths
        $growths = collect($competencyPercentages)
            ->sortBy('score')
            ->take(3)
            ->map(function ($item) use ($metaData, $courses) {
                return [
                    'competency' => $item['code'],
                    'title' => $item['title'],
                    'score' => $item['score'],
                    'summary' => $metaData['growth_feedback'][$item['code']] ?? '',
                    'recommended_courses' => $metaData['growth_courses'][$item['code']] ?? []
                ];
            })->values();
        Log::info('✅ Growths: ' . json_encode($growths));

        // Prompts
        $lowest = $growths->pluck('competency')->toArray();
        $prompts = collect($lowest)->flatMap(function ($c) use ($metaData) {
            return $metaData['reflective_prompts'][$c] ?? [];
        })->unique()->take(2)->values();
        Log::info('✅ Prompts: ' . json_encode($prompts));

            // Learning pathway
            //  $learning_pathway = $growths->flatMap(function ($g) {
            //     return array_map(fn($course) => [
            //         'course' => $course,
            //         'format' => 'Self-paced',
            //         'duration' => '2 weeks',
            //         'reason' => $g['title'],
            //     ], $g['recommended_courses']);
            // })->take(5)->values();
            $learning_pathway = $growths->flatMap(function ($g) use ($allCourses) {
                return array_filter(array_map(function ($courseId) use ($g, $allCourses) {
                    $course = $allCourses->firstWhere('id', $courseId);
                    if (!$course) return null; // Skip if course not found

                    return [
                        'course' => $course,
                        'format' => 'Self-paced',
                        'duration' => '2 weeks',
                        'reason' => $g['title'],
                    ];
                }, $g['recommended_courses']));
            })->take(5)->values();

            Log::info('✅ Learning Pathway: ' . json_encode($learning_pathway));
        

        Log::info('✅ Rendering result view...');
        return view('assessment.result', compact(
            'teacherProfile',
            'competencyPercentages',
            'strengths',
            'growths',
            'prompts',
            'learning_pathway',
            'courses',
            'groupedByCompetency'
        ));

    } catch (\Throwable $e) {
        Log::error('❌ Error in showResult(): ' . $e->getMessage());
        return response("An error occurred: " . $e->getMessage(), 500);
    }
}



    public function downloadPdf()
    {
        // Repeat all necessary logic from showResult() (or reuse it if abstracted)
        $courseIds = session('suggested_courses', []);
        if (empty($courseIds)) {
            return redirect()->route('assessment.quiz')->with('error', 'Session expired.');
        }

        $courseData = collect(json_decode(file_get_contents(base_path('storage/app/assessment/course_suggestions.json')), true));
        $courses = $courseData->whereIn('id', $courseIds)->values();

        $latestAttempt = DB::table('attempts')->latest()->first();
        $attemptAnswers = DB::table('attempt_answers')->where('attempt_id', $latestAttempt->id)->get();

        $questionData = collect(json_decode(file_get_contents(base_path('storage/app/assessment/questions_enhanced.json')), true));
        $metaData = json_decode(file_get_contents(base_path('storage/app/assessment/competency_meta.json')), true);
        $competencyScores = [];

        foreach ($attemptAnswers as $answer) {
            $q = $questionData->firstWhere('id', (int) $answer->question_id);
            if (!$q || !isset($q['competencies'][$answer->option_no - 1])) continue;

            foreach ($q['competencies'][$answer->option_no - 1] as $compCode => $score) {
                $competencyScores[$compCode] = ($competencyScores[$compCode] ?? 0) + $score;
            }
        }

        $competencyPercentages = [];
        foreach ($competencyScores as $code => $earned) {
            $maxPossible = collect($questionData)->reduce(function ($carry, $q) use ($code) {
                foreach ($q['competencies'] ?? [] as $compLevels) {
                    if (isset($compLevels[$code])) {
                        $carry += 4;
                        break;
                    }
                }
                return $carry;
            }, 0);
            $competencyPercentages[] = [
                'code' => $code,
                'title' => $metaData['competency_titles'][$code] ?? $code,
                'score' => round(($earned / $maxPossible) * 100)
            ];
        }

        $teacherProfile = [
            'name' => 'Ms. Amina Rahman',
            'grade_band' => 'Middle School',
            'assessment_date' => now()->format('F d, Y'),
            'teaching_archetype' => 'Undefined',
            'archetype_description' => ''
        ];

        $strengths = collect($competencyPercentages)->sortByDesc('score')->take(3)->map(function ($item) use ($metaData) {
            return [
                'competency' => $item['code'],
                'title' => $item['title'],
                'summary' => $metaData['strength_feedback'][$item['code']] ?? '',
            ];
        });

        $growths = collect($competencyPercentages)->sortBy('score')->take(3)->map(function ($item) use ($metaData) {
            return [
                'competency' => $item['code'],
                'title' => $item['title'],
                'summary' => $metaData['growth_feedback'][$item['code']] ?? '',
                'recommended_courses' => $metaData['growth_courses'][$item['code']] ?? []
            ];
        });

        $lowest = $growths->pluck('competency')->toArray();
        $prompts = collect($lowest)->flatMap(fn($c) => $metaData['reflective_prompts'][$c] ?? [])->unique()->take(2);

        $learning_pathway = $growths->flatMap(function ($g) {
            return array_map(fn($course) => [
                'course' => $course,
                'format' => 'Self-paced',
                'duration' => '2 weeks',
                // 'justification' => "Supports {$g['code']}: {$g['title']}" 
            ], $g['recommended_courses']);
        })->take(5);

        $pdf = Pdf::loadView('assessment.report-pdf', compact(
            'teacherProfile',
            'competencyPercentages',
            'strengths',
            'growths',
            'prompts',
            'learning_pathway',
            'courses'
        ));

        return $pdf->download('teacher_diagnostic_report.pdf');
    }

    public function downloadReport()
    {
        $courseIds = session('suggested_courses', []);
        if (empty($courseIds)) {
            return redirect()->route('assessment.quiz')->with('error', 'Session expired. Please take the quiz again.');
        }

        $courseData = collect(json_decode(file_get_contents(storage_path('app/assessment/course_suggestions.json')), true));
        $courses = $courseData->whereIn('id', $courseIds)->values();

        $latestAttempt = DB::table('attempts')->latest()->first();
        $attemptAnswers = DB::table('attempt_answers')->where('attempt_id', $latestAttempt->id)->get();

        $questionData = collect(json_decode(file_get_contents(storage_path('app/assessment/questions_enhanced.json')), true));
        $metaData = json_decode(file_get_contents(storage_path('app/assessment/competency_meta.json')), true);

        $competencyScores = [];
        foreach ($attemptAnswers as $answer) {
            $q = $questionData->firstWhere('id', (int)$answer->question_id);
            if (!$q || !isset($q['competencies'][$answer->option_no - 1])) continue;

            foreach ($q['competencies'][$answer->option_no - 1] as $code => $score) {
                $competencyScores[$code] = ($competencyScores[$code] ?? 0) + $score;
            }
        }

        $competencyPercentages = [];
        foreach ($competencyScores as $code => $earned) {
            $max = collect($questionData)->reduce(function ($carry, $q) use ($code) {
                foreach ($q['competencies'] ?? [] as $set) {
                    if (isset($set[$code])) {
                        $carry += 4;
                        break;
                    }
                }
                return $carry;
            }, 0);
            $competencyPercentages[] = [
                'code' => $code,
                'title' => $metaData['competency_titles'][$code] ?? $code,
                'score' => round(($earned / $max) * 100)
            ];
        }

        // Archetype logic (optional)
        $archetype = 'Undefined';
        $archetypeDesc = '';
        foreach ($metaData['archetypes'] ?? [] as $type) {
            $match = true;
            foreach ($type['trigger_logic']['high'] ?? [] as $c) {
                $s = collect($competencyPercentages)->firstWhere('code', $c)['score'] ?? 0;
                if ($s < 75) $match = false;
            }
            foreach ($type['trigger_logic']['low'] ?? [] as $c) {
                $s = collect($competencyPercentages)->firstWhere('code', $c)['score'] ?? 100;
                if ($s > 60) $match = false;
            }
            if ($match) {
                $archetype = $type['label'];
                $archetypeDesc = $type['narrative'];
                break;
            }
        }

        $teacherProfile = [
            'name' => 'Ms. Amina Rahman',
            'grade_band' => 'Middle School',
            'assessment_date' => now()->format('F d, Y'),
            'teaching_archetype' => $archetype,
            'archetype_description' => $archetypeDesc
        ];

        $strengths = collect($competencyPercentages)->sortByDesc('score')->take(3)->map(function ($item) use ($metaData) {
            return [
                'competency' => $item['code'],
                'title' => $item['title'],
                'summary' => $metaData['strength_feedback'][$item['code']] ?? ''
            ];
        });

        $growths = collect($competencyPercentages)->sortBy('score')->take(3)->map(function ($item) use ($metaData) {
            return [
                'competency' => $item['code'],
                'title' => $item['title'],
                'summary' => $metaData['growth_feedback'][$item['code']] ?? '',
                'recommended_courses' => $metaData['growth_courses'][$item['code']] ?? []
            ];
        });

        $prompts = $growths->pluck('competency')->flatMap(fn($c) => $metaData['reflective_prompts'][$c] ?? [])->unique()->take(2);

        $learning_pathway = $growths->flatMap(function ($g) {
            return array_map(fn($course) => [
                'course' => $course,
                'format' => 'Self-paced',
                'duration' => '2 weeks',
                'justification' => "Supports {$g['competency']}: {$g['title']}"
            ], $g['recommended_courses']);
        })->take(5);

        // If radar chart exists, generate it externally and save it to public_path('charts/competency_radar_chart.png')
        // You can use Chart.js to save to canvas and post it via AJAX to server, saving it with file_put_contents()

        $pdf = Pdf::loadView('assessment.report-pdf', compact(
            'teacherProfile',
            'competencyPercentages',
            'strengths',
            'growths',
            'prompts',
            'learning_pathway',
            'courses'
        ));

        return $pdf->download('teacher-diagnostic-report.pdf');
    }

    // remove  

    public function uploadChart(Request $request)
    {
        $image = $request->input('image');

        if (!$image || !str_starts_with($image, 'data:image/png;base64,')) {
            return redirect()->back()->with('error', 'Invalid image data.');
        }

        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageData = base64_decode($image);

        $filePath = public_path('charts/competency_radar_chart.png');

        file_put_contents($filePath, $imageData);

        return redirect()->back()->with('success', 'Chart uploaded.');
    }
}
