<?php

namespace Drupal\states_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Url;

/**
 * Plugin implementation of the 'states_field' formatter.
 *
 * @FieldFormatter(
 *   id = "states_field_formatter",
 *   label = @Translation("States Field"),
 *   field_types = {
 *     "states_field_type"
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
        $element[$delta] = ['#markup' => $item->rowId .':' . $item->columnId .':'.$item->Option ];
      }

      return $element;
    }

}
