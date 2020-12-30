<?php if (count($_SESSION['errors']) > 0) : ?>
    <div class="message error validation_errors alert alert-dismissible alert-danger mt-10">
        <?php foreach ($_SESSION['errors'] as $error) { ?>
            <p class="red font-weight-bold"><?php echo $error ?></p>
        <?php }
        unset($_SESSION['errors']);
        ?>
    </div>
<?php endif ?>
