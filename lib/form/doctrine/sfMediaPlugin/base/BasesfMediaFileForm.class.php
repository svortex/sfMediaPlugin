<?php

/**
 * sfMediaFile form base class.
 *
 * @method sfMediaFile getObject() Returns the current form's model object
 *
 * @package    sfMediaPlugin
 * @subpackage form
 * @author     Moujahid Mohamed
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfMediaFileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'type'        => new sfWidgetFormInputText(),
      'code'        => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'url'         => new sfWidgetFormInputText(),
      'thumb'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'provider'    => new sfWidgetFormInputText(),
      'real_name'   => new sfWidgetFormInputText(),
      'small'       => new sfWidgetFormInputText(),
      'medium'      => new sfWidgetFormInputText(),
      'large'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'thumb'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'provider'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'real_name'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'small'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'medium'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'large'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_media_file[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfMediaFile';
  }

}
