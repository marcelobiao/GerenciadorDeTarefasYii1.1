<?php
/**
 * DMask Class File
 * 
 * @author Phelipe B. Folgierini  <phelipebf@gmail.com>
 * @version 1
 * @license http://www.opensource.org/licenses/mit-license.php MIT license
 * 
 * @desc DMask (Dynamic Mask) is a wrapper for http://digitalbush.com/projects/masked-input-plugin/
 */

class DMask extends CWidget {

    /**
     * @var string Path of the asset files after publishing.
     */
    private $assetsPath;
    
    /**
     * @var string the selected HTML elements
     */
    public $element;
    
    /**
     * @var array options for maskMoney 
     */
    public $config = array();
       
    /**
     * @var string this will be used to get the mask if $config['mask'] is not given
     */
    public $mask;
    
    public function init() {
        $assets = dirname(__FILE__) . '/' . 'assets';
        $this->assetsPath = Yii::app()->getAssetManager()->publish($assets);
        Yii::app()->getClientScript()->registerScriptFile($this->assetsPath . '/' . 'jquery.maskedinput.min.js');
        Yii::app()->clientScript->registerCoreScript('jquery');
    }

     public function run() {
         Yii::app()->clientScript->registerScript('processDMask', '$("'.$this->element.'").mask("'.$this->mask.'",'.json_encode($this->config).')');
     }
}

?>
