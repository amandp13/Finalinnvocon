<?php if(count($errors) > 0 ) : ?>
    <div>
          <?php foreach($errors as $errors) : ?>
            <p><?php echo $errors ?></p>
       <?php endforeach ?>
    </div>
    <?php endif ?>