@extends('base.base')

@section('content')
<div
    class="relative flex flex-col h-full w-full items-center justify-between gap-5 bg-gray-900 text-white overflow-hidden">
    <div class="absolute left-0 top-0 h-full w-full">
        <img src="{{asset('math.jpg')}}" class="h-full w-full object-cover opacity-20 blur-sm" />
    </div>

    <div id="matchmaking" class="relative z-10 flex flex-col h-full w-full items-center justify-center gap-20">
        <svg class="animate-spin -ml-1 mr-3 h-20 w-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
        <h1 id="status" class="animate-bounce font-bold text-center text-3xl">Looking for a match...</h1>
    </div>

    <div id="game" class="relative z-10 flex flex-col h-full w-full items-center justify-between">
        <!-- Header Section -->
        <div class="flex bg-gray-800 w-full items-center justify-center">
            <div
                class="sticky top-0 flex items-center justify-around text-white md:w-1/2 w-full p-4 rounded-md shadow-lg z-20">
                <div class="flex flex-col items-center">
                    <p id="first-player-name" class="text-center font-semibold text-lg">Player 1</p>
                    <p id="first-player-score" class="text-center text-2xl font-bold mt-2">0</p>
                </div>
                <div class="flex flex-col items-center">
                    <p class="text-center text-xl font-bold">vs</p>
                    <p class="text-center text-lg font-semibold text-gray-400">Score</p>
                </div>
                <div class="flex flex-col items-center">
                    <p id="second-player-name" class="text-center font-semibold text-lg">Player 2</p>
                    <p id="second-player-score" class="text-center text-2xl font-bold mt-2">0</p>
                </div>
            </div>
        </div>

        <!-- Timer -->
        <div class="flex flex-col items-center mt-10">
            <p id="timer" class="text-center text-5xl font-bold mt-2"></p>
        </div>

        <!-- Question Section -->
        <div class="flex-grow flex flex-col items-center justify-top w-full p-6 rounded-lg shadow-lg mt-10">
            <!-- Question Image -->
            <img id="question-image" src="{{asset('question_images/perpendicular_triangle.png')}}" alt="Question Image"
                class="mx-auto my-4 rounded-lg shadow-lg">

            <h2 class="font-bold text-center text-3xl text-white" id="question-text">x + 4 = 9</h2>
            <p id="math-question" class="text-center text-xl text-gray-400 mt-4">What is the value of x?</p>

            <!-- Answer Input -->
            <input type="number" id="answer"
                class="block mx-auto mt-6 md:w-1/3 w-full p-3 rounded-lg border border-gray-600 shadow-md bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter your answer">

            <!-- Submit Button -->
            <button id="submit-answer"
                class="block mx-auto mt-6 md:w-1/3 w-full bg-blue-900 text-white py-3 px-6 rounded-lg shadow-lg transition duration-200 ease-in-out"
                disabled>
                A N S W E R
            </button>
        </div>
    </div>

    <div id="finish" class="relative z-10 flex flex-col h-full w-full items-center justify-center">
        <div id="final-score-box"
            class="flex flex-col items-center justify-top h-200 bg-gray-700 text-white p-6 rounded-lg shadow-lg w-100 mx-auto mt-10">

            <!-- Winner Announcement -->
            <p id="winner" class="text-center text-5xl font-bold mt-4 text-blue-400">Player 1 wins!</p>

            <!-- Player Scores Section -->
            <div class="flex flex-grow items-center justify-center gap-10 text-white w-full mt-8">
                <div class="flex flex-col items-center">
                    <p id="final-first-player-name" class="text-center font-semibold text-xl">Player 1</p>
                    <p id="final-first-player-score" class="text-center text-3xl font-bold mt-4">5</p>
                </div>
                <div class="flex flex-col items-center">
                    <p class="text-center text-xl font-bold">vs</p>
                    <p class="text-center text-lg font-semibold text-gray-400 mt-4">Score</p>
                </div>
                <div class="flex flex-col items-center">
                    <p id="final-second-player-name" class="text-center font-semibold text-xl">Player 2</p>
                    <p id="final-second-player-score" class="text-center text-3xl font-bold mt-4">3</p>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="flex justify-center gap-6 mt-8">
                <!-- New Game Button -->
                <button id="new-game" onclick="window.location.reload()"
                    class="bg-green-600 hover:bg-green-500 text-white py-3 px-6 font-bold rounded-lg shadow-md transition duration-200 ease-in-out hover:shadow-lg transform hover:scale-105">
                    New Game
                </button>

                <!-- Back Button -->
                <button id="back" onclick="window.open('{{url('/')}}', '_self')"
                    class="bg-red-600 hover:bg-red-500 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-200 ease-in-out hover:shadow-lg transform hover:scale-105">
                    Back
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="module">
    const userId = {{ $user->id }};
    const userName = "{{ $user->name }}";
    let gameId = null;
    let sessionId = null;
    let sessionQuestionId = null;
    let firstOrSecond = null;

    let timeLeft = 60;
    const timerElement = document.getElementById("timer");

    function connect() {
        axios.post(`/game/connect/${userId}`)
            .then(response => {
                if (response.data.id) {
                    gameId = response.data.id;
                    $('#status').text("Match found! Waiting to start...");
                    startGame();
                } else {
                    $('#status').text("Looking for a match...");
                    setTimeout(connect, 1000);
                }
            })
            .catch(error => {
                console.error('Error during matchmaking:', error);
                setTimeout(connect, 1000);
            });
    }

    function startGame() {
        axios.post(`/game/${gameId}/start/${userId}`)
            .then(response => {
                if (response.data.status === 'started') {
                    $('#status').text("Game Started!");
                    $('#matchmaking').fadeOut();
                    $('#game').fadeIn();
                    sessionId = response.data.session.id;
                    firstOrSecond = response.data.turn;

                    const finishedTime = new Date(response.data.session.finished_at);
                    const now = new Date();
                    console.log(response.data.session.finished_at, now, finishedTime - now);
                    timeLeft = Math.floor((finishedTime - now) / 1000);

                    fetchQuestion();

                    const countdown = setInterval(() => {
                        if (timeLeft <= 0) {
                            clearInterval(countdown);
                            timerElement.innerText = "0";
                        } else {
                            timerElement.innerText = timeLeft;
                        }
                        timeLeft -= 1;
                    }, 1000);

                    setTimeout(updateGameStatus, 2000);
                } else if (response.data.status === 'aborted') {
                    $('#status').text("Match aborted. Looking for a new match...");
                    gameId = null;
                    setTimeout(connect, 1000);
                } else {
                    setTimeout(startGame, 1000);
                }
            })
            .catch(error => {
                console.error('Error during game start:', error);
                setTimeout(startGame, 1000);
            });
    }

    function fetchQuestion() {
        axios.get(`/session/${sessionId}/question`)
            .then(response => {
                $('#question-text').text(response.data.text_question);
                $('#math-question').text(response.data.math_question);
                if (response.data.image) {
                    $('#question-image').attr('src', response.data.image).show();
                } else {
                    $('#question-image').hide();
                }
                $('#submit-answer').prop('disabled', false);
                $('#submit-answer').removeClass();
                $('#submit-answer').addClass('block mx-auto mt-6 md:w-1/3 w-full bg-blue-900 hover:bg-blue-500 text-white py-3 px-6 rounded-lg shadow-lg transition duration-200 ease-in-out hover:shadow-xl')
                sessionQuestionId = response.data.session_question.id;
            })
            .catch(error => {
                console.error('Error fetching question:', error);
                setTimeout(fetchQuestion, 1000);
            });
    }

    function submitAnswer() {
        const answer = parseFloat($('#answer').val());
        $('#submit-answer').prop('disabled', true);
        $('#submit-answer').removeClass();
        $('#submit-answer').addClass('block mx-auto mt-6 md:w-1/3 w-full bg-blue-900 text-white py-3 px-6 rounded-lg shadow-lg transition duration-200 ease-in-out')
        if (!isNaN(answer)) {
            axios.post(`/session-questions/${sessionQuestionId}/answer`, { answer })
                .then((response) => {
                    $('#answer').val('');
                    if (response.data.status === 'wrong') {
                        let componentName = `#${firstOrSecond}-player-score`;
                        var val = parseInt($(componentName).text());
                        $(componentName).text(val + 1);
                    } else if (response.data.status === 'correct') {
                        let componentName = `#${firstOrSecond}-player-score`;
                        var val = parseInt($(componentName).text());
                        $(componentName).text(val - 1);
                    }
                    fetchQuestion();
                })
                .catch(error => {
                    console.error('Error submitting answer:', error);
                });
        }
    }

    function updateGameStatus() {
        axios.get(`/game/${gameId}/session/${sessionId}/status`)
            .then(response => {
                // Update the scores in the game section
                $('#first-player-score').text(response.data.first_player_score);
                $('#second-player-score').text(response.data.second_player_score);
                $('#first-player-name').text(response.data.first_player_name);
                $('#second-player-name').text(response.data.second_player_name);

                if (response.data.status === 'Finished') {
                    $('#status').text('Game Over');
                    $('#game').fadeOut();
                    $('#finish').fadeIn();

                    // Update the scores and winner in the finish section
                    $('#final-first-player-name').text(response.data.first_player_name);
                    $('#final-second-player-name').text(response.data.second_player_name);
                    $('#final-first-player-score').text(response.data.first_player_score);
                    $('#final-second-player-score').text(response.data.second_player_score);
                    $('#winner').text(response.data.winner ? `${response.data.winner.name} wins!` : "It's a tie!");
                } else {
                    $('#status').text('Fight');
                    setTimeout(updateGameStatus, 2000);
                }
            })
            .catch(error => {
                console.error('Error fetching game status:', error);
            });
    }

    $(document).ready(function () {
        $('#game').hide();
        $('#finish').hide();
        $('#submit-answer').on('click', submitAnswer);
        connect();
    });
</script>
@endsection