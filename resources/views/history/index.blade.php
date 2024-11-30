@extends('base.base')

@section('content')
<div class="container mx-auto px-4 py-8 overflow-hidden">
    <div class="sm:grid sm:grid-cols-2 gap-4 overflow-hidden" style="height: calc(100vh - 128px)">
        <div class="flex flex-col align-middle justify-center">
            <h1 class="text-4xl sm:text-6xl text-center font-bold mb-6 sm:mb-0 text-tertiary">Game History</h1>
        </div>

        <!-- Scrollable games container -->
        <div id="games-container" class="h-full overflow-y-auto border border-gray-300 rounded-lg p-4 bg-gray-50">
            <!-- Games will be dynamically loaded here -->
        </div>
    </div>
    <div id="loading" class="text-center mt-4 hidden text-tertiary">Loading...</div>
</div>
@endsection

@section('scripts')
<script type="module">
    let pageIndex = 0;
    const pageSize = 10;
    const userId = {{$user->id}};
    let loading = false;

    function fetchGames() {
        if (loading) return;
        loading = true;
        $('#loading').removeClass('hidden');

        axios.get('/history_game', {
            params: {
                userId,
                page_size: pageSize,
                page_index: pageIndex
            }
        }).then(response => {
            const games = response.data.data;
            if (games.length > 0) {
                games.forEach(game => {
                    console.log(game);
                    const gameHtml = `
                        <div class="bg-white shadow-lg rounded-lg mb-6 border border-gray-200 overflow-hidden">
                            <div class="toggle-dropdown cursor-pointer flex justify-between gap-5 items-center p-6 bg-gray-100 hover:bg-gray-200 transition">
                                <div>
                                    <div class="text-lg font-semibold text-gray-500">${game.vs}</div>
                                    <div class="text-sm text-gray-500">${new Date(game.started_at).toLocaleDateString()}</div>
                                </div>    
                                <div class="text-center">
                                    <div class="font-medium text-gray-500">${game.first_player_score} vs ${game.second_player_score}</div>
                                    <span class="px-2 py-1 rounded-full text-white ${game.first_player_score > game.second_player_score ? 'bg-green-500' : game.first_player_score < game.second_player_score ? 'bg-red-500' : 'bg-gray-500'}">
                                        ${game.first_player_score > game.second_player_score ? 'WIN' : game.first_player_score < game.second_player_score ? 'LOSE' : 'DRAW'}
                                    </span>
                                </div>
                            </div>
                            <div class="dropdown-content hidden p-6 bg-gray-50 transition-all duration-300 ease-in-out transform -translate-y-2 opacity-0">
                                <ul class="list-disc list-inside space-y-4 text-gray-600">
                                    ${game.questions.map(question => `
                                        <li style="list-style-type: none" class="bg-gray-100 p-2 rounded">
                                            <p><strong>Question :</strong> ${question.question}</p>
                                            <p><strong>Math Question :</strong> ${question.math_question}</p>
                                            <p><strong>Solution :</strong> ${question.solution}</p>
                                            <p><strong>Correct Answer :</strong> ${question.true_answer}</p>
                                        </li>
                                    `).join('')}
                                </ul>
                            </div>
                        </div>
                    `;
                    $('#games-container').append(gameHtml);
                });
                pageIndex++;
            } else {
                $('#loading').text('No more games to load').removeClass('hidden');
            }
            loading = false;
            $('#loading').addClass('hidden');
        }).catch(error => {
            console.error('Error fetching games:', error);
            $('#loading').addClass('hidden');
            loading = false;
        });
    }

    // Fetch games initially
    fetchGames();

    // Infinite scrolling inside #games-container
    $('#games-container').on('scroll', function () {
        const container = $(this);
        if (container.scrollTop() + container.innerHeight() >= container[0].scrollHeight - 50) {
            fetchGames();
        }
    });

    // Toggle dropdown with animation
    $(document).on('click', '.toggle-dropdown', function () {
        const dropdownContent = $(this).siblings('.dropdown-content');
        dropdownContent.toggleClass('hidden');
        if (!dropdownContent.hasClass('hidden')) {
            dropdownContent.removeClass('opacity-0 -translate-y-2').addClass('opacity-100 translate-y-0');
        } else {
            dropdownContent.removeClass('opacity-100 translate-y-0').addClass('opacity-0 -translate-y-2');
        }
    });
</script>
@endsection