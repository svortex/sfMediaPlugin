<?php

/**
 * test actions.
 *
 * @package    sfMediaPlugin
 * @subpackage test
 * @author     Moujahid Mohamed
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new sfMediaFileForm();
  }

  public function executeUpload(sfWebRequest $request)
  {

    $this->form = new sfMediaImageForm();

    if ($request->isMethod('post'))
    {

      // you need to bind the values and files to the submitted form
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      // then check if its valid - if it is valid the validator
      // should save the file for you
      if ($this->form->isValid())
      {
        $this->form->save();
          echo "file uploaded";


      }

    }
        $this->setTemplate('index');

  }
}
