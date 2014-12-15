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

// import JModelForm
jimport('legacy.model.form');

/**
 * Model for the Singkreis E-Mail Contact Form
 */
class SkcontactModelEmail extends JModelForm {

  public function getForm($data = array(), $loadData = true) {
    // Get the form.
    $form = $this->loadForm('com_skcontact.email', 'email', array('control' => 'jform', 'load_data' => true));

    if (empty($form)) {
      return false;
    }

    return $form;
  }

  protected function loadFormData() {

    $data = (array) JFactory::getApplication()->getUserState('com_skcontact.email.data', array());

    $this->preprocessData('com_skcontact.email', $data);

    return $data;
  }

}
