<!-- Section Monstre Aléatoire -->
<?php if (isset($randomMonster) && $randomMonster): ?>
    <section class="mb-20">
        <div class="bg-gray-700 rounded-lg shadow-lg monster-card"
            data-monster-type="<?php echo $randomMonster['type_name']; ?>">
            <div class="md:flex">
                <!-- Monster Image -->
                <div class="w-full md:w-1/2 relative">
                    <img class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                        src="/RETRO_MONSTERS_2025/public/images/<?php echo $randomMonster['image_url']; ?>"
                        alt="<?php echo $randomMonster['name']; ?>" />
                    <!-- Monster Bookmark Button -->
                    <div class="absolute top-4 right-4">
                        <button class="text-white bg-gray-400 hover:bg-red-700 rounded-full p-2 transition-colors duration-300"
                            style=" width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                            <i class="fa fa-bookmark"></i>
                        </button>
                    </div>
                </div>
                <!-- Monster Details -->
                <div class="p-6 md:w-1/2">
                    <!-- Monster Name -->
                    <h2 class="text-3xl font-bold mb-2 creepster"><?php echo $randomMonster['name']; ?></h2>
                    <!-- Monster Description -->
                    <p class="text-gray-300 text-sm mb-4">
                        <?php echo $randomMonster['description']; ?>
                    </p>
                    <!-- Monster Author -->
                    <div class="mb-4">
                        <strong class="text-white">Créateur:</strong>
                        <span class="text-red-400">
                            <!-- <?php echo $randomMonster['author']; ?> -->
                            Alex Smith
                        </span>
                    </div>
                    <!-- Monster Stats -->
                    <div class="mb-4">
                        <!-- Monster Type -->
                        <div>
                            <strong class="text-white">Type:</strong>
                            <span class="text-gray-300">
                                <?php echo $randomMonster['type_name']; ?>
                            </span>
                        </div>
                        <!-- Monster PV -->
                        <div>
                            <strong class="text-white">PV:</strong>
                            <span class="text-gray-300">
                                <?php echo $randomMonster['pv']; ?>
                            </span>
                        </div>
                        <!-- Monster Attack -->
                        <div>
                            <strong class="text-white">Attaque:</strong>
                            <span class="text-gray-300">
                                <?php echo $randomMonster['attack']; ?>
                            </span>
                        </div>
                        <!-- Monster Defense -->
                        <div>
                            <strong class="text-white">Défense:</strong>
                            <span class="text-gray-300">
                                <?php echo $randomMonster['defense']; ?>
                            </span>
                        </div>
                    </div>
                    <!-- Monster Rating -->
                    <div class="mb-4">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-gray-300 text-sm">(4.0/5.0)</span>
                    </div>
                    <!-- Monster Details Link -->
                    <div class="flex justify-start text-sm mb-2">
                        <a href="?monsters=show&id=<?php echo $randomMonster['id']; ?>" class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Plus de détails</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Section Derniers monstres -->
<section class="mb-20">
    <!-- Title -->
    <h2 class="creepster text-2xl mb-4 font-bold">
        DERNIERS MONSTRES AJOUTÉS
    </h2>
    <!-- Monster Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($monsters as $monster): ?>
            <!-- Monster Item -->
            <article class="relative bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 monster-card"
                data-monster-type="<?php echo $monster['type_name']; ?>">
                <!-- Monster Image -->
                <img src="/RETRO_MONSTERS_2025/public/images/<?php echo $monster['image_url']; ?>"
                    alt="<?php echo $monster['name']; ?>"
                    class="w-full h-48 object-cover rounded-t-lg" />
                <!-- Monster Details -->
                <div class="p-4">
                    <!-- Monster Name -->
                    <h3 class="text-xl font-bold">
                        <?php echo $monster['name']; ?>
                    </h3>
                    <!-- Monster Author -->
                    <h4 class="mb-2">
                        <a href="#" class="text-red-400 hover:underline">Alex Smith</a>
                    </h4>
                    <!-- Monster Description -->
                    <p class="text-gray-300 text-sm mb-2">
                        <?php echo $monster['description']; ?>
                    </p>
                    <!-- Monster Rating -->
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-yellow-400">★★★★☆</span>
                        <span class="text-sm text-gray-300">(4.0/5.0)</span>
                        <span class="text-sm text-gray-300">Type: <?php echo $monster['type_name']; ?></span>
                    </div>
                    <!-- Monster Stats -->
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-sm text-gray-300">PV: <?php echo $monster['pv']; ?></span>
                        <span class="text-sm text-gray-300">Attaque: <?php echo $monster['attack']; ?></span>
                    </div>
                    <!-- Monster Details Link -->
                    <div class="flex justify-center text-sm mb-2">
                        <a href="?monsters=show&id=<?php echo $monster['id']; ?>" class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Plus de détails</a>
                    </div>
                </div>
                <!-- Monster Bookmark Button -->
                <div class="absolute top-4 right-4">
                    <button class="text-white bg-gray-400 hover:bg-red-700 rounded-full p-2 transition-colors duration-300"
                        style=" width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                        <i class="fa fa-bookmark"></i>
                    </button>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <?php if (isset($totalPages) && $totalPages > 1): ?>
        <div style="text-align:center; margin-top:2rem;">
            <?php $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; ?>
            <!-- Previous Page -->
            <?php if ($currentPage > 1): ?>
                <a href="?page=<?php echo $currentPage - 1; ?>" 
                class="prev-page">Précédent</a>
            <?php endif; ?>
            <!-- Next Page -->
            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?php echo $currentPage + 1; ?>" 
                class="next-page">Suivant</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</section>