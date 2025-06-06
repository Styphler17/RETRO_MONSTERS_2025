<?php
include_once '../app/models/typesModel.php';
$types = \App\Models\TypesModel\findAll($connexion);
include_once '../app/models/raretiesModel.php';
$rareties = \App\Models\RaretiesModel\findAll($connexion);
?>
<div class="container mx-auto flex flex-wrap pt-4 pb-12">
    <!-- main -->
    <main class="w-full md:w-3/4 p-4">
      <?php echo $content; ?>
    </main>
    <!-- aside -->
    <aside class="w-full md:w-1/4 p-4">
      <?php include_once '../app/views/templates/includes/aside.php'; ?>
    </aside>
</div>