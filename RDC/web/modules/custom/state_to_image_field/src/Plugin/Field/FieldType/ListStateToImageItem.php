<?php
namespace Drupal\state_to_image_field\Plugin\Field\FieldType;

use Drupal\options\Plugin\Field\FieldType\ListItemBase;
use Drupal\Core\Field\FieldFilteredMarkup;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'state_to_image_field' field type.
 *
 * @FieldType(
 *   id = "state_to_image_field",
 *   label = @Translation("List (State To Image)"),
 *   description = @Translation("This field stores text values from a list of allowed 'value => label' pairs, i.e. 'US States': IL => Illinois, IA => Iowa, IN => Indiana."),
 *   category = @Translation("State To Image"),
 *   default_widget = "state_to_image_field_widget",
 *   default_formatter = "state_to_image_field_formatter",
 * )
 */
class ListStateToImageItem extends ListItemBase {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Options'))
      ->addConstraint('Length', ['max' => 255])
      ->setRequired(TRUE);

    //New Added Code Begin
    $properties['rowId'] = DataDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('Row ID'))
      ->setRequired(TRUE);

    $properties['columnId'] = DataDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('Column ID'))
      ->setRequired(TRUE);
    //New Added Code End
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $field_settings = $field_definition->getSettings();
    return [
      'columns' => [
        'value' => [
          'description' => 'Seleted Option',
          'type' => 'varchar',
          'length' => 255,
          'not null' => TRUE,
          'default' => $field_settings['default_state_field_value']['value'],
        ],
        //New Added Code Begin
        'rowId' => [
          'description' => 'Row ID of the field',
          'type' => 'int',
          'size' => 'small',
          'not null' => TRUE,
          'default' => $field_settings['default_state_field_value']['rowId'],
        ],
        'columnId' => [
          'description' => 'Column ID of the field',
          'type' => 'int',
          'size' => 'small',
          'not null' => TRUE,
          'default' => $field_settings['default_state_field_value']['columnId'],
        ],
        //New Added Code End
      ],
      'indexes' => [
        'value' => ['value'],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function allowedValuesDescription() {
    $description = '<p>' . $this->t('The possible values this field can contain. Enter one value per line, in the format key|label.');
    $description .= '<br/>' . $this->t('The key is the stored value. The label will be used in displayed values and edit forms.');
    $description .= '<br/>' . $this->t('The label is optional: if a line contains a single string, it will be used as key and label.');
    $description .= '</p>';
    $description .= '<p>' . $this->t('Allowed HTML tags in labels: @tags', ['@tags' => FieldFilteredMarkup::displayAllowedTags()]) . '</p>';
    return $description;
  }

  /**
   * {@inheritdoc}
   */
  protected static function validateAllowedValue($option) {
    if (mb_strlen($option) > 255) {
      return new TranslatableMarkup('Allowed values list: each key must be a string at most 255 characters long.');
    }
  }

  /**
   * {@inheritdoc}
   */
  protected static function castAllowedValue($value) {
    return (string) $value;
  }
    //New Added Code Begin
    /**
      * {@inheritdoc}
      */
       public function isEmpty() {
    $value1 = $this->get('value')->getValue();
    $value2 = $this->get('rowId')->getValue();
    $value3 = $this->get('columnId')->getValue();

    return $value1 === NULL || $value1 === '' ||  $value2 === NULL || $value2 === '' ||  $value3 === NULL || $value3 === '';
     }

    /**
     * {@inheritdoc}
     */
    public static function defaultStorageSettings() {
      return parent::defaultStorageSettings() + [
        'rowId_Max_Limit'         => 100,
        'columnId_Max_Limit'      => 100,
        'Option_Length'           => 255,
        'Option_Image_Folder'     => '',
        'default_state_field_value' => [
            'value' => 'None',
            'rowId' => 3,
            'columnId' => 3,
        ],
      ];
    }

    /**
     * {@inheritdoc}
     */
    public static function defaultFieldSettings() {
      return parent::defaultFieldSettings() + [
        'default_state_field_value' => [
            'value' => 'None',
            'rowId' => 2,
            'columnId' => 2,
          ],
      ];
    }
    //New Added Code End
}
