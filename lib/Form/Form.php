<?php

namespace Llama\Form;

use Llama\FormInterface;
use Llama\Command\CommandSignature;

class Form implements FormInterface
{
  protected $signature;

  function __construct(CommandSignature $signature = null)
  {
    $this->signature = $signature;
  }
}
