<?php
/* @var $this TarefaController */
/* @var $model Tarefa */

$this->breadcrumbs=array(
	'Tarefas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$user = Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));

$this->menu=array(
	array('label'=>'Listar tarefas', 'url'=>array('index')),
	array('label'=>'Criar nova tarefa', 'url'=>array('create')),
	//array('label'=>'View Tarefa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar tarefas', 'url'=>array('admin'), 'visible'=>$user->verificaAdmin()),
);
?>

<h1>Atualizar Tarefa #<?php echo $model->id; ?>: <?php echo $model->titulo ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>