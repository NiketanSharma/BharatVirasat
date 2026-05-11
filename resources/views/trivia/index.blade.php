@extends('layouts.app')

@section('title', __('ui.trivia_title') . ' — ' . __('ui.app_name'))

@section('styles')
<style>
    .trivia-hero {
        background: linear-gradient(135deg, rgba(109,0,0,0.92), rgba(44,30,22,0.88)),
                    url('https://images.unsplash.com/photo-1564507592333-c60657eea523?w=1600') center/cover no-repeat;
        padding: 5rem 0 6rem;
        text-align: center;
        position: relative;
    }

    .trivia-hero::after {
        content: '';
        position: absolute;
        bottom: -2px; left: 0; right: 0;
        height: 60px;
        background: var(--ivory-warm);
        clip-path: ellipse(55% 100% at 50% 100%);
    }

    .trivia-hero h1 { color: #fff !important; text-shadow: 0 3px 15px rgba(0,0,0,0.3); }
    .trivia-hero p { color: rgba(255,255,255,0.85); font-size: 1.1rem; }

    .quiz-container {
        max-width: 800px;
        margin: -30px auto 0;
        position: relative;
        z-index: 10;
    }

    .quiz-card {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(15px);
        border-radius: 24px;
        padding: 3rem 2.5rem;
        box-shadow: 0 15px 50px rgba(0,0,0,0.08);
        border: 1px solid rgba(255,255,255,0.6);
        display: none;
        animation: quizFadeIn 0.5s ease;
    }

    .quiz-card.active { display: block; }

    @keyframes quizFadeIn {
        from { opacity: 0; transform: translateY(20px) scale(0.98); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .option-btn {
        width: 100%;
        text-align: left;
        padding: 1.1rem 1.5rem;
        margin-bottom: 0.8rem;
        border: 2px solid rgba(197,160,89,0.15);
        background: rgba(255,253,249,0.8);
        border-radius: 14px;
        font-size: 1.02rem;
        font-weight: 500;
        color: var(--dark-brown);
        transition: all 0.3s var(--transition-smooth);
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .option-btn::before {
        content: '';
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 4px;
        background: var(--saffron);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .option-btn:hover:not(:disabled)::before { transform: scaleY(1); }

    .option-btn:hover:not(:disabled) {
        border-color: var(--saffron);
        background: var(--ivory-warm);
        transform: translateX(6px);
        box-shadow: 0 4px 15px rgba(255,123,0,0.1);
    }

    .option-btn.correct {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        border-color: #28a745;
        color: #155724;
    }

    .option-btn.correct::before { background: #28a745; transform: scaleY(1); }

    .option-btn.incorrect {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        border-color: #dc3545;
        color: #721c24;
    }

    .option-btn.incorrect::before { background: #dc3545; transform: scaleY(1); }

    .explanation-box {
        background: linear-gradient(135deg, var(--ivory-warm), var(--cream));
        border-left: 4px solid var(--gold);
        padding: 1.5rem;
        border-radius: 0 14px 14px 0;
        margin-top: 1.5rem;
        display: none;
        animation: quizFadeIn 0.4s ease;
    }

    .quiz-progress {
        height: 8px;
        background: rgba(0,0,0,0.06);
        border-radius: 4px;
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .quiz-progress-bar {
        height: 100%;
        background: linear-gradient(90deg, var(--saffron), var(--gold));
        width: 0%;
        transition: width 0.5s var(--transition-smooth);
        border-radius: 4px;
    }

    /* Start screen */
    .start-icon {
        width: 120px; height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(255,123,0,0.1), rgba(197,160,89,0.1));
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        animation: pulse-glow 2s ease-in-out infinite;
    }

    /* End screen */
    .score-ring {
        width: 180px; height: 180px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(255,123,0,0.08), rgba(197,160,89,0.08));
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border: 4px solid var(--saffron);
        margin-bottom: 1.5rem;
    }

    .question-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px; height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--saffron), var(--saffron-dark));
        color: #fff;
        font-weight: 700;
        font-size: 0.85rem;
        margin-right: 0.75rem;
        flex-shrink: 0;
    }
</style>
@endsection

@section('content')
    <!-- Trivia Hero -->
    <div class="trivia-hero">
        <div class="container">
            <h1 class="section-title mb-2" data-aos="fade-up">
                <i class="bi bi-patch-question me-2" style="color: var(--gold-light);"></i>{{ __('ui.trivia_title') }}
            </h1>
            <p data-aos="fade-up" data-aos-delay="100">{{ __('ui.trivia_subtitle') }}</p>
        </div>
    </div>

<div class="container pb-5">
    <div class="quiz-container">
        
        <!-- Start Screen -->
        <div id="start-screen" class="quiz-card active text-center">
            <div class="start-icon">🏆</div>
            <h3 class="mt-2 mb-3" style="font-family: 'Playfair Display', serif; color: var(--deep-red);">Ready to test your knowledge?</h3>
            <p class="text-muted mb-2" style="font-size: 1.05rem;">You will be asked <strong style="color: var(--saffron);">{{ $questions->count() }}</strong> random questions about Indian Heritage.</p>
            <p class="text-muted mb-4">Let's see how much you know!</p>
            <button id="start-btn" class="btn btn-saffron btn-lg px-5" style="border-radius: 30px;">
                {{ __('ui.start_quiz') }} <i class="bi bi-play-circle ms-2"></i>
            </button>
        </div>

        <!-- Quiz Container -->
        <div id="quiz-box" style="display: none;">
            <div class="d-flex justify-content-between mb-2 align-items-center">
                <span class="fw-bold" style="color: var(--warm-gray);" id="question-counter">{{ __('ui.question') }} 1 {{ __('ui.of') }} {{ $questions->count() }}</span>
                <span class="fw-bold" style="background: linear-gradient(135deg, var(--saffron), var(--gold)); color: #fff; padding: 0.3rem 1rem; border-radius: 20px; font-size: 0.85rem;">
                    {{ __('ui.your_score') }}: <span id="score-display">0</span>
                </span>
            </div>
            <div class="quiz-progress mb-4">
                <div id="progress-bar" class="quiz-progress-bar"></div>
            </div>

            <div id="question-container" class="quiz-card active">
                <div class="d-flex align-items-start mb-4">
                    <span class="question-number" id="q-number">1</span>
                    <h4 id="question-text" style="line-height: 1.6; color: var(--dark-brown); margin: 0;"></h4>
                </div>
                
                <div id="options-container"></div>

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
            <div class="score-ring mx-auto">
                <div class="display-3 fw-bold" style="color: var(--saffron); line-height: 1;" id="final-score">0</div>
                <div class="text-muted" style="font-size: 0.9rem;">out of {{ $questions->count() }}</div>
            </div>
            <h2 class="mb-2" style="font-family: 'Playfair Display', serif; color: var(--deep-red);">{{ __('ui.final_result') }}</h2>
            <p id="final-message" class="fs-5 mb-4 text-muted"></p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <button onclick="location.reload()" class="btn btn-heritage btn-lg px-4" style="border-radius: 30px;">
                    <i class="bi bi-arrow-counterclockwise me-2"></i>{{ __('ui.play_again') }}
                </button>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg px-4" style="border-radius: 30px;">
                    <i class="bi bi-house me-2"></i>Go Home
                </a>
            </div>
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
        const qNumber = document.getElementById('q-number');
        
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
            explanationContainer.style.display = 'none';
            optionsContainer.innerHTML = '';
            
            questionCounter.innerText = `${labels.question} ${currentQuestionIndex + 1} ${labels.of} ${questions.length}`;
            progressBar.style.width = `${((currentQuestionIndex) / questions.length) * 100}%`;
            qNumber.innerText = currentQuestionIndex + 1;

            questionText.innerText = question.question;

            const options = [
                { key: 'a', text: question.option_a },
                { key: 'b', text: question.option_b },
                { key: 'c', text: question.option_c },
                { key: 'd', text: question.option_d }
            ];

            const optionLabels = ['A', 'B', 'C', 'D'];
            options.forEach((opt, i) => {
                const btn = document.createElement('button');
                btn.className = 'option-btn';
                btn.innerHTML = `<strong style="color: var(--saffron); margin-right: 0.75rem;">${optionLabels[i]}.</strong> ${opt.text}`;
                btn.addEventListener('click', () => selectAnswer(opt.key, question.correct_option, question.explanation, btn));
                optionsContainer.appendChild(btn);
            });
        }

        function selectAnswer(selectedKey, correctKey, explanation, selectedBtn) {
            const allBtns = optionsContainer.querySelectorAll('.option-btn');
            allBtns.forEach(btn => btn.disabled = true);

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
                
                const optionKeys = ['a', 'b', 'c', 'd'];
                const correctIndex = optionKeys.indexOf(correctKey);
                allBtns[correctIndex].classList.add('correct');
            }

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
                finalMessage.innerText = "🎉 Perfect! You're a true Indian Heritage Expert!";
            } else if (percentage >= 70) {
                finalMessage.innerText = "🌟 Great job! You know your culture well.";
            } else if (percentage >= 40) {
                finalMessage.innerText = "📚 Good effort! There's always more to learn about our rich heritage.";
            } else {
                finalMessage.innerText = "🌏 Keep exploring! Indian heritage is vast and fascinating.";
            }
        }
    });
</script>
@endsection
