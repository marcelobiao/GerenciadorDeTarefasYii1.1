<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$user = Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));
$this->menu=array(
	array('label'=>'Listar usuários', 'url'=>array('index'),'visible'=>$user->verificaAdmin()),
	array('label'=>'Criar novo usuário', 'url'=>array('create'), 'visible'=>$user->verificaAdmin()),
	//array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar usuários', 'url'=>array('admin'),'visible'=>$user->verificaAdmin()),
);
?>

<h1>Atualizar usuário #<?php echo $model->id; ?>: <?php echo $model->nome ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>