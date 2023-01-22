<?php

namespace Drupal\state_to_image_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldFilteredMarkup;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\OptGroup;

/**
 * Plugin implementation of the 'state_to_image_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "state_to_image_formatter",
 *   label = @Translation("Image"),
 *   field_types = {
 *     "state_to_image_field"
 *   }
 * )
 */
class StateToImageFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    // Only collect allowed options if there are actually items to display.
    if ($items->count()) {
      $provider = $items->getFieldDefinition()
        ->getFieldStorageDefinition()
        ->getOptionsProvider('value', $items->getEntity());
      // Flatten the possible options, to support opt groups.
      $options = OptGroup::flattenOptions($provider->getPossibleOptions());

      foreach ($items as $delta => $item) {
         $elements[$delta] = [
          '#markup' => '<img loading="lazy" src="/DrupalCustomField/RDC/web/sites/default/files/inline-images/'.$item->value.'" width="40" height="40" alt="" typeof="foaf:Image">',
          '#allowed_tags' => FieldFilteredMarkup::allowedTags(),
        ];
      }
    }
    return $elements;
  }
}
