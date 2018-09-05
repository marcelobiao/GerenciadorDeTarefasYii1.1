<?php
/* @var $this TarefaController */
/* @var $model Tarefa */

$this->breadcrumbs=array(
	'Tarefas'=>array('index'),
	'Create',
);

$user = Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));

$this->menu=array(
	array('label'=>'Listar tarefas', 'url'=>array('index')),
	array('label'=>'Administrar tarefas', 'url'=>array('admin'), 'visible'=>$user->verificaAdmin()),
);
?>

<h1>Criar Nova Tarefa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>