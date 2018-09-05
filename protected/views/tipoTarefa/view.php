<?php
/* @var $this TipoTarefaController */
/* @var $model TipoTarefa */

$this->breadcrumbs=array(
	'Tipo Tarefas'=>array('index'),
	$model->id,
);

$user = Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));

$this->menu=array(
	array('label'=>'Listar tipos de tarefas', 'url'=>array('index')),
	array('label'=>'Criar novo tipo de tarefa', 'url'=>array('create')),
	array('label'=>'Atualizar tipo de tarefa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete tipo de tarefa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>$model->removeTipoTarefa($model->id))),
	array('label'=>'Administrar tipos de Tarefas', 'url'=>array('admin'),'visible'=>$user->verificaAdmin()),
);
?>

<h1>Tipo de tarefa #<?php echo $model->id; ?>: <?php echo $model->nome ?> </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		//'dataCriacao',
		array(
			'name'=>'dataCriacao',
			'value'=>$model->getDataCriacao(),
		),
		//'dataModificacao',
		array(
			'name'=>'dataModificacao',
			'value'=>$model->getDataModificacao() ,
		),
	),
)); ?>
