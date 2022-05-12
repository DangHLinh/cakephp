<?php foreach ($products as $pro) : ?>
    <?= $pro->name ?>
    <br>
    <?= $pro->description ?>
    <br>
    <?= $pro->created ?>
    <br><br>
<?php endforeach; ?>