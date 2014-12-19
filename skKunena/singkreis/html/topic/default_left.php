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

$catid = $this->state->get('item.catid');
$id = $this->topic->id;
$mesid = $this->message->id;

// string for the link to the edit and reply actions.
$layout = "index.php?option=com_kunena&view=topic&layout=%s&catid={$catid}&id={$id}&mesid={$mesid}";
$relpyLink = sprintf($layout, 'reply');
$editLink = sprintf($layout, 'edit');

// within a thread (topic) we'll flag all messages that appeared within th last two week as "new"
$messageTime = intval($this->message->time);
date_default_timezone_set('UTC');
$graceTime = strtotime("-14 days"); // two weeks before now

$isNew = ($messageTime > $graceTime);
?>
<!-- Start: topic.default_left -->
<div class="list-group-item clearfix">
  <?php
  $avatar = $this->profile->getAvatarImage('sk-forum-msg-avatar', 'post');
  if ($avatar) {
    echo $this->profile->getLink($avatar);
  }
  ?>

  <h3 class="list-group-item-heading">
    <?php echo $this->displayMessageField('subject') ?>
    <?php if ($isNew): ?>
      <span class="badge sk-forum-new"> Neu</span> 
    <?php endif ?>
  </h3>

  <div class="list-group-item-text">
    <div class="sk-forum-msg-author">
      <?php echo $this->profile->name; ?>    
      &nbsp;&dash;&nbsp;
      <i>
        <?php echo KunenaDate::getInstance($this->message->time)->toKunena('config_post_dateformat') ?>
      </i>
    </div>
    <div class="sk-forum-msg-text">
      <?php $this->displayMessageContents() ?>

      <div class="pull-right" style="margin-top: 1em" >

        <?php if ($this->message->authorise('edit')) : ?> 
          <a href="<?php echo $editLink ?>"
             class="btn  btn-primary"
             rel="nofollow" 
             title="<?php echo JText::_("COM_KUNENA_BUTTON_MESSAGE_EDIT_LONG") ?>">
            <span class="fa fa-pencil-square-o fa-lg"> </span>
            Ändern
          </a>
        <?php endif; ?>


        <?php if ($this->message->authorise('reply')) : ?>
          <a href="<?php echo $relpyLink ?>" 
             class="btn btn-default"
             rel="nofollow" 
             title="<?php echo JText::_('COM_KUNENA_BUTTON_MESSAGE_REPLY_LONG') ?>">
            <span class="fa fa-pencil-square-o fa-lg"> </span>
            Antworten
          </a>
        <?php else : ?>
          <a href="<?php echo $relpyLink ?>" 
             class="btn btn-default disabled"            
             title="<?php echo JText::_('COM_KUNENA_BUTTON_MESSAGE_REPLY_LONG') ?>">
            <span class="fa fa-pencil-square-o fa-lg"> </span>
            Antworten
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<!-- End: topic.default_left -->


