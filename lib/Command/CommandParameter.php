<?php
namespace Llama\Command;

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

    /**
     * CommandParameter constructor.
     * @param string $name
     * @param bool $required
     * @param string $documentation
     * @param mixed $value
     */
    public function __construct(
      $name,
      bool $required,
      $type = "",
      $documentation = "",
      $example = ""
    )
    {
      $this->name = $name;
      $this->required = $required;
      $this->type = $type;
      $this->documentation = $documentation;
      $this->example = $example;
    }
}
