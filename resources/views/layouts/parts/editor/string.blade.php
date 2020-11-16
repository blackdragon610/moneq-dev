<?php if (!empty($isConfirmation)){ ?>
	<?php echo getVariable($inputs, $name); ?>
<?php }else{ ?>
	<?php echo getVariable($inputs, $name); ?>
	<input type="hidden" name="inputs[{{$name}}]" <?php echo $contents; ?> value="<?php echo getVariable($inputs, $name); ?>" />	
<?php } ?>
