<?php if (!empty($checkValue)){ ?>

<?php if (!empty($isConfirmation)){ ?>

<?php /*if (getVariable($inputs, $name)){*/ ?>{{$checkValue}}<?php /*}*/ ?>

<?php }else{ ?>
    <input type="checkbox" id="{{$name}}[{{$key}}]" name="{{$name}}[{{$key}}]" {!! $contents !!} value="1"<?php if (getVariable($inputs, $name)){ ?> checked="checked"<?php } ?> />
    <label for="{{$name}}[{{$key}}]">
        <span class="btnUnselected"> {{$checkValue}} </span>
    </label>
<?php } ?>




<?php }else{ ?>
<?php if (isset($file)){ ?>
<?php
    $checkboxs = viewConfig($file, /*getVariable($inputs, $name)*/'', $keyValue, false);
?>

<?php }else{ ?>
<?php if (!isset($ext)){$ext= '';}echo viewModel($model, $function, /*getVariable($inputs, $name)*/ '', $ext); ?>
<?php } ?>

<?php if (!empty($isConfirmation)){ ?>
		<?php foreach ($checkboxs as $key => $checkbox){ ?>
            <?php if ($checkbox['select']){ ?>
                {{$checkbox['value']}}
                <input type="hidden" name="{{$name}}[{{$key}}]" value="{{$key}}">
            <?php } ?>

		<?php } ?>
<?php }else{ ?>
		<?php foreach ($checkboxs as $key => $checkbox){ ?>
        <input type="checkbox" id="{{$name}}[{{$key}}]" name="{{$name}}[{{$key}}]" {!! $contents !!} value="{{$key}}"<?php if ($checkbox['select']){ ?> checked="checked"<?php } ?> />
        <label for="{{$name}}[{{$key}}]">
            <span class="btnUnselected">{{$checkbox['value']}}</span>
        </label>
		<?php } ?>

    @include('layouts.parts.editor.error')
<?php } ?>

<?php } ?>
