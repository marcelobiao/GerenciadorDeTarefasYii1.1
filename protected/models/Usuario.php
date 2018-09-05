<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $nome
 * @property string $sexo
 * @property string $dataNascimento
 * @property string $email
 * @property string $telefone
 * @property string $login
 * @property string $senha
 * @property string $dataCriacao
 * @property string $dataModificacao
 *
 * The followings are the available model relations:
 * @property Tarefa[] $tarefas
 */


class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, sexo, email, telefone, login, senha, dataNascimento', 'required'),
			array('nome, email', 'length', 'max'=>128),
			array('sexo, telefone, login, senha', 'length', 'max'=>20),
			array('dataNascimento, dataCriacao, dataModificacao', 'safe'),
			
			array('email', 'email'),
			array('telefone', 'ext.IWPhoneNumberValidator', 'validateWithMask' => TRUE, 'customMessage' => 'O campo "{attribute}" não é um número de celular válido.'),
			//array('dataNascimento', 'ext.DataValidator'),

			array('nome,senha', 'length', 'min'=>8),



			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nome, sexo, dataNascimento, email, telefone, login, senha, dataCriacao, dataModificacao', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tarefas' => array(self::HAS_MANY, 'Tarefa', 'idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'sexo' => 'Sexo',
			'dataNascimento' => 'Data de Nascimento',
			'email' => 'Email',
			'telefone' => 'Telefone',
			'login' => 'Login',
			'senha' => 'Senha',
			'dataCriacao' => 'Data de Criação',
			'dataModificacao' => 'Data de Modificação',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('dataNascimento',$this->dataNascimento,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefone',$this->telefone,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('senha',$this->senha,true);
		$criteria->compare('dataCriacao',$this->dataCriacao,true);
		$criteria->compare('dataModificacao',$this->dataModificacao,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave() {
		$this->dataNascimento = str_replace('/', '-', $this->dataNascimento);

		$this->dataNascimento = date("Y-m-d", strtotime($this->dataNascimento));
		$this->dataModificacao = date("Y-m-d H:i:s");
		return parent::beforeSave();
	}

	public function afterFind(){
		$this->dataNascimento = date("d-m-Y", strtotime($this->dataNascimento));
		$this->dataNascimento = str_replace('-', '/', $this->dataNascimento);
		
		//$this->dataModificacao = date("Y-m-d H:i:s");
		return parent::afterSave();
	}
	/*
	public function afterSave() {
		$this->dataNascimento = date("d-m-Y", strtotime($this->dataNascimento));
		$this->dataNascimento = str_replace('-', '/', $this->dataNascimento);
		
		//$this->dataModificacao = date("Y-m-d H:i:s");
		return parent::afterSave();
	}*/
	
	public function getDataNascimento(){
		$this->dataNascimento = Date('d/m/Y', strtotime($this->dataNascimento));
		return $this->dataNascimento;
	}

	public function getDataCriacao(){
		$this->dataCriacao = Yii::app()->dateFormatter->format('HH:mm, dd/MM/yyyy',$this->dataCriacao);
		return $this->dataCriacao;
	}

	public function getDataModificacao(){
		$this->dataModificacao = Yii::app()->dateFormatter->format('HH:mm, dd/MM/yyyy',$this->dataModificacao);
		return $this->dataModificacao;
	}

	public function verifyPassword($password,$senhaDB){
		if($senhaDB == $password)
			return true;
		return false;
	}

	public function verificaAdmin(){
		if($this->login == "admin")
			return true;
		return false;
	}

	public function removeUser($id){
		$user = Usuario::model()->findByPk($id);
		$count = Tarefa::model()->countByAttributes(array(
            'idUsuario'=> $id
		));
		if($count==0)
			return "Deseja deletar o usuário $user->nome.";
		else if($count==1)
			return "Deseja deletar o usuário $user->nome, o mesmo está alocado em $count tarefa que também será apagada.";
		else
			return "Deseja deletar o usuário $user->nome, o mesmo está alocado em $count tarefas que também serão apagadas.";	
	}
}