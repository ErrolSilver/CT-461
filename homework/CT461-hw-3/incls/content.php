<section id="primarySection" class="primary-section prlx">
  <div class="container">
    <div class="row">
      <h1>Rate Anything</h1>

    </div> <!-- /row -->

    <div class="row">
      <section id="contentHead" class="content-head">
        <form id="primaryForm" class="content-form" name="primaryForm">

          <input type="text" id="item" name="item"/>
          <h2>How good is it?</h2>
          <input type="range" id="rating" min="0" value="50" max="100" step="1" />
          <button id="primarySubmit" class="btn btn-success">Submit</button>

        </form>
      </section> <!-- /content-head -->
    </div> <!-- /row -->
  </div> <!-- /container -->
</section>

<main class="primary-content">
  <div id="primaryContent" class="container">
    <div id="itemContainer" class="row">
      <? foreach ($items as $item): ?>
      
      <section class="content-item">
        <div class="content-item_text">
      
          <form action="?" method="post">
            <button value="delete" name="delete" class="remove-item" id="removeItem">
              <i class="glyphicon glyphicon-remove"></i>
            </button>
            <h1>
              <? echo htmlspecialchars($item['text'], ENT_QUOTES, 'UTF-8'); ?>
            </h1>
            
            <h2>
              <? echo htmlspecialchars($item['rating'], ENT_QUOTES, 'UTF-8'); ?>
            </h2>

            <input type="hidden" name="id" value="<? echo $item['id']; ?>" />
          </form>
        </div>
      </section> <!-- /content-item -->

      <? endforeach; ?>
    </div> <!-- /row -->
  </div>
</main>
