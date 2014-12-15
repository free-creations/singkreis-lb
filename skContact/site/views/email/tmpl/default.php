<?php
/*
 * @package     Singkreis.Contact
 * @subpackage  com_skcontact
 * 
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
 * see: https://www.ostraining.com/blog/how-tos/development/getting-started-with-jform/
 * 
 * 
  joomla CMS: http://docs.joomla.org/API16:JForm
  joomla API: http://api.joomla.org/11.4/Joomla-Platform/Form/JForm.html

 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');

$emailUrixx= $this->get('emailUri');

if (isset($this->error)) :
  ?>
  <div class="contact-error">
    <?php echo $this->error; ?>
  </div>
<?php endif; ?>


<div class="container no-padding">

  <nav>
    <ul class="sk-forum-nav">
      <li role="presentation" class="active">
        <a href="<?= $this->get('emailUri'); ?>"><span class="fa fa-envelope-o"> </span> Kontaktformular</a>
      </li>
      <li role="presentation">
        <a href="<?= $this->get('howtogetthereUri'); ?>"><span class="fa fa-car"> </span> Anfahrt</a>
      </li>
      <li role="presentation">
        <a href="<?= $this->get('privacyUri'); ?>"><span class="fa fa-info-circle"> </span> Datenschutz</a>
      </li>
      <li role="presentation">
        <a href="<?= $this->get('impressumUri'); ?>"><span class="fa fa-info-circle"> </span> Impressum</a>
      </li>
    </ul>
  </nav>
  <div class="sk-forum-content" style="padding:30px">

    <div class="contact-form">
      <form id="contact-form" 
            action="<?php echo JRoute::_('index.php'); ?>" 
            method="post" 
            class="form-validate form-horizontal"
            role="form">
        <fieldset>
          <legend>Eine E-Mail senden. Alle mit * markierten Felder werden benötigt.</legend>

          <?php
          foreach ($this->form->getFieldsets() as $group => $fieldset):
            $fields = $this->form->getFieldset($group);
            foreach ($fields as $field) :
              ?>

              <?php if (is_a($field, 'JFormFieldCheckbox')): ?>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <?php echo $field->input; ?> 
                        <?php echo $field->label; ?>
                      </label>
                    </div>
                  </div>
                </div>
              <?php else : ?>
                <div class="form-group">
                  <?php
                  $field->__set('labelclass', 'col-sm-2 control-label');
                  echo $field->label;
                  ?>

                  <div class="col-sm-10 " >
                    <?php
                    $field->__set('class', 'form-control');
                    echo $field->input;
                    ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php
            endforeach; // field
          endforeach; // fieldset
          ?>


          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10" >
              <button class="btn btn-primary validate" 
                      type="submit">
                E-Mail senden                        
              </button>
            </div>

            <input type="hidden" name="option" value="com_skcontact" />
            <input type="hidden" name="task" value="email.submit" />
            <input type="hidden" name="return" value="" />
            <?php echo JHtml::_('form.token'); ?>
          </div>
        </fieldset>
      </form>
    </div>

  </div>
</div>
