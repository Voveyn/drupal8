<?php

namespace Drupal\my_module\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Url;
use Twig\Node\Node;

/**
 * Defines the Example entity.
 *
 * @ingroup example
 *
 * @ContentEntityType(
 *   id = "cities",
 *   label = @Translation("Cities Entity"),
 *   handlers = {
 *     "views_data" = "Drupal\views\EntityViewsData",
 *   },
 *   base_table = "cities",
 *   entity_keys = {
 *     "id" = "id",
 *   },
 * )
 */


class Cities extends ContentEntityBase implements ContentEntityInterface
{
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setReadOnly(TRUE);

        $fields['city'] = BaseFieldDefinition::create('string')
            ->setLabel(t('City'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 50,
                'text_processing' => 0,
            ));

        return $fields;
    }
}