<?php

namespace Llama\Command;

use Llama\App;
use Llama\ControllerInterface;
use Llama\Output\CliPrinter;
use Llama\Command\CommandSignature;

abstract class CommandController implements ControllerInterface
{
    /** @var  App */
    protected $app;

    /** @var  CommandCall */
    protected $input;

    /**
     * Command Logic.
     * @return void
     */
    abstract public function handle();

    /**
     * Called before `run`.
     * @param App $app
     */
    public function boot(App $app)
    {
        $this->app = $app;
    }

    /**
     * @param CommandCall $input
     */
    public function run(CommandCall $input)
    {
        $this->input = $input;
        if (property_exists($this, "signature") && $this->signature instanceof CommandSignature) {
          if(!$this->signature->validate($input)) {
            die;
          }
        }
        $this->handle();
    }

    /**
     * Called when `run` is successfully finished.
     * @return void
     */
    public function teardown()
    {
        //
    }

    /**
     * @return array
     */
    protected function getArgs()
    {
        return $this->input->args;
    }

    /**
     * @return array
     */
    protected function getParams()
    {
        return $this->input->params;
    }

    /**
     * @param string $param
     * @return bool
     */
    public function hasParam($param)
    {
        return $this->input->hasParam($param);
    }

    /**
     * @param string $flag
     * @return bool
     */
    protected function hasFlag($flag)
    {
        return $this->input->hasFlag($flag);
    }

    /**
     * @param $param
     * @return null
     */
    public function getParam($param)
    {
        return $this->input->getParam($param);
    }

    /**
     * @return App
     */
    protected function getApp()
    {
        return $this->app;
    }

    /**
     * @return CliPrinter
     */
    public function getPrinter()
    {
        return $this->getApp()->getPrinter();
    }

    /**
     * Called within `__construct`
     * @param array $envs
     * @return bool
     */
    protected function validateEnv(array $envs)
    {
      $undefineds = [];
      foreach ($envs as $env) {
        if (!isset($_ENV[$env])) {
          $undefineds[] = $env;
        }
      }
      foreach ($undefineds as $undefined) {
        $this->getPrinter()->error("ERROR: '$undefined' not defined (in .env file)");
      }
      if (count($undefineds) > 0) {
        die;
      }
    }

}
