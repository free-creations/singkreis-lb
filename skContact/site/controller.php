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
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * Hello World Component Controller
 */
class SkcontactController extends JControllerLegacy {

  /**
   * Method to get a reference to the current view and load it if necessary.
   *
   * @param   string  $name    The view name. Optional, defaults to the controller name.
   * @param   string  $type    The view type. Optional.
   * @param   string  $prefix  The class prefix. Optional.
   * @param   array   $config  Configuration array for view. Optional.
   *
   * @return  JViewLegacy  Reference to the view or an error.
   *
   *
   * @since   12.2
   * @throws  Exception
   */
  public function getView($name = '', $type = '', $prefix = '', $config = array()) {
    // the email-form is the default view.
    if (empty($name) || ($name == 'skcontact')) {
      $name = 'email';
    }     
    $v = parent::getView($name, $type, $prefix, $config);
    $v->set('emailUri', JRoute::_('index.php?option=com_skcontact&view=email'));
    $v->set('impressumUri', JRoute::_('index.php?option=com_skcontact&view=impressum'));
    $v->set('howtogetthereUri', JRoute::_('index.php?option=com_skcontact&view=howtogetthere'));
    $v->set('privacyUri', JRoute::_('index.php?option=com_skcontact&view=privacy'));
    $v->set('thankyouUri', JRoute::_('index.php?option=com_skcontact&view=thankyou'));
    return $v;
  }

}
