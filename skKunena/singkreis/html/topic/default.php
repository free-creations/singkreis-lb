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

function getPaginationObject($maxpages, $self) {
  $pagination = new KunenaPagination($self->total, $self->state->get('list.start'), $self->state->get('list.limit'));
  $pagination->setDisplayedPages($maxpages);
  return $pagination;
}

$paginationObject = getPaginationObject(5, $this);
$thisPage = (int) $paginationObject->pagesCurrent;
$totalPages = (int) $paginationObject->pagesTotal;
?>
<!-- Start: topic.default -->
<div class="clearfix">
  <h2><span><?php echo JText::_('COM_KUNENA_TOPIC') ?> 
      <?php
      echo $this->escape($this->topic->subject)
      ?></span>
     <small>Seite <?php echo $thisPage?> von <?php echo $totalPages?> </small>
  </h2>
  <div class="pull-right">
    <?php echo "Kategorie: " . $this->escape($this->category->name) ?>
  </div>

</div>

<?php
//$this->displayModulePosition('kunena_topictitle');
?>
<div class="list-group">
  <?php
  $this->displayMessages();
  ?>
</div>
<?php echo $paginationObject->getPagesLinks(); ?>
<!-- End: topic.default -->