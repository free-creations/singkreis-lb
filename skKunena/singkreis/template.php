<?php

/*
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
 *
 * @package Kunena.Template.singkreis
 *
 * changes:
 *   Harald 17.10.2014: renamed class KunenaTemplateBlueEagle to KunenaTemplatesingkreis.
 * 
 * Harald 10.11.2014: make all buttons default Bootstrap buttons.
 * */
defined('_JEXEC') or die();

class KunenaTemplatesingkreis extends KunenaTemplate {

  // Try to find missing files from the following parent templates:
  protected $default = array('blue_eagle');
  protected $css_compile = false;
  protected $userClasses = array(
      'kwho-',
      'admin' => 'kwho-admin',
      'globalmod' => 'kwho-globalmoderator',
      'moderator' => 'kwho-moderator',
      'user' => 'kwho-user',
      'guest' => 'kwho-guest',
      'banned' => 'kwho-banned',
      'blocked' => 'kwho-blocked'
  );
  public $categoryIcons = array('kreadforum', 'kunreadforum');

  public function initialize() {
    KunenaFactory::loadLanguage('com_kunena.tpl_blue_eagle');

    // Enable legacy mode
    KunenaTemplateLegacy::load();

    require_once JPATH_SITE . '/' . $this->getFile('initialize.php');
    // $this->addStyleSheet('css/kunena.20.css');
    // Toggler language strings
    JFactory::getDocument()->addScriptDeclaration('// <![CDATA[
var kunena_toggler_close = "' . JText::_('COM_KUNENA_TOGGLER_COLLAPSE', true) . '";
var kunena_toggler_open = "' . JText::_('COM_KUNENA_TOGGLER_EXPAND', true) . '";
// ]]>');
  }

  public function getButton($link, $name, $scope, $type, $id = null) {
    $types = array('communication' => 'comm', 'user' => 'user', 'moderation' => 'mod', 'permanent' => 'mod');
    $names = array('unsubscribe' => 'subscribe', 'unfavorite' => 'favorite', 'unsticky' => 'sticky', 'unlock' => 'lock', 'create' => 'newtopic',
        'quickreply' => 'reply', 'quote' => 'quote', 'edit' => 'edit', 'permdelete' => 'delete',
        'flat' => 'layout-flat', 'threaded' => 'layout-threaded', 'indented' => 'layout-indented',
        'list' => 'reply');

    $text = JText::_("COM_KUNENA_BUTTON_{$scope}_{$name}");
    $title = JText::_("COM_KUNENA_BUTTON_{$scope}_{$name}_LONG");
    if ($title == "COM_KUNENA_BUTTON_{$scope}_{$name}_LONG")
      $title = '';
    if ($id)
      $id = 'id="' . $id . '"';

    if (isset($types[$type]))
      $type = $types[$type];
    if ($name == 'quickreply')
      $type .= ' kqreply';
    if (isset($names[$name]))
      $name = $names[$name];

    return <<<HTML
<a $id class="btn btn-default kbutton{$type} " href="{$link}" rel="nofollow" title="{$title}">
	<span class="{$name}"><span>{$text}</span></span>
</a>
HTML;
  }

  public function getIcon($name, $title = '') {
    return '<span class="kicon ' . $name . '" title="' . $title . '"></span>';
  }

  public function getImage($image, $alt = '') {
    return '<img src="' . $this->getImagePath($image) . '" alt="' . $alt . '" />';
  }

  public function getPaginationListRender($list) {

    $html = '<ul class="pagination">';

    if ($list['previous']['active']) {
      $html .= $list['previous']['data'];
    } else {
      $html .= '<li class="disabled"><span>'
              . JText::_('JPREV')
              . '</span></li>';
    }
    $last = 0;
    foreach ($list['pages'] as $i => $page) {
      if ($last + 1 != $i) {
        $html .= '<li class="disabled"><span>...</span></li>';
      }
      $html .= $page['data'];
      $last = $i;
    }


    if ($list['next']['active']) {
      $html .= $list['next']['data'];
    } else {
      $html .= '<li class="disabled"><span>'
              . JText::_('JNEXT')
              . '</span></li>';
    }
    $html .= '</ul>';
    return $html;
  }

  public function getPaginationItemActive($item) {
    return '<li><a href="'
            . $this->fixFirstPageProblem($item->link) 
            . '">' 
            . $item->text 
            . '</a></li>';
  }

  public function getPaginationItemInactive($item) {
    return '<li class="active"><span>'
            . $item->text
            . '</span></li>';
  }

  /**
   * There is a problem with the pagination since Joomla version 3.3.4.
   * For more details see:
   * http://forum.joomla.org/viewtopic.php?f=706&t=860006&sid=61323647468868aba41e6d747a61015f
   * 
   * see also:
   * https://github.com/joomla/joomla-cms/pull/4488
   * 
   * @param String $link the URL of a page in the pagination
   * @return String the given link, but for the first page "?limitstart=0" is
   * appended.
   */
  private function fixFirstPageProblem($link) {
    if (strpos($link, '?start') === false) {
      if (strpos($link, '?limitstart') === false) {
        // neither "start" nor "limitstart" is given => add "limitstart" 
        return $link . '?limitstart=0';
      }
    }
    // in all other cases, return as is.
    return $link;
  }

}
