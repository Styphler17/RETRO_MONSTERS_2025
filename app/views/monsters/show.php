<div class="bg-gray-700 rounded-lg shadow-lg monster-card"
    data-monster-type="<?php echo $monster['type_name']; ?>">
    <div class="md:flex">
        <!-- Monster Image -->
        <div class="w-full md:w-1/2 relative">
            <img class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                src="/RETRO_MONSTERS_2025/public/images/<?php echo $monster['image_url']; ?>"
                alt="<?php echo $monster['name']; ?>" />
        </div>
        <!-- Monster Details -->
        <div class="p-6 md:w-1/2">
            <!-- Monster Name -->
            <h2 class="text-3xl font-bold mb-2 creepster">
                <?php echo $monster['name']; ?>
            </h2>
            <!-- Monster Description -->
            <p class="text-gray-300 text-sm mb-4">
                <?php echo $monster['description']; ?>
            </p>
            <!-- Monster Stats -->
            <div class="mb-4">
                <!-- Monster Type -->
                <div>
                    <strong class="text-white">Type:</strong>
                    <span class="text-gray-300">
                        <?php echo $monster['type_id']; ?>
                    </span>
                </div>
                <!-- Monster PV -->
                <div>
                    <strong class="text-white">PV:</strong>
                    <span class="text-gray-300">
                        <?php echo $monster['pv']; ?>
                    </span>
                </div>
                <!-- Monster Attack -->
                <div>
                    <strong class="text-white">Attaque:</strong>
                    <span class="text-gray-300">
                        <?php echo $monster['attack']; ?>
                    </span>
                </div>
                <!-- Monster Defense -->
                <div>
                    <strong class="text-white">Défense:</strong>
                    <span class="text-gray-300">
                        <?php echo $monster['defense']; ?>
                    </span>
                </div>
                <!-- Monster Rating -->
                <div class="mb-4">
                    <span class="text-yellow-400">★★★★☆</span>
                    <span class="text-gray-300 text-sm">(4.0/5.0)</span>
                </div>
                <!-- Monster Buttons -->
                <div class="flex justify-start gap-4">
                    <!-- Monster Edit Button -->
                    <a href="#" class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Modifier</a>
                    <!-- Monster Delete Button -->
                    <a href="#" class="inline-block text-white opacity-60 hover:opacity-100 rounded-full px-4 py-2 transition-colors duration-300">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
</div>