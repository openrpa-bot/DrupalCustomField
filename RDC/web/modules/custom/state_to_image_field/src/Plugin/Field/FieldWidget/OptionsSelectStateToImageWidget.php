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
//var_dump($element);
     $element['value'] = [
       '#type' => 'select',
       '#options' => $this->getOptions($items->getEntity()),
       '#default_value' => $defaultSettings['value'],
       '#required' => TRUE,
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
     $element['#element_validate'][0] = [static::class, 'myValidateElement'];
     return $element;
}

public static function myValidateElement(array $element, FormStateInterface $form_state) {


    if ($element['value']['#required'] && $element['value']['#value'] == '_none') {
    //var_dump($element['value']['#required']);return;
      $form_state->setError($element, new TranslatableMarkup('@name field is required.', ['@name' => $element['#title']]));
    }
var_dump(is_array($element['value']['#value']));return;
$form_state->setError('Error');
    // Massage submitted form values.
    // Drupal\Core\Field\WidgetBase::submit() expects values as
    // an array of values keyed by delta first, then by column, while our
    // widgets return the opposite.

    if (is_array($element['value']['#value'])) {
      $values = array_values($element['value']['#value']);
    }
    else {
      $values = [$element['value']['#value']];
    }

    // Filter out the 'none' option. Use a strict comparison, because
    // 0 == 'any string'.
    $index = array_search('_none', $values, TRUE);
    var_dump($values);return;
    if ($index !== FALSE) {
      unset($values[$index]);
    }

    // Transpose selections from field => delta to delta => field.
    $items = [];
    foreach ($values as $value) {
      $items[] = [$element['#key_column'] => $value];
    }

    $form_state->setValueForElement($element, $items);
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
