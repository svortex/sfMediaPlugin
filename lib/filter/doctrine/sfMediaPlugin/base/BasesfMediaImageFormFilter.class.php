<?php

/**
 * sfMediaImage filter form base class.
 *
 * @package    sfMediaPlugin
 * @subpackage filter
 * @author     Moujahid Mohamed
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfMediaImageFormFilter extends sfMediaFileFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('sf_media_image_filters[%s]');
  }

  public function getModelName()
  {
    return 'sfMediaImage';
  }
}
