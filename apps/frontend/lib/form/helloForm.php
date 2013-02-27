<?php

class HelloForm extends baseForm{
  public function configure(){

  $this->setWidgets(array(
      'file' => new sfWidgetFormInputFile()

        ));


  }


}

 ?>