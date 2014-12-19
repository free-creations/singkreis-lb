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

JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.keepalive');

$this->document->addScriptDeclaration('config_attachment_limit = ' . (int) $this->config->attachment_limit);

$editor = KunenaBbcodeEditor::getInstance();
$editor->initialize('id');

include_once (KPATH_SITE . '/lib/kunena.bbcode.js.php');
include_once (KPATH_SITE . '/lib/kunena.special.js.php');

$this->k = 0;
?>
<!-- Start: topic.edit -->


<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena') ?>" method="post" class="postform form-validate" id="postform" name="postform" enctype="multipart/form-data" onsubmit="return myValidate(this);">
  <input type="hidden" name="view" value="topic" />
  <?php if ($this->message->exists()) : ?>
    <input type="hidden" name="task" value="edit" />
    <input type="hidden" name="mesid" value="<?php echo intval($this->message->id) ?>" />
  <?php else: ?>
    <input type="hidden" name="task" value="post" />
    <input type="hidden" name="parentid" value="<?php echo intval($this->message->parent) ?>" />
  <?php endif; ?>
  <?php if (!isset($this->selectcatlist)) : ?>
    <input type="hidden" name="catid" value="<?php echo intval($this->message->catid) ?>" />
  <?php endif; ?>
  <?php echo JHtml::_('form.token'); ?>      

  <div class="sk-forum-newsubject-header">
    <h2><?php echo $this->escape($this->title) ?></h2>

    <div class="sk-forum-category-selector">
      <?php if (isset($this->selectcatlist)): ?>
        <?php echo JText::_('COM_KUNENA_CATEGORY') . ': ' ?>
        <?php echo $this->selectcatlist ?>
      <?php endif; ?>
    </div>
  </div>


  <div class="sk-forum-newsubject-subject">
    <span>Überschrift:</span>
    <input type="text" class="postinput required" 
           name="subject" 
           id="subject" 
           size="35"                                  
           maxlength="<?php echo $this->escape($this->config->maxsubject); ?>" 
           value="<?php echo $this->escape($this->message->subject); ?>" />
  </div>

  <?php
  // Show bbcode editor
  $this->displayTemplateFile('topic', 'edit', 'editor');
  ?>


  <!-- attachments --->
  <?php if ($this->allowedExtensions) : ?>

    <div class="panel panel-default  ">
      <div class="panel-heading">
        <div class="panel-title clearfix">
          <span class="glyphicon glyphicon-paperclip"> </span> 
          Anhänge / Bilder <small class="pull-right">Zuerst Datei auswählen, dann anhängen.</small>
        </div>
      </div>


      <div id="kpost-attachments" class="panel-body">


        <div id="kattachment-id" class="form-inline kattachment">

          <span class="kattachment-id-container"></span>

          <div class="form-group">
            <div class="input-group">

              <input class="form-control kfile-input-textbox" type="text" readonly="readonly" />

              <span class="input-group-btn kfile-hide hasTip" title="<?php echo JText::_('COM_KUNENA_FILE_EXTENSIONS_ALLOWED') ?>::<?php echo $this->escape(implode(', ', $this->allowedExtensions)) ?>" >
                <span class="btn btn-default sk-input-overlay ">
                  Datei auswählen&hellip;
                  <input id="kupload" class="kfile-input" name="kattachment" type="file" />
                </span>
              </span>
            </div>
          </div>
          <ul style="display: inline; list-style-type: none; margin: 0; padding: 0;">
            <li style="display: inline">
              <a href="#" class="btn btn-primary kattachment-insert" style="display: none">
                <span class="glyphicon glyphicon-paperclip"> </span>
                Anhängen
              </a>
            </li>
            <li style="display: inline">
              <a href="#" class="btn btn-default kattachment-remove" style="display: none">
                <i class="fa fa-times"></i><?php echo ' ' . JText::_('COM_KUNENA_CANCEL') ?>
              </a>
            </li>
          </ul>
          <hr/>
        </div>

        <?php $this->displayAttachments($this->message); ?>

      </div>    
    </div>
  <?php endif; ?>


  <div class="btn-group">
    <button type="submit" name="ksubmit" class="btn btn-primary"
            value="<?php echo (' ' . JText::_('COM_KUNENA_SUBMIT') . ' '); ?>"
            title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_SUBMIT')); ?>" >
      <i class="fa fa-check"></i><?php echo (' ' . JText::_('COM_KUNENA_SUBMIT') . ' '); ?>
    </button>
    <button  type="button" name="preview" class="btn btn-default"
             onclick="kToggleOrSwapPreview('kbbcode-preview-bottom')"
             value="<?php echo (' ' . JText::_('COM_KUNENA_PREVIEW') . ' '); ?>"
             title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_PREVIEW')); ?>"  >
      <i class="fa fa-search"></i>
      <?php echo ' ' . (JText::_('COM_KUNENA_PREVIEW')); ?>
    </button>
    <button type="button" name="cancel" class="btn btn-default"
            value="<?php echo (' ' . JText::_('COM_KUNENA_CANCEL') . ' '); ?>"
            onclick="window.history.back();"
            title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_CANCEL')); ?>"  >
      <i class="fa fa-times"></i><?php echo ' ' . JText::_('COM_KUNENA_CANCEL') ?>
    </button>
  </div>

  <!-- Hidden preview placeholder -->
  <div class="sk-forum-newsubject-previev">    
    <div id="kbbcode-preview" >
    </div>
  </div>


  <?php
  if (!$this->message->name) {
    echo '<script type="text/javascript">document.postform.authorname.focus();</script>';
  } else if (!$this->topic->subject) {
    echo '<script type="text/javascript">document.postform.subject.focus();</script>';
  } else {
    echo '<script type="text/javascript">document.postform.message.focus();</script>';
  }
  ?>
</form>

<!-- End: topic.edit -->


