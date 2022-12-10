<?php

namespace Drupal\commerce_ticketing\Form;

use Drupal\commerce_order\Entity\Order;
use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Form controller for the commerce ticket entity edit forms.
 */
class CommerceTicketForm extends ContentEntityForm {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {

    $form = parent::form($form, $form_state);

    /** @var \Drupal\commerce_ticketing\CommerceTicketInterface $ticket */
    $ticket = $this->entity;
    $order_id = $ticket->get('order_id')->target_id;
    if (!$order_id) {
      $order_id = $this->getRouteMatch()->getRawParameter('commerce_order');
      $ticket->set('order_id', $order_id);
    }

    /** @var \Drupal\commerce_order\Entity\OrderInterface $order */
    $order = Order::load($order_id);
    $line_items = [];
    foreach ($order->getItems() as $item) {
      $line_items[$item->id()] = implode(', ', [$item->id(), $item->label()]);
    }

    $form['order_item_id']['#title'] = $this->t('Related order item');
    $form['order_item_id']['#type'] = 'select';
    $form['order_item_id']['#required'] = TRUE;
    $form['order_item_id']['#default_value'] = $ticket->getOrderItemId() ?? '';
    $form['order_item_id']['#options'] = $line_items;

    $form['ticket_number']['widget'][0]['value']['#description'] = $this->t(
      'The ticket number will be autogenerated based on the selected number pattern.'
    );

    if (!empty($form['ticket_number']['widget'][0]['value']['#default_value'])) {
      $form['ticket_number']['widget'][0]['value']['#disabled'] = TRUE;
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    /** @var \Drupal\commerce_ticketing\CommerceTicketInterface $entity */
    $entity = $this->getEntity();

    /** @var \Drupal\commerce_order\Entity\OrderInterface $order */
    $order = $entity->getOrder();
    // Update backreference on order.
    $order->save();

    if ($order_item_id = $form_state->getValue('order_item_id')) {
      $entity->set('order_item_id', $order_item_id);
    }

    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()
        ->addStatus($this->t('New commerce ticket %label has been created.', $message_arguments));
      $this->logger('commerce_ticketing')
        ->notice('Created new commerce ticket %label', $logger_arguments);
    }
    else {
      $this->messenger()
        ->addStatus($this->t('The commerce ticket %label has been updated.', $message_arguments));
      $this->logger('commerce_ticketing')
        ->notice('Updated new commerce ticket %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.commerce_ticket.collection', ['commerce_order' => $order->id()]);
  }

}
