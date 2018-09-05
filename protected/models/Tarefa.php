<?php

/**
 * This is the model class for table "tarefa".
 *
 * The followings are the available columns in table 'tarefa':
 * @property integer $id
 * @property string $titulo
 * @property integer $idUsuario
 * @property integer $privado
 * @property string $descricao
 * @property integer $idTipoTarefa
 * @property integer $status
 * @property string $dataConclusao
 * @property string $dataCriacao
 * @property string $dataModificacao
 *
 * The followings are the available model relations:
 * @property TipoTarefa $idTipoTarefa0
 * @property Usuario $idUsuario0
 */
class Tarefa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tarefa the static model class
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
		return 'tarefa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, idUsuario, privado, descricao, idTipoTarefa, status', 'required'),
			array('idUsuario, privado, idTipoTarefa, status', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>128),
			array('descricao', 'length', 'max'=>300),
			array('dataCriacao, dataModificacao', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titulo, idUsuario, privado, descricao, idTipoTarefa, status, dataConclusao, dataCriacao, dataModificacao', 'safe', 'on'=>'search'),
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
			'idTipoTarefa0' => array(self::BELONGS_TO, 'TipoTarefa', 'idTipoTarefa'),
			'idUsuario0' => array(self::BELONGS_TO, 'Usuario', 'idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Título',
			'idUsuario' => 'Usuário',
			'privado' => 'Visibilidade',
			'descricao' => 'Descrição',
			'idTipoTarefa' => 'Tipo de Tarefa',
			'status' => 'Status',
			'dataConclusao' => 'Data de Conclusão',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('privado',$this->privado);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('idTipoTarefa',$this->idTipoTarefa);
		$criteria->compare('status',$this->status);
		$criteria->compare('dataConclusao',$this->dataConclusao,true);
		$criteria->compare('dataCriacao',$this->dataCriacao,true);
		$criteria->compare('dataModificacao',$this->dataModificacao,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave() {
		if($this->status == 1 && $this->dataConclusao == null){
			$this->dataConclusao = date("Y-m-d H:i:s");
		}
		$this->dataModificacao = date("Y-m-d H:i:s");
		return parent::beforeSave();
	}

	public function getStatusLabel(){
		$statusLabel = [
			'0' => 'Aberto', 
			'1' => 'Fechado'
		];
		$this->status = $statusLabel[$this->status];
		return $this->status;
	}
	
	public function getPrivadoLabel(){
		$privadoLabel = [
			'0' => 'Publico', 
			'1' => 'Privado'
		];
		$this->privado = $privadoLabel[$this->privado];
		return $this->privado;
	}

	public function getDataCriacao(){
		if($this->dataCriacao != null){
			$this->dataCriacao = Yii::app()->dateFormatter->format('HH:mm, dd/MM/yyyy',$this->dataCriacao);
		}
		return $this->dataCriacao;
	}

	public function getDataConclusao(){
		if($this->dataConclusao != null){
			$this->dataConclusao = Yii::app()->dateFormatter->format('HH:mm, dd/MM/yyyy',$this->dataConclusao);
		}
		return $this->dataConclusao;
	}

	public function getDataModificacao(){
		if($this->dataModificacao != null){
			$this->dataModificacao = Yii::app()->dateFormatter->format('HH:mm, dd/MM/yyyy',$this->dataModificacao);
		}
		return $this->dataModificacao;
	}

	
}