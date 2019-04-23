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
 *   id = "custom_request",
 *   label = @Translation("Custom Request Entity"),
 *   handlers = {
 *     "views_data" = "Drupal\views\EntityViewsData",
 *   },
 *   base_table = "custom_request",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *   },
 * )
 */
class CustomRequest extends ContentEntityBase implements ContentEntityInterface {

    public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

        $fields['id'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('The ID of the Bonus entity.'))
            ->setReadOnly(TRUE);

        $fields['uuid'] = BaseFieldDefinition::create('uuid')
            ->setLabel(t('UUID'))
            ->setDescription(t('The UUID of the Bonus entity.'))
            ->setReadOnly(TRUE);

        $fields['name'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Full name'))
            ->setDescription(t('Name field.'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 50,
                'text_processing' => 0,
            ));

        $fields['email'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Email '))
            ->setDescription(t('email field.'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 50,
                'text_processing' => 0,
            ));

        $fields['phone'] = BaseFieldDefinition::create('string')
            ->setLabel(t('Phone number'))
            ->setDescription(t('Phone number field.'))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 20,
                'text_processing' => 0,
            ));

        $fields['city'] = BaseFieldDefinition::create('integer')
            ->setLabel(t('City'))
            ->setDescription(t('The ID of the city.'));

        $fields['created'] = BaseFieldDefinition::create('created')
            ->setLabel(t('Created'))
            ->setDescription(t('The time that example was created.'));

        $fields['changed'] = BaseFieldDefinition::create('changed')
            ->setLabel(t('Created'))
            ->setDescription(t('The time that example was changed.'));

        return $fields;
    }

    public function toUrl($rel = 'canonical', array $options = []) {
        // Return default URI as a base scheme as we do not have routes yet.
        return Url::fromUri('base:entity/custom_request/' . $this->id(), $options);
    }
}

