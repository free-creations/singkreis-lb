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
      <li role="presentation" >
        <a href="<?= $this->get('emailUri'); ?>"><span class="fa fa-envelope-o"> </span> Kontaktformular</a>
      </li>
      <li role="presentation" class="active">
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

    <h1>So finden Sie uns</h1>
    <div class="row">
      <div class="col-md-7" style="padding:8px">
        <div class="sk-contact-mapWrapper">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5246.134122249786!2d9.216972293457035!3d48.89505911078225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4799d1e09f88a067%3A0xae06e2639ee246b!2sSt.+Paulus%2C+Ludwigsburg!5e0!3m2!1sde!2sde!4v1417264145386" 
                  width="600" 
                  height="450" 
                  frameborder="0" 
                  style="border:0">

          </iframe>
        </div>
      </div>
      <div class="col-md-5" style="padding:8px">
        <img src="<?= $baseurl . 'components/com_skcontact/views/howtogetthere/tmpl/howtogetthere.png' ?>"  alt="St. Paulus Ansicht"
             style="width:100%;
             max-width: 450px;
             height: auto;
             margin-right: 16px;
             margin-bottom: 16px"
             class="pull-left "> 
        <h3>
          Gemeindezentrum St. Paulus
        </h3>
        Beethovenstraße 70 <br/>
        71640 Ludwigsburg <br/><br/>
        
        Telefon:
    07141 83019 (Pfarrbüro St. Paulus)

      </div>
    </div>
  </div>
</div>