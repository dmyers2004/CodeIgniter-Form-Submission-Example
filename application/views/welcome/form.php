<?php include APPPATH.'/views/_partials/header.php' ?>

<h2>Twitter Bootstrap Form</h2>

<p>
<!--
do something special with these they are in key/value pairs where the key is the field name and the value of course is the error
these provide more information than just "required" for example a email in the wrong format (as well as required)
-->
<?php foreach ($form_errors as $form_error) { ?>
	<span class="label label-danger"><?=$form_error ?></span>
<?php } ?>
</p>

<?=form_open_multipart('/welcome/index',['class'=>'form-horizontal']) ?>

<div class="form-group">
	<label for="fname" class="col-sm-2 control-label">First Name*</label>
	<div class="col-sm-8">
		<!-- example where a form name doesn't match the model name exactly -->
		<?=form_input('fname',$fname,['class'=>'form-control']) ?>
	</div>
</div>

<div class="form-group">
	<label for="lastname" class="col-sm-2 control-label">Last Name</label>
	<div class="col-sm-8">
		<?=form_input('lastname',$lastname,['class'=>'form-control']) ?>
	</div>
</div>

<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email*</label>
	<div class="col-sm-10">
		<?=form_input('email',$email,['class'=>'form-control']) ?>
	</div>
</div>

<div class="form-group">
	<label for="lastname" class="col-sm-2 control-label">Favorite Food*</label>
	<div class="col-sm-6">
		<?=form_dropdown('favfood',$favfood_options,$favfood,['class'=>'form-control']) ?>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10 text-right">
    <strong><em>* Required Fields</em></strong> <?=form_submit('submit','Save',['class'=>'btn btn-primary']) ?>
	</div>
</div>

<?=form_close() ?>

<?php include APPPATH.'/views/_partials/footer.php' ?>