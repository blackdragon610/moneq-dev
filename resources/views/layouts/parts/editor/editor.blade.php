<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector : '#editor_{{$name}}',
        plugins  : 'jbimages link autolink preview',
        toolbar  : 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages | preview',
        menubar  : false,
        relative_urls : false
    });
</script>


<?php if (!empty($isConfirmation)){ ?>
    <div class="panel-body">
        <?php echo getVariable($inputs, $name); ?>
    </div>
<?php }else{ ?>
	<textarea style="height:40em;" id="editor_{{$name}}" name="inputs[{{$name}}]" <?php echo $contents; ?>><?php echo getVariable($inputs, $name); ?></textarea>

	<?php if (!empty($errors[$name][0])){ ?>
		<?php foreach ($errors[$name] as $error){ ?>
			<p class="text-danger"><?php echo $error; ?></p>
		<?php } ?>
	<?php } ?>
<?php } ?>
