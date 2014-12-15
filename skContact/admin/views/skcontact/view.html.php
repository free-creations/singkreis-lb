<?php

/*
 * @package     Singkreis.Contact
 * @subpackage  com_skcontact
 * 
 * @copyright Copyright 2014 Harald Postner<harald at free-creations.de>.
 *
 * @license Licensed under the Apache License, Version 2.0 (the "License");
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

jimport('joomla.application.component.view');

/**
 * HTML View class for the Singkreis.Contact Administration component
 * 
 */
class SkcontactViewSkcontact extends JViewLegacy {

  /**
   * Override the display method for the view.
   *
   * @return void
   */
  public function display($tpl = null) {
    $this->addToolbar();
    parent::display();
  }

  /**
   * Add the page title and toolbar.
   *
   * @return void
   */
  protected function addToolbar() {
    JToolBarHelper::title(JText::_('Singkreis Contact Administration'));
    if($this->canEdit()){
      JToolBarHelper::preferences('com_skcontact');
    }
  }

  /**
   * Tests wether the current user is allowed to edit options for this component.
   *
   * @return	JObject
   */
  private function canEdit() {
    $user = JFactory::getUser();
    return $user->authorise('core.edit', 'com_skcontact');
  }

}
