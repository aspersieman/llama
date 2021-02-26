<?php

namespace Llama\Form;

use Llama\Form\WidgetTypes;

class FormCliMenu extends Form
{
  protected $command;
  protected $widgets;

  private function __construct(CommandSignature $signature = null)
  {
    parent::__construct($signature);
  }

  protected function init()
  {
    //build the form and the widget list
    foreach($signiture->getParameters() as $parameter) {
      if(!empty($parameter->getWidgetType())) {
        $widget = new Widget();
      }
    }
  }

  public function render()
  {
    // render the form
  }

  public function read($name = null)
  {
    // return the resultant input from the user
  }

  public function addWidget(Widget $widget)
  {
    $this->widgets[] = $widget;
  }
}
