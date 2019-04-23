<?php

namespace Drupal\my_module\Controller;
use Drupal\Core\Controller\ControllerBase;


class MyModule extends ControllerBase
{
    public function content() {
        return [
            '#type' => 'markup',
            '#markup' => $this->t('Hello, World!'),
        ];
    }
}