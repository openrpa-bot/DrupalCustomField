<?php

namespace Drupal\state_to_image_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Plugin\Field\FieldWidget\OptionsWidgetBase;
use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'options_select_state_to_image' widget.
 *
 * @FieldWidget(
 *   id = "state_to_image_field_widget",
 *   label = @Translation("Select state to image list"),
 *   field_types = {
 *     "state_to_image_field"
 *   },
 *   multiple_values = TRUE
 * )
 */
class OptionsSelectStateToImageWidget extends OptionsWidgetBase {

  /**
   * {@inheritdoc}
   */
   public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
     $item = $items[$delta];
     $element = parent::formElement($items, $delta, $element, $form, $form_state);
     $defaultSettings = $this->fieldDefinition->getSetting('default_state_field_value');

     $element['value'] = [
       '#type' => 'select',
       '#options' => $this->getOptions($items->getEntity()),
       '#default_value' => $defaultSettings['value'],
       // Do not display a 'multiple' select box if there is only one option.
       '#multiple' => $this->multiple && count($this->options) > 1,
     ];
     $element['rowId'] = [
         '#type' => 'number',
         '#title' => $this->t('Row ID'),
         '#default_value' => $defaultSettings['rowId'],
         '#required' => TRUE,
         '#min' => 1,
     ];
     $element['columnId'] = [
         '#type' => 'number',
         '#title' => $this->t('Column ID'),
         '#default_value' => $defaultSettings['columnId'],
         '#required' => TRUE,
         '#min' => 1,
     ];
     return $element;
   }

  /**
   * {@inheritdoc}
   */
  protected function sanitizeLabel(&$label) {
    // Select form inputs allow unencoded HTML entities, but no HTML tags.
    $label = Html::decodeEntities(strip_tags($label));
  }

  /**
   * {@inheritdoc}
   */
  protected function supportsGroups() {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  protected function getEmptyLabel() {
    if ($this->multiple) {
      // Multiple select: add a 'none' option for non-required fields.
      if (!$this->required) {
        return $this->t('- None -');
      }
    }
    else {
      // Single select: add a 'none' option for non-required fields,
      // and a 'select a value' option for required fields that do not come
      // with a value selected.
      if (!$this->required) {
        return $this->t('- None -');
      }
      if (!$this->has_value) {
        return $this->t('- Select a value -');
      }
    }
  }

}
