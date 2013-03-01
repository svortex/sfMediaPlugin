<?php

/**
 * sfMediaVideo form.
 *
 * @package    sfMediaPlugin
 * @subpackage form
 * @author     Moujahid Mohamed
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginsfMediaVideoForm extends BasesfMediaVideoForm
{
  /**
   * @see sfMediaFileForm
   */
  public function configure()
  {
    parent::configure();
    // unset($this['real_name'],$this['type'],$this['small'] ,$this['medium'],$this['large'],$this['file'] );
    $this->useFields(array( "thumb","title", "description" ,"provider", 'url', "code"));

    $this->widgetSchema['img'] = new sfWidgetFormInputFileEditable(array(
    'label' => ' ',
    'file_src' => $this->getObject()->getThumb(),
    'is_image' => true,
    'edit_mode' => true,
    'template' => '%file%',
    ));

    $this->widgetSchema['provider'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['url'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['code'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['thumb'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();

  }
}
