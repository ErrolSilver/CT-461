<?php 
  $pageTitle = 'Available Machines';
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }
  include_once ROOT . '/incls/helpers.inc.php';
  include_once ROOT . '/incls/header.html.php';
?>

  <div id="primary-carousel" class="carousel slide primary--carousel" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
    </div>
  </div> <!-- /primary-carousel -->
</div> <!-- /container -->

<section class="carousel--overlay">
  <div id="title" class="carousel--overlay_text">
    <h1>
      <span class="header-letter">m</span>
      <span class="header-letter">a</span>
      <span class="header-letter">c</span>
      <span class="header-letter">h</span>
      <span class="header-letter">i</span>
      <span class="header-letter">n</span>
      <span class="header-letter">i</span>
      <span class="header-letter">s</span>
      <span class="header-letter">t</span>

    </h1>
  </div>
</section>

<nav id="primaryNav" class="carousel--overlay_nav">
  <ul>
    <li>
      <a href="/admin/computers/?add">Add Listing</a>
    </li>
    <li>
      <a href="admin/computers/">Search Listings</a>
    </li>
    <li>
      <a href="admin/">Log-in</a>
    </li>
  </ul>
</nav>

<main class="content-section">
  <div class="content-section_overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1><?php htmlout($pageTitle); ?></h1>
        <p class="pull-right"><a href="/admin/computers/?add">Add new listing</a></p>
      </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <div class="row">
      <?php foreach ($computers as $computer): ?>
      <div class="col-sm-4">
        <section class="listing-item_contain">
            <div class="listing-item_image">
              <img src="img/computer<? echo current($computer) ?>.jpg">
            </div>
          <div class="listing-item_content">
            <p>
              <?php htmlout($computer['text']); ?>
              <a class="listing-item_contact" href="mailto:<?php htmlout($computer['email']); ?>">
                Contact Seller
              </a>
            </p>
          </div>
        </section>
      </div>
      <?php endforeach; ?>
    </div><!-- /row -->
  </div>
</main>

<?php
  include_once ROOT . '/incls/footer.html.php';
?>
