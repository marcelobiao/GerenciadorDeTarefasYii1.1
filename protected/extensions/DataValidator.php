<?php
  class DataValidator extends CValidator
  {
    /**
     * Validates a single attribute.
     * @param CModel $object the data object being validated
     * @param string $attribute the name of the attribute to be validated.
     */
    protected function validateAttribute($object, $attribute)
    {
      $value = $object->$attribute;
      if (!$this->validateData($value))
      {
        $message = Yii::t('yii', '{attribute} apresenta um formato inválido. Exemplo: \'15/11/2018\'');
        $this->addError($object, $attribute, $message);
      }
    }

    /**
     * Valida um campo de data
     * @param string $value Data para validar
     * @return boolean
     */
    public function validateData($value)
    {
      return preg_match('/([0-2][0-9]|[3][0-1])\/([0][0-9]|[1][0-2])\/([0-2][0-9]{3})/',$value);
    }

  }
  