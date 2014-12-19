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
?>
<form action="<?php echo KunenaRoute::_('index.php?option=com_kunena') ?>" method="post" name="kuserform" class="form-validate" enctype="multipart/form-data">
  <input type="hidden" name="view" value="user" />
  <input type="hidden" name="task" value="save" />
  <input type="hidden" name="userid" value="<?php echo $this->user->id ?>" />
  <?php echo JHtml::_('form.token'); ?>

  <?php $this->displayEditAvatar(); ?>
  
  <div class="btn-group">
    <button type="submit" class="btn btn-primary"
            title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_SUBMIT')); ?>" >
      <i class="fa fa-check"></i><?php echo JText::_('COM_KUNENA_SAVE'); ?>
    </button>

    <button type="button" name="cancel" class="btn btn-default"
            value="<?php echo (' ' . JText::_('COM_KUNENA_CANCEL') . ' '); ?>"
            onclick="window.history.back();"
            title="<?php echo (JText::_('COM_KUNENA_EDITOR_HELPLINE_CANCEL')); ?>"  >
      <i class="fa fa-times"></i><?php echo ' ' . JText::_('COM_KUNENA_CANCEL') ?>
    </button>
  </div>

</form>