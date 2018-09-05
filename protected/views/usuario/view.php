<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);

$user = Usuario::model()->findByAttributes(array('id'=>Yii::app()->user->id));
$this->menu=array(
	array('label'=>'Listar usuários', 'url'=>array('index'),'visible'=>$user->verificaAdmin()),
	array('label'=>'Criar novo usuário', 'url'=>array('create'),'visible'=>$user->verificaAdmin()),
	array('label'=>'Atualizar usuário', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Deletar usuário', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja deletar esse item?'),'visible'=>$user->verificaAdmin()),
	array('label'=>'Deletar usuário', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>$model->removeUser($model->id)),'visible'=>$user->verificaAdmin()),
	array('label'=>'Administrar usuários', 'url'=>array('admin'),'visible'=>$user->verificaAdmin()),
);
?>

<h1>Usuario #<?php echo $model->id; ?>: <?php echo $model->nome ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'sexo',
		//'dataNascimento',
		array(
			'name'=>'dataNascimento',
			'value'=>$model->getDataNascimento(),
		),
		'email',
		'telefone',
		'login',
		//'senha',
		//'dataCriacao',
		array(
			'name'=>'dataCriacao',
			'value'=>$model->getDataCriacao()),
		//'dataModificacao',
		array(
			'name'=>'dataModificacao',
			'value'=>$model->getDataModificacao()),
	),
)); ?>
