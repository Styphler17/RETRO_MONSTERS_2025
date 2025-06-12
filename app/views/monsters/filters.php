<?php
// Get current filter values
$currentFilters = [
    'type' => $_GET['type'] ?? '',
    'rarety' => $_GET['rarety'] ?? '',
    'min_pv' => $_GET['min_pv'] ?? '',
    'max_pv' => $_GET['max_pv'] ?? '',
    'min_attack' => $_GET['min_attack'] ?? '',
    'max_attack' => $_GET['max_attack'] ?? ''
];
?>

<div class="container mx-auto px-4 py-8">
    <!-- Results -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (empty($results)): ?>
            <div class="col-span-full text-center py-8">
                <p class="text-gray-600">Aucun monstre trouvé pour vos critères de filtrage.</p>
            </div>
        <?php else: ?>
            <?php foreach ($results as $monster): ?>
                <article class="relative bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 monster-card"
                    data-monster-type="<?php echo $monster['type_name']; ?>">
                    <img src="/RETRO_MONSTERS_2025/public/images/<?php echo $monster['image_url']; ?>"
                        alt="<?php echo $monster['name']; ?>"
                        class="w-full h-52 object-cover rounded-t-lg" />
                    <div class="p-4">
                        <h3 class="text-xl font-bold">
                            <a href="?monsters=<?php echo $monster['id']; ?>" 
                               class="text-red-500 hover:text-red-400">
                                <?php echo $monster['name']; ?>
                            </a>
                        </h3>
                        <h4 class="mb-2">
                            <a href="#" class="text-red-400 hover:underline">Alex Smith</a>
                        </h4>
                        <p class="text-gray-300 text-sm mb-2">
                            <?php echo substr($monster['description'], 0, 150) . '...'; ?>
                        </p>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-yellow-400">★★★★☆</span>
                            <span class="text-sm text-gray-300">(4.0/5.0)</span>
                            <span class="text-sm text-gray-300">Type: <?php echo $monster['type_name']; ?></span>
                        </div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-sm text-gray-300">PV: <?php echo $monster['pv']; ?></span>
                            <span class="text-sm text-gray-300">Attaque: <?php echo $monster['attack']; ?></span>
                        </div>
                        <div class="flex justify-center text-sm mb-2">
                            <a href="?monsters=<?php echo $monster['id']; ?>" class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Plus de détails</a>
                        </div>
                    </div>
                    <div class="absolute top-4 right-4">
                        <button class="text-white bg-gray-400 hover:bg-red-700 rounded-full p-2 transition-colors duration-300"
                            style=" width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                            <i class="fa fa-bookmark"></i>
                        </button>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div> 