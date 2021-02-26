<?php
namespace Llama\Command;

use Llama\WidgetTypes;

class CommandParameter
{
    /** @var string  */
    public $name;

    /** @var boolean  */
    public $required;

    /** @var string  */
    public $type;

    /** @var string  */
    public $documentation;

    /** @var mixed  */
    public $value;

    /** @var string  */
    public $example;

    /** @var WidgetType  */
    public $widgetType;

    /**
     * CommandParameter constructor.
     * @param string $name
     * @param bool $required
     * @param string $documentation
     * @param mixed $value
     * @param WidgetTypes $widgetType
     */
    public function __construct(
      $name,
      bool $required,
      $type = "",
      $documentation = "",
      $example = "",
      array $options = [],
      WidgetTypes $widgetType = null
    )
    {
      $this->name = $name;
      $this->required = $required;
      $this->type = $type;
      $this->documentation = $documentation;
      $this->example = $example;
      $this->widgetType = $widgetType;
    }
}
