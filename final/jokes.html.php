<?php 
  $pageTitle = 'Root Default View';
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }
  include_once ROOT . '/incls/helpers.inc.php';
  include_once ROOT . '/incls/header.html.php';
?>

  <div id="primary-carousel" class="carousel slide primary--carousel" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="/img/bridge-czech-republic-iron-3489.jpg" alt=""> 
      </div>
      <div class="item">
        <img src="/img/building-fire-escape-3530.jpg" alt="">
      </div>
      <div class="item">
        <img src="/img/city-skyline-skyscrapers-2773.jpg" alt=""> 
      </div>
      <div class="item">
        <img src="/img/jetty-night-3519.jpg" alt="">
      </div>
      <div class="item">
        <img src="/img/fabric-industry-3503.jpg" alt=""> 
      </div>
    </div>
  </div> <!-- /primary-carousel -->
</div> <!-- /container -->

<section class="carousel--overlay">
  <div id="title" class="carousel--overlay_text">
    <h1>
      <span class="header-letter">c</span>
      <span class="header-letter">o</span>
      <span class="header-letter">m</span>
      <span class="header-letter">p</span>
      <span class="header-letter">u</span>
      <span class="header-letter">t</span>
      <span class="header-letter">e</span>
      <span class="header-letter">r</span>
      <span class="header-letter"> </span>

    </h1>
  </div>
</section>

<nav id="primaryNav" class="carousel--overlay_nav">
  <ul>
    <li>
      <a href="/admin/jokes/?add">Add Listing</a>
    </li>
    <li>
      <a href="admin/jokes/">Search Listings</a>
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
        <p class="pull-right"><a href="?add">Add new listing</a></p>
        <!--
        <form action="" method="get">
          <p>View jokes satisfying the following criteria:</p>
          <div>
            <label for="author">By author:</label>
            <select name="author" id="author">
              <option value="">Any author</option>
              <?php foreach ($authors as $author): ?>
                <option value="<?php htmlout($author['id']); ?>"><?php
                    htmlout($author['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <label for="category">By category:</label>
            <select name="category" id="category">
              <option value="">Any category</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?php htmlout($category['id']); ?>"><?php
                    htmlout($category['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <label for="text">Containing text:</label>
            <input type="text" name="text" id="text">
          </div>
          <div>
            <input type="hidden" name="action" value="search">
            <input type="submit" value="Search">
          </div>
        </form>
        -->
      </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <div class="row">
      <?php foreach ($jokes as $joke): ?>
      <div class="col-sm-4">
        <section class="listing-item_contain">
            <div class="listing-item_image">
              <img src="img/drink-iphone-macbook-air-168.jpg">
            </div>
          <div class="listing-item_content">
            <p>
              <?php htmlout($joke['text']); ?>
              <a class="listing-item_contact" href="mailto:<?php htmlout($joke['email']); ?>">
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
