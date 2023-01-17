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
      ->setLabel(new TranslatableMarkup('Text value'))
      ->addConstraint('Length', ['max' => 255])
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'varchar',
          'length' => 255,
        ],
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
    public static function defaultStorageSettings() {
      return [
        'rowId_Max_Limit'         => 100,
        'columnId_Max_Limit'      => 100,
        'Option_Length'           => 255,
        'Option_Image_Folder'     => '',
        'default_state_field_value' => [
            'value' => 'None',
            'rowId' => 3,
            'columnId' => 3,
        ],
      ] + parent::defaultStorageSettings();
    }

    /**
     * {@inheritdoc}
     */
    public static function defaultFieldSettings() {
      return [
        'default_state_field_value' => [
            'value' => 'None',
            'rowId' => 2,
            'columnId' => 2,
          ],
      ] + parent::defaultFieldSettings();
    }
    //New Added Code End
}
