<?php
namespace Drupal\my_module\Form;

use Drupal\Core\Form\FormBase;                   // Базовый класс Form API
use Drupal\Core\Form\FormStateInterface;              // Класс отвечает за обработку данных

/**
 * @see \Drupal\Core\Form\FormBase
 */
class NewForm extends FormBase {
    // метод, который отвечает за саму форму - кнопки, поля
    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Enter your full name'),
            '#description' => $this->t('No numbers are allowed in this field'),
            '#required' => TRUE,
        ];

        $form['mail'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Enter your email'),
            '#required' => TRUE,
        ];

        $form['phone'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Enter your phone'),
            '#required' => TRUE,
        ];

        $form['city'] = [
            '#type' => 'select',
            '#title' => $this->t('Select your city'),
            '#required' => TRUE,
        ];

        // Add a submit button that handles the submission of the form.
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Send the form'),
        ];

        return $form;
    }


    public function getFormId() {
        return 'my_module_mymodule_form';
    }


    public function validateForm(array &$form, FormStateInterface $form_state) {
        $title = $form_state->getValue('title');
        $is_number = preg_match("/[\d]+/", $title, $match);

        if ($is_number > 0) {
            $form_state->setErrorByName('title', $this->t('Name field can\'t have a number'));
        }

        $mail = $form_state->getValue('mail');
        $check = preg_match("/^[a-zA-Z0-9\.\-\_\@\*]{4,30}$/", $mail, $match);

        if ($check < 0) {
            $form_state->setErrorByName('mail', $this->t('Wrong email'));
        }

        $phone = $form_state->getValue('phone');
        $checkPhone = preg_match("/^\+{1}[0-9]{6,15}$/", $phone, $match);

        if ($checkPhone < 0) {
            $form_state->setErrorByName('mail', $this->t('Enter correct phone like in the example: +380669993377'));
        }
    }

    // действия по сабмиту
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $title = $form_state->getValue('title');
        drupal_set_message(t('Вы ввели: %title.', ['%title' => $title]));
    }
}