<?php
/* @var $this TarefaController */
/* @var $model Tarefa */

$this->breadcrumbs=array(
	'Tarefas'=>array('index'),
	$model->id,
);

$user = Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));

$this->menu=array(
	array('label'=>'Listar tarefas', 'url'=>array('index'), 'visible'=>$user->verificaAdmin()),
	array('label'=>'Criar nova tarefa', 'url'=>array('create')),
	array('label'=>'Atualizar tarefa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Deletar tarefa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja deletar esse item?')),
	array('label'=>'Administrar tarefas', 'url'=>array('admin'), 'visible'=>$user->verificaAdmin()),
);
?>

<h1>Tarefa #<?php echo $model->id; ?>: <?php echo $model->titulo?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'titulo',
		array(
			'name'=>'titulo',
		),
		//'idUsuario',
		array(
			'name'=>'Usuario',
			'value'=>$model->idUsuario0->nome,
		),
		//'privado',
		array(
			'name'=>'Privado',
			'value'=>$model->getPrivadoLabel(),
		),
		'descricao',
		//'idTipoTarefa',
		array(
			'name'=>'idTipoTarefa',
			'value'=>$model->idTipoTarefa0->nome,
		),
		//'status',
		array(
			'name'=>'status',
			'value'=>$model->getStatusLabel(),
		),
		//'dataConclusao',
		array(
			'name'=>'dataConclusao',
			'value'=>$model->getDataConclusao(),
		),
		//'dataCriacao',
		array(
			'name'=>'dataCriacao',
			'value'=>$model->getDataCriacao(),
		),
		//'dataModificacao',
		array(
			'name'=>'dataModificacao',
			'value'=>$model->getDataModificacao(),
		),
	),
)); ?>