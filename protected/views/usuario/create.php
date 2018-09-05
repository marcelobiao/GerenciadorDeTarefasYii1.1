<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);
if(Yii::app()->user->id != null)
	$user = Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));

$this->menu=array(
	//array('label'=>'Listar Usuário', 'url'=>array('index'),'visible'=>$model->verificaAdmin()),
	array('label'=>'Manage Usuario', 'url'=>array('admin'),'visible'=>Yii::app()->user->id != null ? $user->verificaAdmin(): false),
);
?>

<h1>Criar Novo Usuário</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>