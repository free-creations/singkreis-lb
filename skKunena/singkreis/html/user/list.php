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
 */

defined('_JEXEC') or die();

function voiceToStr($voicenum) {
  switch ($voicenum) {
    case 0: return '';
    case 1: return JText::_('PLG_USER_SKPROFILE_OPTION_VOICE_1');
    case 2: return JText::_('PLG_USER_SKPROFILE_OPTION_VOICE_2');
    case 3: return JText::_('PLG_USER_SKPROFILE_OPTION_VOICE_3');
    case 4: return JText::_('PLG_USER_SKPROFILE_OPTION_VOICE_4');
    default:
      return '';
  }
}

function getVoice($userId) {
  $iid = intval($userId);
  if ($iid == 0) {
    return '';
  }
  $jProfile = JUserHelper::getProfile($iid);
  if (!is_object($jProfile)) {
    return '';
  }
  if (!isset($jProfile->skprofile)) {
    return '';
  }
  $skProfile = $jProfile->skprofile;
  if (!isset($skProfile['voice'])) {
    return '';
  }
  return $voice = voiceToStr($skProfile['voice']);
}

/**
 * Get the user's function.
 * @param type $userId
 * @return string - the user's function. Returns an empty string
 * if the skprofile cannot be accessed, or the function is set
 * as 'keine'.
 */
function getFunction($userId) {
  $iid = intval($userId);
  if ($iid == 0) {
    return '';
  }
  $jProfile = JUserHelper::getProfile($iid);
  if (!is_object($jProfile)) {
    return '';
  }
  if (!isset($jProfile->skprofile)) {
    return '';
  }
  $skProfile = $jProfile->skprofile;
  if (!isset($skProfile['function'])) {
    return '';
  }
  $function = $skProfile['function'];
  if ($function == 'keine') {
    return '';
  }
  return $function;
}
?>

<div class="sk-forum-content-header">
  <h2>Mitglieder und Freunde des Singkreises</h2>
</div>

<div class="table-responsive">

  <table class="sk-forum-alluser-table table-hover">
    <?php
    foreach ($this->users as $user) :

      $profile = KunenaFactory::getUser(intval($user->id));
      $uslavatar = $profile->getAvatarImage('usl_avatar', 'list');
      ?>
      <tr>    
        <td>
          <?php echo!empty($uslavatar) ? $profile->getLink($uslavatar) : '&nbsp;' ?>
        </td>
        <td>
          <?php echo $profile->getLink(); ?>
        </td>
        <td>
          <?php echo $profile->name; ?>
        </td>
        <td>
          <?php echo $user->email ? JHtml::_('email.cloak', $user->email) : '' ?>
        </td>
        <td>
          <?php echo getVoice($user->id) ?>
        </td>
        <td>
          <?php echo getFunction($user->id) ?>
        </td>


      </tr>
    <?php endforeach; ?>
  </table>
</div>



