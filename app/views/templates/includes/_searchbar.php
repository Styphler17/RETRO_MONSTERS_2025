    <form action="?monsters=search" method="GET" class="bg-gray-700 rounded-lg shadow-lg p-4 mb-6 relative">
        <h2 class="font-bold text-lg mb-4">Recherche</h2>
        <div class="relative">
            <input
                type="text"
                id="search-input"
                name="search"
                value="<?php echo $_GET['search'] ?? ''; ?>"
                placeholder="Chercher un monstre..."
                class="w-full p-2 mb-4 bg-gray-800 rounded pr-10" />
            <button type="button" id="clear-search" class="absolute right-4 top-3 text-gray-400 hover:text-red-500 focus:outline-none" style="z-index:10; display: <?php echo empty($_GET['search']) ? 'none' : 'block'; ?>;">
                <i class="fas fa-times-circle"></i>
            </button>
        </div>
        <input type="hidden" name="monsters" value="search" />
        <button
            type="submit"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full">
            Chercher
        </button>
        <script>
            const clearBtn = document.getElementById('clear-search');
            const searchInput = document.getElementById('search-input');
            function toggleClearBtn() {
                if (searchInput.value.length > 0) {
                    clearBtn.style.display = 'block';
                } else {
                    clearBtn.style.display = 'none';
                }
            }
            if (clearBtn && searchInput) {
                clearBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    searchInput.focus();
                    toggleClearBtn();
                });
                searchInput.addEventListener('input', toggleClearBtn);
                // Initial state
                toggleClearBtn();
            }
        </script>
    </form>