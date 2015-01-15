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
//--- Privacy (Datenschutzhinweis)
defined('_JEXEC') or die('Restricted access');
?>
<div class="container no-padding">

  <nav>
    <ul class="sk-forum-nav">
      <li role="presentation" >
        <a href="<?= $this->get('emailUri'); ?>"><span class="fa fa-envelope-o"> </span> Kontaktformular</a>
      </li>
      <li role="presentation" >
        <a href="<?= $this->get('howtogetthereUri'); ?>"><span class="fa fa-car"> </span> Anfahrt</a>
      </li>
      <li role="presentation" class="active">
        <a href="<?= $this->get('privacyUri'); ?>"><span class="fa fa-info-circle"> </span> Datenschutz</a>
      </li>
      <li role="presentation" >
        <a href="<?= $this->get('impressumUri'); ?>"><span class="fa fa-info-circle"> </span> Impressum</a>
      </li>
    </ul>
  </nav>

  <div class="sk-forum-content">
    <article >
      <div>
        <h1>Datenschutzhinweis</h1>
      </div>
      <div>
        <p>Datenschutz ist uns sehr wichtig. Den Schutz Ihrer persönlichen Daten nehmen 
          wir sehr ernst.

        </p>
      </div>

      <div>
        <h2>Die Rechtsgrundlage</h2>
        <p>Das Bundesdatenschutzgesetz (BDSG) und in der Folge auch das 
          Telemediengesetz (TMG) schützen personenbezogene Daten. 
          Dies sind Daten, die sich auf natürliche Personen beziehen. 
          Daten juristischer Personen unterliegen diesem Schutz nicht. 
          Personenbezogene Daten sind Einzelangaben über persönliche oder sachliche Verhältnisse, 
          die Ihrer Person zugeordnet werden können 
          (z. B. Ihr Name in Verbindung mit Ihrer Telefonnummer oder Ihrer E-Mail-Adresse). 
          Informationen, die nicht direkt mit Ihrer tatsächlichen Identität in 
          Verbindung gebracht werden können,
          fallen nicht darunter.
        </p>
      </div>
      <div>
        <h2>Weitergabe Ihrer persönlichen Daten an Dritte</h2>
        <p>Ihre Daten werden nicht an 
          Dritte weitergegeben.
        </p>
      </div>

      <div>
        <h2>Einsatz von Webanalyse-Tools</h2>
        <p>Diese Website nutzt keine die Webanalyse.
        </p>
      </div>

      <div>

        <h2>Links auf andere Websites</h2>
        <p>Wir betonen ausdrücklich, 
          dass wir, unsere Mitglieder bzw. andere an dieser Website beteiligte
          Personen keinerlei Einfluss auf die Gestaltung und die Inhalte der 
          verlinkten Seiten haben.
          <br /><br />Für fremde Inhalte, die über Links zur Nutzung 
          bereitgestellt werden, übernehmen wir keine Verantwortung und 
          machen uns deren Inhalt nicht zu Eigen. Für illegale, fehlerhafte 
          oder unvollständige Inhalte sowie für Schäden, die durch die Nutzung 
          der Nichtnutzung der Informationen entstehen, haftet allein der 
          Anbieter der Website, auf die verwiesen wurde.

        </p>
      </div>

    </article>
  </div>
</div>

