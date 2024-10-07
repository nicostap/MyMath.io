@extends('base.base')

@section('content')

@endsection

@section('scripts')
<script type="module">
    const userId = {{ $user->id }};
    let gameId = null;

    function connect() {
        axios.post('/game/connect', { user_id: userId })
            .then(response => {
                if (response.data) {
                    gameId = response.data.id;
                    document.getElementById('status').innerText = "Match found! Waiting to start...";
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
        axios.post(`/game/${gameId}/start`, { user_id: userId })
            .then(response => {
                if (response.data.status === 'started') {
                    document.getElementById('status').innerText = "Game Started!";
                    // Here, you can redirect the player to the game page or start the game logic
                } else if (response.data.status === 'aborted') {
                    document.getElementById('status').innerText = "Match aborted. Looking for a new match...";
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
    connect();
</script>
@endsection