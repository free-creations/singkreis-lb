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
 *
 * @package Kunena.Template.singkreis
 *
 * changes:
 *   Harald 17.10.2014: removed display of LoginBox and Breadcrumps, as these 
 *   elements are redundant with the base singkreis template.
 * */
defined('_JEXEC') or die();
?>
<!-- display --> 
<div class="container no-padding">
  <?php
  echo '';
  if ($this->ktemplate->params->get('displayMenu', 1)) {
    $this->displayMenu();
  }
  ?> 
  <div class="sk-forum-content">
    <?php
    $this->displayLayout();
    ?>  
  </div>
</div>
<!-- End display -->
