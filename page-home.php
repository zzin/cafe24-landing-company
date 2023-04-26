<?php
get_header(); ?>
<main id="primary" class="site-main">
  <?php
  get_template_part('template-parts/section', 'hero');
  get_template_part('template-parts/section', 'about');
  get_template_part('template-parts/section', 'crew');
  get_template_part('template-parts/section', 'banner');
  get_template_part('template-parts/section', 'story');
  get_template_part('template-parts/section', 'marquee');
  get_template_part('template-parts/section', 'products');
  get_template_part('template-parts/section', 'faq');
  get_template_part('template-parts/section', 'contact');
  ?>
</main>
<?php get_footer(); ?>
