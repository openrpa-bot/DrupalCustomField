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
          'default' => $field_definition->getSetting('default_state_field_value')['rowId'],
        ],
        'columnId' => [
          'description' => 'Column ID of the field',
          'type' => 'int',
          'size' => 'small',
          'not null' => TRUE,
          'default' => $field_definition->getSetting('default_state_field_value')['columnId'],
        ],
        'Option' => [
          'description' => 'Selected an option',
          'type' => 'varchar',
          'length' => $field_definition->getSetting('Option_Length'),
          'not null' => TRUE,
          'default' => $field_definition->getSetting('default_state_field_value')['Option'],
        ]
      ]
    ];
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
  public static function mainPropertyName() {
    return 'Option';
  }
   /**
     * {@inheritdoc}
     */
    public static function defaultStorageSettings() {
      return [
        'rowId_Max_Limit'         => 100,
        'columnId_Max_Limit'      => 100,
        'Option_Length'           => 264,
        'Option_Image_Folder'     => '',
        'default_state_field_value' => [
            'rowId' => 3,
            'columnId' => 3,
            'Option' => 'None',
        ],
      ] + parent::defaultStorageSettings();
    }

    /**
     * {@inheritdoc}
     */
    public static function defaultFieldSettings() {
      return [
        'available_states' => [],
        'available_images' => [],
        'default_state_field_value' => [
            'rowId' => 2,
            'columnId' => 2,
            'Option' => 'None',
          ],
      ] + parent::defaultFieldSettings();
    }
       /**
         * {@inheritdoc}
         */
        public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
          $element = [];

          $element['maxRowId'] = [
            '#type' => 'number',
            '#title' => $this->t('Max Row ID'),
            '#default_value' => $this->getSetting('default_state_field_value')['rowId'],
            '#required' => TRUE,
          ];

          $element['maxColumnId'] = [
            '#type' => 'number',
            '#title' => $this->t('Max Column ID'),
            '#default_value' => $this->getSetting('default_state_field_value')['columnId'],
            '#required' => TRUE,
          ];

          $element['availableOptions'] = [
            '#type' => 'textfield',
            '#maxlength' => 255,
            '#title' => $this->t('Available Options'),
            '#default_value' => $this->getSetting('default_state_field_value')['Option'],
            '#required' => TRUE,
          ];

        $element['default']['Option'] = [
            '#type' => 'textfield',
            '#maxlength' => 255,
            '#title' => $this->t('Available Options'),
            '#default_value' => $this->getSetting('default_state_field_value')['Option'],
            '#required' => TRUE,
          ];
          return $element;
        }
}
/*protected function defaultImageForm(array &$element, array $settings) {
    $element['default_state_field_value'] = [
      '#type' => 'details',
      '#title' => $this->t('Default image'),
      '#open' => TRUE,
    ];
    // Convert the stored UUID to a FID.
    $fids = [];
    $uuid = $settings['default_image']['uuid'];
    if ($uuid && ($file = \Drupal::service('entity.repository')->loadEntityByUuid('file', $uuid))) {
      $fids[0] = $file->id();
    }
    $element['default_image']['uuid'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Image'),
      '#description' => $this->t('Image to be shown if no image is uploaded.'),
      '#default_value' => $fids,
      '#upload_location' => $settings['uri_scheme'] . '://default_images/',
      '#element_validate' => [
        '\Drupal\file\Element\ManagedFile::validateManagedFile',
        [static::class, 'validateDefaultImageForm'],
      ],
      '#upload_validators' => $this->getUploadValidators(),
    ];
    $element['default_image']['alt'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Alternative text'),
      '#description' => $this->t('Short description of the image used by screen readers and displayed when the image is not loaded. This is important for accessibility.'),
      '#default_value' => $settings['default_image']['alt'],
      '#maxlength' => 512,
    ];
    $element['default_image']['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('The title attribute is used as a tooltip when the mouse hovers over the image.'),
      '#default_value' => $settings['default_image']['title'],
      '#maxlength' => 1024,
    ];
    $element['default_image']['width'] = [
      '#type' => 'value',
      '#value' => $settings['default_image']['width'],
    ];
    $element['default_image']['height'] = [
      '#type' => 'value',
      '#value' => $settings['default_image']['height'],
    ];
  }*/

