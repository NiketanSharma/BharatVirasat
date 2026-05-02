@extends('layouts.app')

@section('title', __('ui.trivia_title') . ' — ' . __('ui.app_name'))

@section('styles')
<style>
    .quiz-container {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
    }
    .quiz-card {
        background: #fff;
        border-radius: 20px;
        padding: 3rem 2rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        border-top: 5px solid var(--saffron);
        display: none; /* hidden by default, shown via JS */
        animation: fadeIn 0.5s ease;
    }
    .quiz-card.active {
        display: block;
    }
    .option-btn {
        width: 100%;
        text-align: left;
        padding: 1rem 1.5rem;
        margin-bottom: 1rem;
        border: 2px solid var(--ivory-warm);
        background: #fff;
        border-radius: 12px;
        font-size: 1.05rem;
        font-weight: 500;
        color: var(--dark-brown);
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .option-btn:hover:not(:disabled) {
        border-color: var(--saffron);
        background: var(--ivory-warm);
        transform: translateX(5px);
    }
    .option-btn.correct {
        background: #d4edda;
        border-color: #28a745;
        color: #155724;
    }
    .option-btn.incorrect {
        background: #f8d7da;
        border-color: #dc3545;
        color: #721c24;
    }
    .explanation-box {
        background: var(--ivory-warm);
        border-left: 4px solid var(--gold);
        padding: 1.5rem;
        border-radius: 0 12px 12px 0;
        margin-top: 1.5rem;
        display: none;
    }
    .quiz-progress {
        height: 8px;
        background: #eee;
        border-radius: 4px;
        margin-bottom: 2rem;
        overflow: hidden;
    }
    .quiz-progress-bar {
        height: 100%;
        background: linear-gradient(90deg, var(--saffron), var(--gold));
        width: 0%;
        transition: width 0.3s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="section-title">
            <i class="bi bi-patch-question me-2" style="color: var(--saffron);"></i>{{ __('ui.trivia_title') }}
        </h1>
        <p class="section-subtitle">{{ __('ui.trivia_subtitle') }}</p>
    </div>

    <div class="quiz-container">
        
        <!-- Start Screen -->
        <div id="start-screen" class="quiz-card active text-center">
            <i class="bi bi-trophy" style="font-size: 5rem; color: var(--gold);"></i>
            <h3 class="mt-4 mb-3" style="font-family: 'Playfair Display', serif; color: var(--deep-red);">Ready to test your knowledge?</h3>
            <p class="text-muted mb-4">You will be asked {{ $questions->count() }} random questions about Indian Heritage. Let's see how much you know!</p>
            <button id="start-btn" class="btn btn-saffron btn-lg px-5" style="border-radius: 30px;">
                {{ __('ui.start_quiz') }} <i class="bi bi-play-circle ms-1"></i>
            </button>
        </div>

        <!-- Quiz Container -->
        <div id="quiz-box" style="display: none;">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted fw-bold" id="question-counter">{{ __('ui.question') }} 1 {{ __('ui.of') }} {{ $questions->count() }}</span>
                <span class="text-muted fw-bold">{{ __('ui.your_score') }}: <span id="score-display">0</span></span>
            </div>
            <div class="quiz-progress mb-4">
                <div id="progress-bar" class="quiz-progress-bar"></div>
            </div>

            <div id="question-container" class="quiz-card active">
                <h4 id="question-text" class="mb-4" style="line-height: 1.5; color: var(--dark-brown);"></h4>
                
                <div id="options-container">
                    <!-- Options injected here -->
                </div>

                <div id="explanation-container" class="explanation-box">
                    <div class="d-flex align-items-center mb-2">
                        <i id="result-icon" class="bi fs-4 me-2"></i>
                        <h5 id="result-text" class="mb-0 fw-bold"></h5>
                    </div>
                    <p id="explanation-text" class="mb-0 text-muted"></p>
                    <div class="text-end mt-3">
                        <button id="next-btn" class="btn btn-gold px-4" style="border-radius: 20px;">
                            {{ __('ui.next_question') }} <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Screen -->
        <div id="end-screen" class="quiz-card text-center">
            <h2 class="mb-4" style="font-family: 'Playfair Display', serif; color: var(--deep-red);">{{ __('ui.final_result') }}</h2>
            <div class="display-1 fw-bold mb-3" style="color: var(--saffron);">
                <span id="final-score">0</span><span class="fs-3 text-muted">/{{ $questions->count() }}</span>
            </div>
            <p id="final-message" class="fs-5 mb-4 text-muted"></p>
            <button onclick="location.reload()" class="btn btn-heritage btn-lg px-5" style="border-radius: 30px;">
                <i class="bi bi-arrow-counterclockwise me-2"></i>{{ __('ui.play_again') }}
            </button>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const questions = @json($questions);
        
        let currentQuestionIndex = 0;
        let score = 0;

        const startScreen = document.getElementById('start-screen');
        const quizBox = document.getElementById('quiz-box');
        const endScreen = document.getElementById('end-screen');
        
        const questionText = document.getElementById('question-text');
        const optionsContainer = document.getElementById('options-container');
        const explanationContainer = document.getElementById('explanation-container');
        const explanationText = document.getElementById('explanation-text');
        const resultText = document.getElementById('result-text');
        const resultIcon = document.getElementById('result-icon');
        
        const questionCounter = document.getElementById('question-counter');
        const scoreDisplay = document.getElementById('score-display');
        const progressBar = document.getElementById('progress-bar');
        
        const startBtn = document.getElementById('start-btn');
        const nextBtn = document.getElementById('next-btn');

        const labels = {
            correct: "{{ __('ui.correct') }}",
            incorrect: "{{ __('ui.incorrect') }}",
            question: "{{ __('ui.question') }}",
            of: "{{ __('ui.of') }}"
        };

        startBtn.addEventListener('click', startQuiz);
        nextBtn.addEventListener('click', () => {
            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion(questions[currentQuestionIndex]);
            } else {
                showResults();
            }
        });

        function startQuiz() {
            if(questions.length === 0) {
                alert('No trivia questions available right now!');
                return;
            }
            startScreen.classList.remove('active');
            quizBox.style.display = 'block';
            showQuestion(questions[currentQuestionIndex]);
        }

        function showQuestion(question) {
            // Reset state
            explanationContainer.style.display = 'none';
            optionsContainer.innerHTML = '';
            
            // Update Progress
            questionCounter.innerText = `${labels.question} ${currentQuestionIndex + 1} ${labels.of} ${questions.length}`;
            progressBar.style.width = `${((currentQuestionIndex) / questions.length) * 100}%`;

            // Set text
            questionText.innerText = question.question;

            // Create options
            const options = [
                { key: 'a', text: question.option_a },
                { key: 'b', text: question.option_b },
                { key: 'c', text: question.option_c },
                { key: 'd', text: question.option_d }
            ];

            options.forEach(opt => {
                const btn = document.createElement('button');
                btn.className = 'option-btn';
                btn.innerText = opt.text;
                btn.addEventListener('click', () => selectAnswer(opt.key, question.correct_option, question.explanation, btn));
                optionsContainer.appendChild(btn);
            });
        }

        function selectAnswer(selectedKey, correctKey, explanation, selectedBtn) {
            const allBtns = optionsContainer.querySelectorAll('.option-btn');
            
            // Disable all buttons
            allBtns.forEach(btn => btn.disabled = true);

            // Check correct
            const isCorrect = selectedKey === correctKey;
            
            if (isCorrect) {
                selectedBtn.classList.add('correct');
                score++;
                scoreDisplay.innerText = score;
                resultText.innerText = labels.correct;
                resultText.className = 'mb-0 fw-bold text-success';
                resultIcon.className = 'bi bi-check-circle-fill fs-4 me-2 text-success';
            } else {
                selectedBtn.classList.add('incorrect');
                resultText.innerText = labels.incorrect;
                resultText.className = 'mb-0 fw-bold text-danger';
                resultIcon.className = 'bi bi-x-circle-fill fs-4 me-2 text-danger';
                
                // Highlight correct answer
                const optionKeys = ['a', 'b', 'c', 'd'];
                const correctIndex = optionKeys.indexOf(correctKey);
                allBtns[correctIndex].classList.add('correct');
            }

            // Show explanation
            explanationText.innerText = explanation || '';
            explanationContainer.style.display = 'block';
        }

        function showResults() {
            quizBox.style.display = 'none';
            endScreen.classList.add('active');
            
            document.getElementById('final-score').innerText = score;
            const percentage = (score / questions.length) * 100;
            const finalMessage = document.getElementById('final-message');
            
            if (percentage === 100) {
                finalMessage.innerText = "Perfect! You're a true Indian Heritage Expert!";
            } else if (percentage >= 70) {
                finalMessage.innerText = "Great job! You know your culture well.";
            } else if (percentage >= 40) {
                finalMessage.innerText = "Good effort! There's always more to learn about our rich heritage.";
            } else {
                finalMessage.innerText = "Keep exploring! Indian heritage is vast and fascinating.";
            }
        }
    });
</script>
@endsection
