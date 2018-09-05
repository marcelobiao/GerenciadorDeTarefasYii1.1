<?php
/* @var $this TipoTarefaController */
/* @var $model TipoTarefa */

$this->breadcrumbs=array(
	'Tipo Tarefas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Tipos De Tarefas', 'url'=>array('index')),
	array('label'=>'Administrar tipos de tarefas', 'url'=>array('admin')),
);
?>

<h1>Criar Novo Tipo De Tarefa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>