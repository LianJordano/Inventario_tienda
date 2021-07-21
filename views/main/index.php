<div class="container">

    <div class="row">

        <div class="col-9">

            <h1 class="my-4">Productos</h1>


            <div class="row">

            <?php foreach($productos as $producto): ?>
                <div class="producto col-2 mx-4 mt-3">
                    <img src="<?= URL ?>uploads/<?=$producto["pro_foto"]?>" alt="">
                    <span class="mt-2"></span>
                    <p class="mt-3"><?=$producto["pro_nombre"]?></p>
                    <p><b><?=$producto["pro_precio"]?></b></p>
                </div>

            <?php endforeach; ?>

            </div>


        </div>

        <div class="col-3">

            <h1 class="text-center mt-4">Destacados</h1>

            <div class="row">

                <?php foreach ($destacados as $destacado) : ?>
                    
                    
                    <div class="producto col-10 mx-4 mt-3"  >
                        <img src="<?= URL ?>uploads/<?=$destacado["pro_foto"]?>" alt="">
                        <span class="mt-2"></span>
                        <p class="mt-3"><?=$destacado["pro_nombre"]?></p>
                        <p><b>$ <?=$destacado["pro_precio"]?></b></p>
                        <?php if($destacado["pro_destacado"]==1): ?>
                            <img class="estrella" src="<?=URL?>/uploads/estrella.png" alt="">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>







</div>