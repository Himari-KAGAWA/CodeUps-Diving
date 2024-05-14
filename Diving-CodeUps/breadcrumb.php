<?php if (function_exists('bcn_display')) : ?>
  <nav class="breadcrumb top-breadcrumb" aria-label="Breadcrumb">
    <div class="breadcrumb__inner inner">
      <ol class="breadcrumb__list">
        <li class="breadcrumb__item">
          <div aria-current="location"><?php bcn_display(); ?></div>
        </li>
      </ol>
    </div>
  </nav>
<?php endif; ?>