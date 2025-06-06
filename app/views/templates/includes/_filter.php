<form
    action="/recherche-criteres"
    method="GET"
    class="bg-gray-700 rounded-lg shadow-lg p-4">
    <h2 class="font-bold text-lg mb-4">Filtrer par Critères</h2>
    <!-- Type -->
    <select name="type" class="w-full p-2 mb-4 bg-gray-800 rounded">
        <!-- Option disabled selected pour afficher le texte "Choisir un type" -->
        <option value="" disabled selected>Choisir un type</option>
        <?php foreach ($types as $type): ?>
            <option value="<?php echo $type['id']; ?>">
                <?php echo $type['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <!-- Rareté -->
    <select name="rarete" class="w-full p-2 mb-4 bg-gray-800 rounded">
        <option value="" disabled selected>Choisir une rareté</option>
        <?php foreach ($rareties as $rarety): ?>
            <option value="<?php echo $rarety['id']; ?>"><?php echo $rarety['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <!-- PV -->
    <div class="bg-gray-700 rounded-lg shadow-lg p-4 mb-4">
        <h2 class="font-bold text-lg mb-4">Filtrer par PV</h2>
        <div id="slider-pv" class="mb-4"></div>
        <span id="slider-pv-value"></span>
        <input type="hidden" id="min-pv" name="min_pv" />
        <input type="hidden" id="max-pv" name="max_pv" />
        <script>
            var sliderPv = document.getElementById("slider-pv");
            var minPv = document.getElementById("min-pv");
            var maxPv = document.getElementById("max-pv");
            var sliderPvValue = document.getElementById("slider-pv-value");
            noUiSlider.create(sliderPv, {
                start: [20, 80],
                connect: true,
                range: {
                    min: 0,
                    max: 200
                },
            });
            sliderPv.noUiSlider.on("update", function(values, handle) {
                minPv.value = values[0];
                maxPv.value = values[1];
                sliderPvValue.innerHTML = "PV: " + values.join(" - ");
            });
        </script>
    </div>
    <!-- Attaque -->
    <div class="bg-gray-700 rounded-lg shadow-lg p-4 mb-4">
        <h2 class="font-bold text-lg mb-4">Filtrer par Attaque</h2>
        <div id="slider-attaque" class="mb-4"></div>
        <span id="slider-attaque-value"></span>
        <input type="hidden" id="min-attaque" name="min_attaque" />
        <input type="hidden" id="max-attaque" name="max_attaque" />
        <script>
            var sliderAttaque = document.getElementById("slider-attaque");
            var minAttaque = document.getElementById("min-attaque");
            var maxAttaque = document.getElementById("max-attaque");
            var sliderAttaqueValue = document.getElementById("slider-attaque-value");
            noUiSlider.create(sliderAttaque, {
                start: [20, 80],
                connect: true,
                range: {
                    min: 0,
                    max: 200
                },
            });
            sliderAttaque.noUiSlider.on("update", function(values, handle) {
                minAttaque.value = values[0];
                maxAttaque.value = values[1];
                sliderAttaqueValue.innerHTML = "Attaque: " + values.join(" - ");
            });
        </script>
    </div>
    <button
        type="submit"
        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full">
        Appliquer les filtres
    </button>
</form>