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

// Kunena bbcode editor
?>

<div class="sk-forum-newsubject-message">


  <ul id="kbbcode-toolbar" class="sk-kbbcode-toolbar">
    <li>
      <script type="text/javascript">
        document.write('<?php echo JText::_('COM_KUNENA_BBCODE_EDITOR_JAVASCRIPT_LOADING', true) ?>')
      </script>
      <noscript><?php echo JText::_('COM_KUNENA_BBCODE_EDITOR_JAVASCRIPT_DISABLED') ?></noscript>
    </li>
  </ul>

  <div class="sk-forum-editor-popup-container">
    <!--  Font Size Options/Examples -->  
    <div id="kbbcode-size-options" class="sk-forum-editor-popup">
      <div class="sk-forum-editor-code-size-options" >
        <span class="kmsgtext-xs" title='[size=1]'
              onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_FONTSIZE_XS', true); ?>')">&nbsp;<?php
                echo JText::_('COM_KUNENA_EDITOR_SIZE_SAMPLETEXT');
                ?>&nbsp;</span>
        <span class="kmsgtext-s" title='[size=2]'
              onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_FONTSIZE_S', true); ?>')">&nbsp;<?php
                echo JText::_('COM_KUNENA_EDITOR_SIZE_SAMPLETEXT');
                ?>&nbsp;</span>
        <span class="kmsgtext-m" title='[size=3]'
              onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_FONTSIZE_M', true); ?>')">&nbsp;<?php
                echo JText::_('COM_KUNENA_EDITOR_SIZE_SAMPLETEXT');
                ?>&nbsp;</span>
        <span class="kmsgtext-l" title='[size=4]'
              onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_FONTSIZE_L', true); ?>')">&nbsp;<?php
                echo JText::_('COM_KUNENA_EDITOR_SIZE_SAMPLETEXT');
                ?>&nbsp;</span>
        <span class="kmsgtext-xl" title='[size=5]'
              onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_FONTSIZE_XL', true); ?>')">&nbsp;<?php
                echo JText::_('COM_KUNENA_EDITOR_SIZE_SAMPLETEXT');
                ?>&nbsp;</span>
        <span class="kmsgtext-xxl" title='[size=6]'
              onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_FONTSIZE_XXL', true); ?>')">&nbsp;<?php
                echo JText::_('COM_KUNENA_EDITOR_SIZE_SAMPLETEXT');
                ?>&nbsp;</span>
      </div>
    </div>
    <!--  Color Options/Examples --> 
    <div id="kbbcode-color-options" class="sk-forum-editor-popup" >   
      <div class="sk-forum-editor-color-options" >       
        <script type="text/javascript">kGenerateColorPalette('4%', '15px');</script>
      </div>      
    </div>

    <!-- Link Options --->
    <div id="kbbcode-link-options" class="sk-forum-editor-popup">
      <?php echo JText::_('COM_KUNENA_EDITOR_LINK_URL'); ?>&nbsp;
      <input id="kbbcode-link_url" name="url" type="text" size="40" value="http://"
             onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_LINKURL', true); ?>')" />
      <?php echo JText::_('COM_KUNENA_EDITOR_LINK_TEXT'); ?>&nbsp;
      <input name="text2" id="kbbcode-link_text" type="text" size="30" maxlength="150"
             onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_LINKTEXT', true); ?>')" />
      <input type="button" name="insterLink" value="<?php echo JText::_('COM_KUNENA_EDITOR_INSERT'); ?>"
             onclick="kbbcode.focus().replaceSelection('[url=' + document.id('kbbcode-link_url').get('value') + ']' + document.id('kbbcode-link_text').get('value') + '[/url]', false);
                 kToggleOrSwap('kbbcode-link-options');"
             onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_LINKAPPLY', true); ?>')" />
    </div>

    <!-- Image-link options -->
    <div id="kbbcode-image-options" class="sk-forum-editor-popup">
      <?php echo JText::_('COM_KUNENA_EDITOR_IMAGELINK_SIZE'); ?>&nbsp;
      <input id="kbbcode-image_size" name="size" type="text" size="10" maxlength="10"
             onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_IMAGELINKSIZE', true); ?>')" />
      <?php echo JText::_('COM_KUNENA_EDITOR_IMAGELINK_URL'); ?>&nbsp;
      <input name="url2" id="kbbcode-image_url" type="text" size="40" value="http://"
             onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_IMAGELINKURL', true); ?>')" />&nbsp;
      <input type="button" name="Link" value="<?php echo JText::_('COM_KUNENA_EDITOR_INSERT'); ?>" onclick="kInsertImageLink()"
             onmouseover="document.id('helpbox').set('value', '<?php echo JText::_('COM_KUNENA_EDITOR_HELPLINE_IMAGELINKAPPLY', true); ?>')" />
    </div>

    <?php
    if ($this->config->showvideotag) {
      ?>

      <div id="kbbcode-video-options" class="sk-forum-editor-popup"><?php
        echo JText::_('COM_KUNENA_EDITOR_VIDEO_SIZE');
        ?><input id="kvideosize"
               name="videosize" type="text" size="5" maxlength="5"
               onmouseover="document.id('helpbox').set('value', '<?php
               echo JText::_('COM_KUNENA_EDITOR_HELPLINE_VIDEOSIZE', true);
               ?>')" />
               <?php
               echo JText::_('COM_KUNENA_EDITOR_VIDEO_WIDTH');
               ?><input id="kvideowidth" name="videowidth"
               type="text" size="5" maxlength="5"
               onmouseover="document.id('helpbox').set('value', '<?php
               echo JText::_('COM_KUNENA_EDITOR_HELPLINE_VIDEOWIDTH', true);
               ?>')" />
               <?php
               echo JText::_('COM_KUNENA_EDITOR_VIDEO_HEIGHT');
               ?><input id="kvideoheight"
               name="videoheight" type="text" size="5" maxlength="5"
               onmouseover="document.id('helpbox').set('value', '<?php
               echo JText::_('COM_KUNENA_EDITOR_HELPLINE_VIDEOHEIGHT', true);
               ?>')" /> <br />
               <?php
               echo JText::_('COM_KUNENA_EDITOR_VIDEO_PROVIDER');
               ?> <select id="kvideoprovider"
                name="provider" class="kbutton"
                onmouseover="document.id('helpbox').set('value', '<?php
                echo JText::_('COM_KUNENA_EDITOR_HELPLINE_VIDEOPROVIDER', true);
                ?>')">
                  <?php
                  $vid_provider = array('', 'Bofunk', 'Break', 'Clipfish', 'Dailymotion', 'DivX,divx]http://', 'Flash,flash]http://', 'FlashVars,flashvars param=]http://', 'MediaPlayer,mediaplayer]http://', 'Metacafe', 'MySpace', 'QuickTime,quicktime]http://', 'RealPlayer,realplayer]http://', 'RuTube', 'Sapo', 'Streetfire', 'Veoh', 'Videojug', 'Vimeo', 'Wideo.fr', 'YouTube', 'Youku');
                  foreach ($vid_provider as $vid_type) {
                    $vid_type = explode(',', $vid_type);
                    echo '<option value = "' . (!empty($vid_type [1]) ? $this->escape($vid_type [1]) : JString::strtolower($this->escape($vid_type [0])) . '') . '">' . $this->escape($vid_type [0]) . '</option>';
                  }
                  ?>
        </select> <?php
        echo JText::_('COM_KUNENA_EDITOR_VIDEO_ID');
        ?><input id="kvideoid"
               name="videoid" type="text" size="11" maxlength="30"
               onmouseover="document.id('helpbox').set('value', '<?php
               echo JText::_('COM_KUNENA_EDITOR_HELPLINE_VIDEOID', true);
               ?>')" />
        <input id="kbutton_addvideo1" type="button" name="Video" accesskey="p"
               onclick="kInsertVideo1()"
               value="<?php
               echo JText::_('COM_KUNENA_EDITOR_VIDEO_INSERT');
               ?>"
               onmouseover="document.id('helpbox').set('value', '<?php
               echo JText::_('COM_KUNENA_EDITOR_HELPLINE_VIDEOAPPLY1', true);
               ?>')" /><br />
               <?php
               echo JText::_('COM_KUNENA_EDITOR_VIDEO_URL');
               ?><input id="kvideourl" name="videourl"
               type="text" size="30" maxlength="250" value="http://"
               onmouseover="document.id('helpbox').set('value', '<?php
               echo JText::_('COM_KUNENA_EDITOR_HELPLINE_VIDEOURL', true);
               ?>')" />
        <input id="kbutton_addvideo2" type="button" name="Video" accesskey="p"
               onclick="kInsertVideo2()"
               value="<?php
               echo JText::_('COM_KUNENA_EDITOR_VIDEO_INSERT');
               ?>"
               onmouseover="document.id('helpbox').set('value', '<?php
               echo JText::_('COM_KUNENA_EDITOR_HELPLINE_VIDEOAPPLY2', true);
               ?>')" />
      </div>

      <?php
    }
    ?>



  </div>


  <?php if (!$this->config->disemoticons) : ?>
    <div id="smilie"><?php
      $emoticons = KunenaHtmlParser::getEmoticons(0, 1);
      foreach ($emoticons as $emo_code => $emo_url) {
        echo '<img class="btnImage" src="' . $emo_url . '" border="0" alt="' . $emo_code . ' " title="' . $emo_code . ' " onclick="kbbcode.focus().insert(\' ' . $emo_code . ' \', \'after\', false);" style="cursor:pointer"/> ';
      }
      ?>
    </div>
  <?php endif; ?>

  <div >
    <input type="text" 
           name="helpbox" 
           id="helpbox" 
           class="kinputbox" 
           disabled="disabled" 
           value=""
           style="width: 100%; background: none; border: none;box-shadow: none"/>
  </div>

  <textarea class="ktxtarea required" name="message" id="kbbcode-message" 
            ><?php
              if ($this->message->exists()) {
                echo $this->escape($this->message->message);
              }
              ?></textarea>



  <?php if ($this->message->exists()) : ?>
    <div class="clr"> </div>
    <fieldset>
      <legend><?php echo (JText::_('COM_KUNENA_EDITING_REASON')) ?></legend>
      <input class="kinputbox" name="modified_reason" size="40" maxlength="200" type="text" value="<?php echo $this->modified_reason; ?>" />
    </fieldset>
  <?php endif; ?>
    

</div>
