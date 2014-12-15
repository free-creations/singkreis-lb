<?php

/**
 *  
 * @package     Singkreis.Contact
 * @subpackage  com_skcontact
 * 
 * Copyright 2014 Harald Postner<harald at free-creations.de>.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
defined('_JEXEC') or die;

/**
 */
class SkcontactControllerEmail extends JControllerForm {

  /**
   * Constructor. (Overrides parent for easier debugging)
   *
   * @param   array  $config  An optional associative array of configuration settings.
   *
   * @see     JControllerLegacy
   * @throws  Exception
   */
  public function __construct($config = array()) {
    parent::__construct($config);
  }

  public function submit() {


    // Check for request forgeries.
    JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

    $app = JFactory::getApplication();
    $model = $this->getModel('email', '', array('ignore_request' => false));

    // Get the data from POST
    $data = $this->input->post->get('jform', array(), 'array');

    // Get the email address where to send (the contact email defined in the component settings 
    $params = JComponentHelper::getParams('com_skcontact');
    $mail_to = $params->get('params.email');


    // Validate the posted data.
    $form = $model->getForm();

    if (!$form) {
      JError::raiseError(500, $model->getError());

      return false;
    }

    $validate = $model->validate($form, $data);


    if ($validate === false) {
      // --- oops, validation failed
      // Get the validation messages.
      $errors = $model->getErrors();

      // Push up to three validation messages out to the user.
      for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
        if ($errors[$i] instanceof Exception) {
          $app->enqueueMessage($errors[$i]->getMessage(), 'warning');
        } else {
          $app->enqueueMessage($errors[$i], 'warning');
        }
      }

      // Save the data in the session.
      $app->setUserState('com_skcontact.email.data', $data);

      // Redirect back to the contact form.
      $this->setRedirect(JRoute::_('index.php?option=com_skcontact&view=email', false));

      return false;
    }


    // Send the email
    $sent = $this->_sendEmail($data, $mail_to);



    // Set the success message if it was a success
    if (!($sent instanceof Exception)) {
      $msg = JText::_('COM_SKCONTACT_EMAIL_THANKS');
    } else {
      $msg = '';
    }

    // Save the data for a thank-you message. 
    $app->setUserState('com_skcontact.thankyou.data', $data);
    // Flush the email-data from the session 
    $app->setUserState('com_skcontact.email.data', null);


    // Redirect to the thank-you message
    $this->setRedirect(JRoute::_('index.php?option=com_skcontact&view=thankyou'), $msg);



    return true;
  }

  private function _sendEmail($data, $mail_to) {

    $copy_email_activated = true; // always activated
   

    $app = JFactory::getApplication();

    $mailfrom = $app->get('mailfrom');
    $fromname = $app->get('fromname');
    $sitename = $app->get('sitename');

    $name = $data['contactFields']['contact_name'];
    $email = JStringPunycode::emailToPunycode($data['contactFields']['contact_email']);
    $subject = $data['contactFields']['contact_subject'];
    $body = $data['contactFields']['contact_message'];

    // Prepare email body
    $prefix = JText::sprintf('COM_SKCONTACT_ENQUIRY_TEXT', JUri::base());
    $body = $prefix . "\n" . $name . ' <' . $email . '>' . "\r\n\r\n" . stripslashes($body);

    $mail = JFactory::getMailer();
    $mail->addRecipient($mail_to);
    $mail->addReplyTo(array($email, $name));
    $mail->setSender(array($mailfrom, $fromname));
    $mail->setSubject($sitename . ': ' . $subject);
    $mail->setBody($body);
    $sent = $mail->Send();

    // If we are supposed to copy the sender, do so.
    // Check whether email copy function activated
    if ($copy_email_activated == true && !empty($data['contactFields']['contact_email_copy'])) {
      $copytext = JText::sprintf('COM_SKCONTACT_COPYTEXT_OF', $sitename);
      $copytext .= "\r\n\r\n" . $body;
      $copysubject = JText::sprintf('COM_SKCONTACT_COPYSUBJECT_OF', $subject);

      $mail = JFactory::getMailer();
      $mail->addRecipient($email);
      $mail->addReplyTo(array($email, $name));
      $mail->setSender(array($mailfrom, $fromname));
      $mail->setSubject($copysubject);
      $mail->setBody($copytext);
      $sent = $mail->Send();
    }

    return $sent;
  }

}
