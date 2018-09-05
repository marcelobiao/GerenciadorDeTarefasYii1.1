<?php
/* @var $this TarefaController */
/* @var $model Tarefa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tarefa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUsuario'); ?>
		<?php //echo $form->textField($model,'idUsuario'); ?>
		<?php echo $form->dropDownList($model,'idUsuario', 
			//CHtml::listData(Usuario::model()->findAll(), 'id', 'nome')); 
			CHtml::listData(Usuario::model()->findAll(array(
				'condition' => 'id <>:id',
				'params'    => array(':id' => 13)
			)), 'id', 'nome')); 
			?>
		<?php echo $form->error($model,'idUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'privado'); ?>
		<?php //echo $form->textField($model,'privado'); ?>
		<?php echo $form->dropDownList($model,'privado', 
					['0' => 'Publico', '1' => 'Privado']
			); ?>
		<?php echo $form->error($model,'privado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php //echo $form->textField($model,'descricao',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->textArea($model, 'descricao', array('maxlength' => 300, 'rows' => 6, 'cols' => 60)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idTipoTarefa'); ?>
		<?php //echo $form->textField($model,'idTipoTarefa'); ?>
		<?php echo $form->dropDownList($model,'idTipoTarefa', 
			CHtml::listData(TipoTarefa::model()->findAll(), 'id', 'nome')); ?>
		<?php echo $form->error($model,'idTipoTarefa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php //echo $form->textField($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', 
					['0' => 'Aberto', '1' => 'Fechado']
			); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'dataConclusao'); ?>
		<?php echo $form->textField($model,'dataConclusao'); ?>
		<?php echo $form->error($model,'dataConclusao'); ?>
	</div>
	
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