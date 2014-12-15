<?php

/*
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
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * The directions how to get to the Singkreis Local
 */
class skcontactViewThankyou extends JViewLegacy {

  protected $emailSent = null;

  /**
   * Constructor
   *
   * @param   array  $config  A named configuration array for object construction.<br/>
   *                          name: the name (optional) of the view (defaults to the view class name suffix).<br/>
   *                          charset: the character set to use for display<br/>
   *                          escape: the name (optional) of the function to use for escaping strings<br/>
   *                          base_path: the parent path (optional) of the views directory (defaults to the component folder)<br/>
   *                          template_plath: the path (optional) of the layout directory (defaults to base_path + /views/ + view name<br/>
   *                          helper_path: the path (optional) of the helper files (defaults to base_path + /helpers/)<br/>
   *                          layout: the layout (optional) to use to display the view<br/>
   *
   * @since   12.2
   */
  public function __construct($config = array()) {
    parent::__construct($config);
  }

  /**
   * Execute and display a template script.
   *
   * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
   *
   * @return  mixed  A string if successful, otherwise a Error object.
   */
  public function display($tpl = null) {

    // retrieve the email just sent from the User's session, so we display it for confirmation.
    $this->emailSent = (array) JFactory::getApplication()->getUserState('com_skcontact.thankyou.data', array());

    return parent::display($tpl);
  }

}
