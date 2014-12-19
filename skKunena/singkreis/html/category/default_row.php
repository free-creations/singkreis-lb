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

// Disable caching
$this->cache = false;

// Collect info to show one topic row
$href = KunenaRoute::_($this->topic->getUri());
$heading = $this->topic->subject;
$teaser = KunenaHtmlParser::stripBBCode($this->topic->first_post_message, 200) . '...';
$replyCount = $this->formatLargeNumber(max(0, $this->topic->getTotal() - 1));
$initiator = $this->topic->getFirstPostAuthor()->name;
$topicStartTime = KunenaDate::getInstance($this->topic->first_post_time)->toKunena('config_post_dateformat');
$isNew = $this->topic->unread;
?>

<a href="<?php echo $href ?>" class="list-group-item clearfix">

  <h3 class="list-group-item-heading">   
    <?php echo $heading ?>

    <?php if ($isNew): ?>
      <span class="badge sk-forum-new"> Neu</span>    
    <?php endif ?>
  </h3>

  <div class="list-group-item-text">
    <p>
      <span class="sk-forum-msg-author"> 
        <?php echo $initiator ?>        - 
        <em><?php echo $topicStartTime ?></em>      
      </span>

    </p>
    <p>
      <?php echo $teaser ?>
    </p>
    <p>

      <?php if ($replyCount > 0): ?>
        <span class="badge pull-right">
          <?php echo $replyCount ?>
          <?php echo JText::_('COM_KUNENA_GEN_REPLIES') ?>
        </span>
      <?php endif ?>
    </p>
  </div>
</a>
