<?php

/**
 * sfMediaFile filter form base class.
 *
 * @package    sfMediaPlugin
 * @subpackage filter
 * @author     Moujahid Mohamed
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfMediaFileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'        => new sfWidgetFormFilterInput(),
      'code'        => new sfWidgetFormFilterInput(),
      'title'       => new sfWidgetFormFilterInput(),
      'url'         => new sfWidgetFormFilterInput(),
      'thumb'       => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'provider'    => new sfWidgetFormFilterInput(),
      'real_name'   => new sfWidgetFormFilterInput(),
      'small'       => new sfWidgetFormFilterInput(),
      'medium'      => new sfWidgetFormFilterInput(),
      'large'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'type'        => new sfValidatorPass(array('required' => false)),
      'code'        => new sfValidatorPass(array('required' => false)),
      'title'       => new sfValidatorPass(array('required' => false)),
      'url'         => new sfValidatorPass(array('required' => false)),
      'thumb'       => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'provider'    => new sfValidatorPass(array('required' => false)),
      'real_name'   => new sfValidatorPass(array('required' => false)),
      'small'       => new sfValidatorPass(array('required' => false)),
      'medium'      => new sfValidatorPass(array('required' => false)),
      'large'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_media_file_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfMediaFile';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'type'        => 'Text',
      'code'        => 'Text',
      'title'       => 'Text',
      'url'         => 'Text',
      'thumb'       => 'Text',
      'description' => 'Text',
      'provider'    => 'Text',
      'real_name'   => 'Text',
      'small'       => 'Text',
      'medium'      => 'Text',
      'large'       => 'Text',
    );
  }
}
