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
 * Note: we rely on the fact that the plg_user_skprofile is installed.
 */

defined('_JEXEC') or die();

$lang = JFactory::getLanguage();
$extension1 = 'com_users';
$extension2 = 'plg_user_skprofile';
$base_dir = JPATH_SITE;
$reload = false;
$lang->load($extension1, $base_dir, NULL, $reload);
$lang->load($extension2, JPATH_PLUGINS.'/user/skprofile', NULL, $reload);




$skFieldNames = array(
    'voice',
    'address',
    'postal_code',
    'phone',
    'mobile',
    'function',
    'dob',
);
$FieldVals = array();

// retrieve the users (singkreis) profile (if it cannot be found leave NULL)
$skProfile = NULL;
$jProfile = JUserHelper::getProfile($this->user->id);
if (is_object($jProfile)) {
  if (isset($jProfile->skprofile)) {
    $skProfile = $jProfile->skprofile; // skprofile is set, if plg_user_skprofile is installed!
  }
}

// copy skprofile values into $FieldVals (create NULL entry if correspnding value cannot be found)
foreach ($skFieldNames as $n) {
  if ($skProfile) {
    if (isset($skProfile[$n])) {
      $FieldVals[$n] = $skProfile[$n];
    } else {
      $FieldVals[$n] = NULL;
    }
  } else {
    $FieldVals[$n] = NULL;
  }
}

// does this user have a special function
$hasFunction = FALSE;
if ($FieldVals['function']) {
  if ($FieldVals['function'] != 'keine') {
    $hasFunction = TRUE;
  }
}

// translate the voice number into a human readable string
$FieldVals['voice'] = voiceToStr($FieldVals['voice']);

// translate the data of birth
if ($FieldVals['dob']) {
  $FieldVals['dob'] = dobToStr($FieldVals['dob']);
}

// cloak the email address
$FieldVals['email'] = JHtml::_('email.cloak', $this->user->email);

// retrieve user-name from kunena profile
$FieldVals['name'] = $this->profile->name;

// put ellipsis in all fields that are not set
foreach ($FieldVals as $key => $value) {
  if (!$value) {
    $FieldVals[$key] = '&hellip;';
  }
}

/**
 * translates the voice number into a human readable string
 * @param type $voicenum
 * @return type
 */
function voiceToStr($voicenum) {
  switch ($voicenum) {
    case 0: return JText::_('PLG_USER_SKPROFILE_OPTION_VOICE_0');
    case 1: return JText::_('PLG_USER_SKPROFILE_OPTION_VOICE_1');
    case 2: return JText::_('PLG_USER_SKPROFILE_OPTION_VOICE_2');
    case 3: return JText::_('PLG_USER_SKPROFILE_OPTION_VOICE_3');
    case 4: return JText::_('PLG_USER_SKPROFILE_OPTION_VOICE_4');
    default:
      return NULL;
  }
}
/**
 * Translate thge date of birth into birthday. We are polite, 
 * we do not show the year.
 * @param string - $dob the data of birth
 * @return string - the birthday as day month
 */
function dobToStr($dob) {
  if(!isset($dob)){
    // catch empty values, avoiding to show today in such cases.
    return NULL;
  }
  try {
    $date = JFactory::getDate($dob);
    return $date->format('j. F', true, true);
  } catch (Exception $ignored) {
    return NULL;
  }
}
?>

<table class="sk-forum-user-table">

  <tr>
    <td><?php echo JText::_('COM_USERS_PROFILE_USERNAME_LABEL') ?></td>
    <td><?php echo $this->escape($this->name) ?></td> 
  </tr><tr>
    <td><?php echo JText::_('COM_USERS_PROFILE_NAME_LABEL') ?></td>
    <td><?php echo $FieldVals['name'] ?></td> 
  </tr>
  <?php if ($hasFunction): ?>
  </tr><tr>
    <td>Funktion:</td>
    <td><?php echo $FieldVals['function'] ?></td> 
  </tr>
<?php endif; ?>

<tr>
  <td><?php echo JText::_('PLG_USER_SKPROFILE_FIELD_VOICE_LABEL') ?></td>
  <td><?php echo $FieldVals['voice'] ?></td>       
</tr><tr>
  <td><?php echo JText::_('PLG_USER_SKPROFILE_FIELD_ADDRESS1_LABEL') ?></td>
  <td><?php echo $FieldVals['address'] ?></td> 
</tr><tr>
  <td><?php echo JText::_('PLG_USER_SKPROFILE_FIELD_BIRTHDAY_LABEL') ?></td>
  <td><?php echo $FieldVals['dob'] ?></td> 
</tr><tr>
  <td><?php echo JText::_('PLG_USER_SKPROFILE_FIELD_PHONE_LABEL') ?></td>
  <td><?php echo $FieldVals['phone'] ?></td>  
</tr><tr>
  <td><?php echo JText::_('PLG_USER_SKPROFILE_FIELD_MOBILE_LABEL') ?></td>
  <td><?php echo $FieldVals['mobile'] ?></td>    
</tr><tr>
  <td><?php echo JText::_('COM_USERS_PROFILE_EMAIL1_LABEL') ?></td>
  <td><?php echo $FieldVals['email'] ?></td>   
</tr>
</table>


