<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
?>

<nav id="t3-mainnav" class="wrap navbar navbar navbar-fixed-top navbar-inverse t3-mainnav" role="navigation">
  <div class="container">

    <!-- The singkreis navbar -->

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <?php if ($this->getParam('navigation_collapse_enable', 1) && $this->getParam('responsive', 1)) : ?>
        <?php $this->addScript(T3_URL . '/js/nav-collapse.js'); ?>
        <button type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target=".t3-navbar-collapse">
          <i class="fa fa-bars" ></i>
        </button>
      <?php endif ?>


      <?php if ($this->getParam('addon_offcanvas_enable')) : ?>
        <?php $this->loadBlock('off-canvas') ?>
      <?php endif ?>


    </div>

    <?php if ($this->getParam('navigation_collapse_enable')) : ?>
      <div class="t3-navbar-collapse navbar-collapse collapse"></div>
    <?php endif ?>

    <div class="t3-navbar navbar-collapse collapse">
      <jdoc:include type="<?php echo $this->getParam('navigation_type', 'megamenu') ?>" name="<?php echo $this->getParam('mm_type', 'mainmenu') ?>" />

      <ul class="nav navbar-nav navbar-right">
        <li style="margin-left: 12px">
          <div>
            <button type="button" 
                    class="btn btn-primary navbar-btn sk-login-button-class" 
                    >
              <span class="glyphicon glyphicon-user" style="margin-right: 8px"></span> Login
            </button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div id="sk-login-popover-template" class="sk-login-popover">
  <jdoc:include type="modules" name="sk-login-pos" />
</div>

<script type="text/javascript">

  jQuery.noConflict();
  jQuery(function ($) {
    var loginTemplate = $("#sk-login-popover-template");
    loginTemplate.hide();
    // the login-button has got a special class to identify it. 
    // Identifying with an ID does not work 
    $(".sk-login-button-class").click(function () {
      loginTemplate.toggle(200);
    });
  });
</script>
<!-- //MAIN NAVIGATION -->
