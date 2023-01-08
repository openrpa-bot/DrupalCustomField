<?php

namespace Drupal\state_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Url;

/**
 * Plugin implementation of the 'state_field' formatter.
 *
 * @FieldFormatter(
 *   id = "state_field_formatter",
 *   label = @Translation("State Field"),
 *   field_types = {
 *     "state_field_type"
 *   }
 * )
 */
class StateFieldFormatter extends FormatterBase {

   /**
     * {@inheritdoc}
     */
    public function viewElements(FieldItemListInterface $items, $langcode) {
      foreach ($items as $delta => $item) {
        // Render each element as markup.
       // $element[$delta] = ['#markup' => $item->rowId .':' . $item->columnId .':'.$item->Option ];
      }

      return $element;
    }

}
