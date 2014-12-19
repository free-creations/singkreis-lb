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

$thisCategory = $this->category;
$catName = $thisCategory->name;
$headerdesc = "";
if ($thisCategory->headerdesc) {
  $headerdesc = KunenaHtmlParser::parseBBCode($this->category->headerdesc);
}
?>

<?php $this->displayCategories() // don't know what this is ment to do  ?>

<div class="sk-forum-content-header clearfix">
  <?php echo $headerdesc ?>
  <small>Seite <?php echo $thisPage?> von <?php echo $totalPages?> </small>
  <span class="pull-right">Kategorie: <?php echo $catName ?></span>
</div>

<?php $this->displayCategoryActions() ?>

<div class="list-group sk-forum-topics-list">
  <?php if (empty($this->topics) && empty($this->subcategories)) : ?>
    <?php echo JText::_('COM_KUNENA_VIEW_NO_TOPICS') ?>
  <?php else : ?>
    <?php $this->displayRows(); ?>
  <?php endif; ?>
</div>
<?php echo $paginationObject->getPagesLinks(); ?>