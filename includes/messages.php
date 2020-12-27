<?php if (isset($_SESSION['message'])) : ?>
    <div class="message alert alert-dismissible alert-success mt-10">
        <?php
        
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>