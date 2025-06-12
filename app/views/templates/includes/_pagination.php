<?php if (isset($totalPages) && $totalPages > 1): ?>
    <?php $currentPage = isset($page) ? $page : 1; ?>
    <nav class="flex items-center justify-center space-x-2 mt-8">
        <!-- Previous -->
        <?php if ($currentPage > 1): ?>
            <a href="?page=<?php echo $currentPage - 1; ?>" class="px-4 py-2 text-sm bg-gray-700 text-gray-300 rounded-md hover:bg-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
        <?php endif; ?>

        <!-- Pages -->
        <?php
        $range = range(max(1, $currentPage - 1), min($totalPages, $currentPage + 1));
        if ($range[0] > 1) echo '<a href="?page=1" class="px-4 py-2 text-sm bg-gray-700 text-gray-300 rounded-md hover:bg-gray-600">1</a>';
        if ($range[0] > 2) echo '<span class="px-2 text-gray-400">...</span>';
        
        foreach ($range as $i): ?>
            <a href="?page=<?php echo $i; ?>" 
                class="px-4 py-2 text-sm rounded-md <?php echo $i === $currentPage ? 'bg-red-500 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'; ?>">
                <?php echo $i; ?>
            </a>
        <?php endforeach;
        
        if ($range[count($range)-1] < $totalPages - 1) echo '<span class="px-2 text-gray-400">...</span>';
        if ($range[count($range)-1] < $totalPages) echo '<a href="?page='.$totalPages.'" class="px-4 py-2 text-sm bg-gray-700 text-gray-300 rounded-md hover:bg-gray-600">'.$totalPages.'</a>';
        ?>

        <!-- Next -->
        <?php if ($currentPage < $totalPages): ?>
            <a href="?page=<?php echo $currentPage + 1; ?>" class="px-4 py-2 text-sm bg-gray-700 text-gray-300 rounded-md hover:bg-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        <?php endif; ?>
    </nav>
<?php endif; ?>