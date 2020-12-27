<?php if (count($errors) > 0) : ?>
    <div class="message error validation_errors alert alert-dismissible alert-danger mt-10">
        <?php foreach ($errors as $error) : ?>
            <p class="red font-weight-bold"><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>
