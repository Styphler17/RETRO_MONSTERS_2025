<form
    action="?monsters=filters"
    method="GET"
    class="bg-gray-700 rounded-lg shadow-lg p-4">
    <h2 class="font-bold text-lg mb-4">Filtrer par Critères</h2>
    <input type="hidden" name="monsters" value="filters" />
    <!-- Type -->
    <select name="type" class="w-full p-2 mb-4 bg-gray-800 rounded">
        <option value="">Choisir un type</option>
        <?php foreach ($types as $type): ?>
            <option value="<?php echo $type['id']; ?>" 
                    <?php echo (isset($_GET['type']) && $_GET['type'] == $type['id']) ? 'selected' : ''; ?>>
                <?php echo $type['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <!-- Rareté -->
    <select name="rarety" class="w-full p-2 mb-4 bg-gray-800 rounded">
        <option value="">Choisir une rareté</option>
        <?php foreach ($rareties as $rarety): ?>
            <option value="<?php echo $rarety['id']; ?>"
                    <?php echo (isset($_GET['rarety']) && $_GET['rarety'] == $rarety['id']) ? 'selected' : ''; ?>>
                <?php echo $rarety['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <!-- PV -->
    <div class="bg-gray-700 rounded-lg shadow-lg p-4 mb-4">
        <h2 class="font-bold text-lg mb-4">Filtrer par PV</h2>
        <div id="slider-pv" class="mb-4"></div>
        <span id="slider-pv-value"></span>
        <input type="hidden" id="min-pv" name="min_pv" value="<?php echo $_GET['min_pv'] ?? ''; ?>" />
        <input type="hidden" id="max-pv" name="max_pv" value="<?php echo $_GET['max_pv'] ?? ''; ?>" />
        <script>
            var sliderPv = document.getElementById("slider-pv");
            var minPv = document.getElementById("min-pv");
            var maxPv = document.getElementById("max-pv");
            var sliderPvValue = document.getElementById("slider-pv-value");
            noUiSlider.create(sliderPv, {
                start: [<?php echo $_GET['min_pv'] ?? 20; ?>, <?php echo $_GET['max_pv'] ?? 80; ?>],
                connect: true,
                range: {
                    min: 0,
                    max: 200
                },
            });
            sliderPv.noUiSlider.on("update", function(values, handle) {
                minPv.value = Math.round(values[0]);
                maxPv.value = Math.round(values[1]);
                sliderPvValue.innerHTML = "PV: " + Math.round(values[0]) + " - " + Math.round(values[1]);
            });
        </script>
    </div>
    <!-- Attaque -->
    <div class="bg-gray-700 rounded-lg shadow-lg p-4 mb-4">
        <h2 class="font-bold text-lg mb-4">Filtrer par Attaque</h2>
        <div id="slider-attaque" class="mb-4"></div>
        <span id="slider-attaque-value"></span>
        <input type="hidden" id="min-attaque" name="min_attack" value="<?php echo $_GET['min_attack'] ?? ''; ?>" />
        <input type="hidden" id="max-attaque" name="max_attack" value="<?php echo $_GET['max_attack'] ?? ''; ?>" />
        <script>
            var sliderAttaque = document.getElementById("slider-attaque");
            var minAttaque = document.getElementById("min-attaque");
            var maxAttaque = document.getElementById("max-attaque");
            var sliderAttaqueValue = document.getElementById("slider-attaque-value");
            noUiSlider.create(sliderAttaque, {
                start: [<?php echo $_GET['min_attack'] ?? 20; ?>, <?php echo $_GET['max_attack'] ?? 80; ?>],
                connect: true,
                range: {
                    min: 0,
                    max: 200
                },
            });
            sliderAttaque.noUiSlider.on("update", function(values, handle) {
                minAttaque.value = Math.round(values[0]);
                maxAttaque.value = Math.round(values[1]);
                sliderAttaqueValue.innerHTML = "Attaque: " + Math.round(values[0]) + " - " + Math.round(values[1]);
            });
        </script>
    </div>
    <button
        type="submit"
        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full">
        Appliquer les filtres
    </button>
</form>