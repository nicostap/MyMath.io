@extends('base.base')

@section('content')
<h1 id="status" class="font-bold text-center">Looking for a match...</h1>
<div id="matchmaking">
</div>
<div id="game">

</div>
<div id="finish">

</div>
@endsection

@section('scripts')
<script type="module">
    const userId = {{ $user->id }};
    let gameId = null;

    function connect() {
        axios.post(`/game/connect/{{$user->id}}`)
            .then(response => {
                if (response.data) {
                    gameId = response.data.id;
                    $('#status').text("Match found! Waiting to start...");
                    $('#matchmaking').fadeToggle();
                    $('#game').toggle();
                    startGame();
                } else {
                    setTimeout(connect, 1000);
                }
            })
            .catch(error => {
                console.error('Error during matchmaking:', error);
                setTimeout(connect, 1000);
            });
    }

    function startGame() {
        axios.post(`/game/${gameId}/start/{{$user->id}}`)
            .then(response => {
                if (response.data.status === 'started') {
                    $('#status').text("Game Started!");
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

    $(document).ready(function () {
        $('#game').hide();
        $('#finish').hide();
        connect();
    });
</script>
@endsection