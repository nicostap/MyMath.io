@extends('base.base')

@section('content')
<h1 id="status" class="font-bold text-center">Looking for a match...</h1>
<div id="matchmaking"></div>

<div id="game">
    <h2 class="font-bold text-center" id="question-text"></h2>
    <p id="math-question" class="text-center"></p>
    <img id="question-image" src="" alt="Question Image" class="mx-auto" style="display: none;">

    <div class="grid grid-cols-3 gap-1 md:w-1/3 w-3/4 text-center">
        <p id="first-player-name">-</p>
        <p>vs</p>
        <p id="second-player-name">-</p>
        <p id="first-player-score">0</p>
        <p></p>
        <p id="second-player-score">0</p>
    </div>

    <input type="number" id="answer" class="block mx-auto mt-2" placeholder="Enter your answer">
    <button id="submit-answer" class="block mx-auto mt-4 bg-blue-500 text-white py-2 px-4">Submit Answer</button>
</div>

<div id="finish">
    <div class="text-center">
        <p id="final-first-player-score" class="text-xl">First Player Score: 0</p>
        <p id="final-second-player-score" class="text-xl">Second Player Score: 0</p>
        <p id="winner" class="text-center"></p>
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
                    fetchQuestion();
                    setInterval(updateGameStatus, 2000);
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
                sessionQuestionId = response.data.session_question.id;
            })
            .catch(error => {
                console.error('Error fetching question:', error);
                setTimeout(fetchQuestion, 1000);
            });
    }

    function submitAnswer() {
        const answer = parseFloat($('#answer').val());
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
                    $('#final-first-player-score').text(`${response.data.first_player_name}'s score: ${response.data.first_player_score}`);
                    $('#final-second-player-score').text(`${response.data.second_player_name}'s score: ${response.data.second_player_score}`);
                    $('#winner').text(response.data.winner ? `Winner: ${response.data.winner.name}` : "It's a tie!");
                } else {
                    $('#status').text('Fight');
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