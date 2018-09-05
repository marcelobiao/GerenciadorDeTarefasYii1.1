<?php
/* @var $this TipoTarefaController */
/* @var $model TipoTarefa */

$this->breadcrumbs=array(
	'Tipo Tarefas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$user = Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));

$this->menu=array(
	array('label'=>'List TipoTarefa', 'url'=>array('index')),
	array('label'=>'Criar Novo Tipo de Tarefa', 'url'=>array('create')),
	//array('label'=>'View TipoTarefa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipoTarefa', 'url'=>array('admin'), 'visible'=>$user->verificaAdmin()),
);
?>

<h1>Atualizar Tipo de Tarefa <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>