<?php
/* @var $this TarefaController */
/* @var $data Tarefa */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario0->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('privado')); ?>:</b>
	<?php echo CHtml::encode($data->getPrivadoLabel()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoTarefa')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoTarefa0->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->getStatusLabel()); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('dataCriacao')); ?>:</b>
	<?php echo CHtml::encode($data->getDataCriacao()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataConclusao')); ?>:</b>
	<?php echo CHtml::encode($data->getDataConclusao()); ?>
	<br />
	<!--

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataModificacao')); ?>:</b>
	<?php echo CHtml::encode($data->dataModificacao); ?>
	<br />

	-->

</div>