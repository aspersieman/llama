<?php

namespace Llama\Form;

use Llama\Form\WidgetTypes;

class Widget
{
  protected $widgetType;
  protected $name;
  protected $height;
  protected $width;
  protected $caption;

  private function __construct($widgetType, $name, $height, $width, $caption = "")
  {
  }

  public function render()
  {
  }

  public function read()
  {
  }

  public function setWidgetType($widgetType)
  {
    $this->widgetType = $widgetType;
  }

  public function getWidgetType()
  {
    return $this->widgetType;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setHeight($height)
  {
    $this->height = $height;
  }

  public function getHeight()
  {
    return $this->height;
  }

  public function setWidth($width)
  {
    $this->width = $width;
  }

  public function getWidth()
  {
    return $this->width;
  }

  public function setCaption($caption)
  {
    $this->caption = $caption;
  }

  public function getCaption()
  {
    return $this->caption;
  }
}
