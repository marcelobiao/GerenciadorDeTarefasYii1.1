<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sexo'); ?>
		<?php //echo $form->textField($model,'sexo'); ?>
		<?php echo $form->dropDownList($model,'sexo', 
					['Feminino' => 'Feminino', 'Masculino' => 'Masculino', 'Outros' => 'Outros']
			); ?> 
		<?php echo $form->error($model,'sexo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dataNascimento'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'model'=>$model,
			'attribute'=>'dataNascimento',
			'language' => 'pt-BR',
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'slideDown',
				'altField'=>'dataNascimento',
				'yearRange' => '1900:Year()',		
				'changeMonth'=>true,
				'changeYear'=>true,
				'dateFormat' => 'dd/mm/yy',),
			));?>
		<?php echo $form->error($model,'dataNascimento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php //echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php $this->widget("ext.maskedInput.MaskedInput", array(
                "model" => $model,
                "attribute" => "email",
                "clientOptions" => ['alias' =>  'email'], 
                "defaults"=>array("removeMaskOnSubmit"=>false),
				/* once defaults are set will be applied to all the masked fields  removeMaskOnSubmit defaults to true */
            ));?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefone'); ?>
		<?php //echo $form->textField($model,'telefone',array('size'=>20,'maxlength'=>20)); ?>
		<?php $this->widget("ext.maskedInput.MaskedInput", array(
                "model" => $model,
                "attribute" => "telefone",
                "mask" => array('(99) 9999-9999','(99) 99999-9999'),
                "clientOptions" => array("autoUnmask"=> true), 
				"defaults"=>array("removeMaskOnSubmit"=>false)
		));?>
		<?php echo $form->error($model,'telefone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'senha'); ?>
		<?php //echo $form->textField($model,'senha',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->passwordField($model,'senha',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'senha'); ?>
	</div>
	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'dataCriacao'); ?>
		<?php echo $form->textField($model,'dataCriacao'); ?>
		<?php echo $form->error($model,'dataCriacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dataModificacao'); ?>
		<?php echo $form->textField($model,'dataModificacao'); ?>
		<?php echo $form->error($model,'dataModificacao'); ?>
	</div>
	-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->