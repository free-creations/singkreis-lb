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
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$baseurl = JURI::base();
?>
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


  <div class="sk-forum-content">

    <h1>Vielen Dank für die E-Mail</h1>

    <?php if ($this->emailSent): ?>

      <?= 'Name: ' . $this->emailSent['contactFields']['contact_name'] . '<br/>' ?>
      <?= 'Email: ' . $this->emailSent['contactFields']['contact_email'] . '<br/>' ?>
      <?= 'Subject: ' . $this->emailSent['contactFields']['contact_subject'] . '<br/>' ?>
      <?= 'Message: ' . $this->emailSent['contactFields']['contact_message'] . '<br/>' ?>

    <?php endif; ?>




  </div>
</div>