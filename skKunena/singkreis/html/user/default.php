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
$thisUser = JFactory::getUser();
$profileEditUri = JRoute::_('index.php?option=com_users&view=profile&layout=edit');
$isMyProfile = ($this->user->id == $thisUser->id);
?>
<div class="sk-forum-content-header">
  <h2>
    <?php echo JText::_('COM_KUNENA_USER_PROFILE'); ?> 
    <em><?php echo $this->user->name; ?></em>
  </h2>

</div>


<div class="col-sm-2">
  <?php
  $this->displaySummary();
  if ($isMyProfile):
    $href = $this->profile->getURL(true, 'edit');
    ?>
    <a href="<?php echo $href; ?>"
       class="btn btn-primary"> 
      <span class="glyphicon glyphicon-picture"></span> Ändern
    </a>
  <?php endif; ?>

</div>
<div class="col-sm-10">
  <?php
  $this->displayTab();
  if ($isMyProfile):
    ?>
    <a href="<?php echo $profileEditUri ?>"
       class="btn btn-primary"> 
      <span class="glyphicon glyphicon-pencil"></span> Mein Profil ändern
    </a>
  <?php endif; ?>
</div>







