yii-dynamic-mask
================

A wrapper for http://digitalbush.com/projects/masked-input-plugin/

Put the files under the application extensions directory.

Usage:

$this->widget('application.extensions.dynamicmask.DMask', array(
    'element' => '#some_field, #another_field, #one_more_field',
    'mask' => '999-9999-999',
));

$this->widget('application.extensions.dynamicmask.DMask', array(
    'element' => '#date_field',
    'mask' => '99/99/9999',
    'config' => array(
      'placeholder' => "mm/dd/yyyy",
    ),
));

$this->widget('application.extensions.dynamicmask.DMask', array(
    'element' => '#phone_field',
    'mask' => '(999) 999-9999',
));
