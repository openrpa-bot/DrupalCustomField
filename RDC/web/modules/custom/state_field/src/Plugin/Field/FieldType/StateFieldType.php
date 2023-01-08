<?php

//declare(strict_types = 1);

namespace Drupal\state_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'state_field' field type.
 *
 * @FieldType(
 *   id = "state_field_type",
 *   label = @Translation("State Field"),
 *   description = @Translation("State to select and corresponding Image to display."),
 *   default_widget = "state_field_widget",
 *   default_formatter = "state_field_formatter",
 * )
 */
class StateFieldType extends FieldItemBase {

   /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition): array {
   return [
      'columns' => [
        'rowId' => [
          'description' => 'Row ID of the field',
          'type' => 'int',
          'size' => 'small',
          'not null' => TRUE,
          'default' => $field_definition->getSetting('rowId_default_value'),
        ],
        'columnId' => [
          'description' => 'Column ID of the field',
          'type' => 'int',
          'size' => 'small',
          'not null' => TRUE,
          'default' => $field_definition->getSetting('columnId_default_value'),
        ],
        'Option' => [
          'description' => 'Selected an option',
          'type' => 'varchar',
          'length' => $field_definition->getSetting('Option_Length'),
          'not null' => TRUE,
          'default' => $field_definition->getSetting('Option_default_value'),
        ]
      ]
    ];
  }
   /**
     * {@inheritdoc}
     */
    public static function defaultStorageSettings() {
      return [
        'rowId_Max_Limit'         => 10,
        'columnId_Max_Limit'      => 10,
        'rowId_default_value'     => 0,
        'columnId_default_value'  => 0,
        'Option_Length'           => 264,
        'Option_default_value'    => 'None',
      ] + parent::defaultStorageSettings();
    }

    /**
     * {@inheritdoc}
     */
    public static function defaultFieldSettings() {
      return [
        'available_states' => [],
        'available_images' => [],
      ] + parent::defaultFieldSettings();
    }
    /**
           * {@inheritdoc}
           */
          public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
            $properties['rowId'] = DataDefinition::create('integer')
              ->setLabel(t('Row ID'))
              ->setDescription(t('Selected the Row ID.'))
              ->setRequired(TRUE);

            $properties['columnId'] = DataDefinition::create('integer')
              ->setLabel(t('Column ID'))
              ->setDescription(t('Selected the Column ID.'))
              ->setRequired(TRUE);

            $properties['Option'] = DataDefinition::create('string')
              ->setLabel(t('Option'))
              ->setDescription(t('Selected the Option.'))
              ->setRequired(TRUE);

            return $properties;
          }

       /**
         * {@inheritdoc}
         */
        public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
          $element = [];

          $element['maxRowId'] = [
            '#type' => 'number',
            '#title' => $this->t('Max Row ID'),
            '#default_value' => $this->getSetting('rowId_default_value'),
            '#required' => TRUE,
          ];

          $element['maxColumnId'] = [
            '#type' => 'number',
            '#title' => $this->t('Max Column ID'),
            '#default_value' => $this->getSetting('columnId_default_value'),
            '#required' => TRUE,
          ];

          $element['availableOptions'] = [
            '#type' => 'textfield',
            '#maxlength' => 255,
            '#title' => $this->t('Available Options'),
            '#default_value' => $this->getSetting('Option_default_value'),
            '#required' => TRUE,
          ];

          return $element;
        }
}


