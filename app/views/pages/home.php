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
                            style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
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
                        <a href="?monsters=<?php echo $randomMonster['id']; ?>" class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Plus de détails</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Section Derniers monstres -->
<?php include '../app/views/monsters/index.php'; ?>