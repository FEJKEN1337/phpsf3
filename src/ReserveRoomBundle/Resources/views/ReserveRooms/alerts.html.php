<!-- alerts -->
<?php foreach($view['session']->getFlash('success', array())as $messages): ?>
    <div class="alert alert-success"><?php echo $messages ?></div>
<?php endforeach ;?>

<?php foreach($view['session']->getFlash('error', array()) as $messages): ?>
    <div class="alert alert-danger"><?php echo $messages ?></div>
<?php endforeach ;?>
<!-- /alerts -->

