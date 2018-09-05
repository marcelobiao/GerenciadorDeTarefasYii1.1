<?php
/* @var $this TipoTarefaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Tarefas',
);

$user = Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));

$this->menu=array(
	array('label'=>'Criar novo tipo de tarefa', 'url'=>array('create')),
	array('label'=>'Administrar tipos de tarefas', 'url'=>array('admin'), 'visible'=>$user->verificaAdmin()),
);
?>

<h1>Tipos de Tarefas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
