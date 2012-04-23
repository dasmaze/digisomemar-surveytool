<h2><?php echo $title ?></h2>
<?php foreach($answers as &$answer): ?>
    <input type="<?php echo $type ?>" name="<?php echo $answer->text ?>" value="<?php echo $answer->id ?>">
        <?php echo $answer->text ?>
    </input>
<?php endfor ?>


