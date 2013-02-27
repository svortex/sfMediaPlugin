<form action="<?php echo url_for('@upload') ?>" method="POST" enctype="multipart/form-data">

<?php echo $form['file']?>

<?php echo $form->renderHiddenFields(); ?>

<input type="submit" value="envoyer" />

</form>