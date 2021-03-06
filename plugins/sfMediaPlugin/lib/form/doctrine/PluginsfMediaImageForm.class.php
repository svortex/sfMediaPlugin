<?php

/**
 * sfMediaImage form.
 *
 * @package    sfMediaPlugin
 * @subpackage form
 * @author     Moujahid Mohamed
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginsfMediaImageForm extends BasesfMediaImageForm
{
  /**
   * @see sfMediaFileForm
   */
public function configure()
  {
    parent::configure();
    $this->widgetSchema['file'] = new sfWidgetFormInputFile();
    $this->validatorSchema['file'] = new sfValidatorFile ( array (
      'path' => sfConfig::get('sf_upload_dir'),
      'required'=> true,
      'mime_types' => "web_images")
     );


  }

  public function save($con = null)
    {

      try{

        $image = $this->getObject();
        $file = $this->getValue ('file');
        $filename = uniqid();
        $extension = $file->getOriginalExtension();
        $path = sfConfig::get('sf_upload_dir')."/".$filename.$extension ;
        $file->save($path);

        $image->setSmall($this->resizeFile(sfConfig::get('app_sfMediaPlugin_small_size'),$file,$filename,$extension));
        $image->setMedium($this->resizeFile(sfConfig::get('app_sfMediaPlugin_medium_size'),$file,$filename,$extension));
        $image->setLarge($this->resizeFile(sfConfig::get('app_sfMediaPlugin_large_size'),$file,$filename,$extension));

        $image->setRealName($file);
        $image->save();


      }catch(Exception $e){
        unset($path);
        throw new Exception("Error Processing Request:". $e->getMessage(), 1);
      }

    }

    protected function resizeFile($size,$image,$filename,$extension){

        $newimage = new sfImage($image);
        $tumbnail = $newimage->copy();

        $tumbnail->resize($size,$size);
        $path = sfConfig::get('sf_upload_dir')."/".$filename."_x$size".$extension;
        $tumbnail->setFilename($path);
        $tumbnail->save();

        return $path;

    }
}
