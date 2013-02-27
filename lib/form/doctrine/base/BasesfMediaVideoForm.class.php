<?php

/**
 * sfMediaVideo form base class.
 *
 * @method sfMediaVideo getObject() Returns the current form's model object
 *
 * @package    sfMediaPlugin
 * @subpackage form
 * @author     Moujahid Mohamed
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfMediaVideoForm extends sfMediaFileForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('sf_media_video[%s]');
  }

  public function getModelName()
  {
    return 'sfMediaVideo';
  }

}
