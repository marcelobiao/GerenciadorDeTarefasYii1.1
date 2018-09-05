<?php
/* @var $this TipoTarefaController */
/* @var $data TipoTarefa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataCriacao')); ?>:</b>
	<?php echo CHtml::encode($data->getDataCriacao()); ?>
	<br />
	<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('dataModificacao')); ?>:</b>
	<?php echo CHtml::encode($data->dataModificacao); ?>
	<br />
	-->

</div>