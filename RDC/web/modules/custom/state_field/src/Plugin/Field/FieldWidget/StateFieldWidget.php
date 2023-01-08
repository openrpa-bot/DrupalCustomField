<?php

namespace Drupal\state_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'state_field' widget.
 *
 * @FieldWidget(
 *   id = "state_field_widget",
 *   label = @Translation("Widget Label"),
 *   field_types = {
 *     "state_field_type"
 *   }
 * )
 */
class StateFieldWidget extends WidgetBase {
   /**
    * {@inheritdoc}
    */
   public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
     $element['value'] = $element + [
       '#type' => 'textfield',
       '#default_value' => $items[$delta]->Option,
     ];

     return $element;
   }
}
