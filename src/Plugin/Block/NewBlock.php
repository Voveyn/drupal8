<?php
namespace Drupal\my_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'New' Block.
 *
 * @Block(
 *   id = "new_block",
 *   admin_label = @Translation("New block"),
 *   category = @Translation("Hello New World"),
 * )
 */

class NewBlock extends BlockBase implements BlockPluginInterface{

    public function build() {

        $form = \Drupal::formBuilder()->getForm('\Drupal\my_module\Form\NewForm');
        return $form;
    }

    public function blockForm($form, FormStateInterface $form_state) {
        $form = parent::blockForm($form, $form_state);

        $config = $this->getConfiguration();


        return $form;
    }

}