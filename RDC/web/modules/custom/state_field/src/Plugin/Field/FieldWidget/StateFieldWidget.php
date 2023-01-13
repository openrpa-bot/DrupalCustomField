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
     $element['rowId'] = [
            '#type' => 'number',
            '#title' => $this->t('Row ID'),
            '#default_value' => $items[$delta]->rowId,
            '#required' => TRUE,
            '#min' => 1,
         ];
         $element['columnId'] = [
            '#type' => 'number',
            '#title' => $this->t('Column ID'),
            '#default_value' => $items[$delta]->columnId,
            '#required' => TRUE,
            '#min' => 1,
        ];
         $element['Option'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Option'),
            '#required' => TRUE,
            '#default_value' => $items[$delta]->Option,
            '#description' => $this->t('Text that will be shown inside the field until a value is entered. This hint is usually a sample value or a brief description of the expected format.'),
         ];

     return $element;
   }
}
