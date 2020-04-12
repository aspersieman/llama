<?php
namespace Llama\Command;

use Llama\Command\CommandParameter;

class CommandSignature
{
  /** @var CommandController  */
  protected $controller;

  /** @var array  */
  protected $parameters = [];

  /** @var array  */
  protected $examples = [];

  /**
   * CommandSignature constructor.
   * @param CommandController $controller
   * @param array $examples
   * @param array $parameters
   */
  public function __construct(CommandController $controller, array $examples = [], array $parameters = [])
  {
    $this->controller = $controller;
    $this->examples = $examples;
    $this->parameters = $parameters;
  }

  /**
   * Sets CommandParameter
   * @param CommandParameter
   * @return void
   */
  public function setParameter(CommandParameter $parameter)
  {
    $this->parameters[] = $parameter;
  }

  /**
   * Sets CommandParameter
   * @param array
   * @return void
   */
  public function setParameters(array $parameters)
  {
    $this->parameters = $parameters;
  }

  /**
   * @return array
   */
  public function getExamples()
  {
    return $this->examples;
  }

  /**
   * @return array
   */
  public function getParameters()
  {
    return $this->parameters;
  }

  /**
   * @return CommandParameter
   */
  public function getParameter($name)
  {
    $parameter = array_values(array_filter(
        $this->parameters,
        function ($e) use ($name) {
            return $e->name == $name;
        }
    ));
    
    return !empty($parameter) ? $parameter[0] : null;
  }

  /**
   * Called within `handle`
   * @param CommandCall $input
   * @return bool
   */
  public function validate(CommandCall $input)
  {
    $requireds = [];
    foreach ($this->parameters as $parameter) {
      if(!$this->controller->hasParam($parameter->name)) {
        if ($parameter->required) {
          $requireds[] = $parameter;
        }
        $parameter->value = null;
      } else {
        $parameter->value = $this->controller->getParam($parameter->name);
      }
    }
    foreach ($requireds as $required) {
      $this->controller->getPrinter()->error("ERROR: Parameter '{$required->name}' is required for this command");
    }
    if (count($requireds) > 0) {
      return false;
    } else {
      return true;
    }
  }
}

