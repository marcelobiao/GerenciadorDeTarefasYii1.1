<?php
/* @var $this TarefaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tarefas',
);
/*
$user=new CActiveDataProvider('Usuario',array(
	'criteria'=>array(
		'condition'=>'id=:ids',
		'params'=>array(':ids'=>Yii::app()->user->id)
	)
));*/

$user=Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));


//Yii::app()->user->id
$this->menu=array(
	array('label'=>'Criar nova tarefa', 'url'=>array('create')),
	array('label'=>'Administrar tarefas', 'url'=>array('admin'),'visible'=>$user->verificaAdmin()),
	//array('label'=>'Manage Tarefa', 'url'=>array('admin')),
	
);
?>
<h1>Tarefas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
