<?php 
  /* Template Name: Partner & Integrations */ 
?>

<!doctype html>
<html>
  <head>
    <?php include(locate_template('template_parts/main-head.php')); ?>
  </head>

  <body>
    <?php include(locate_template('template_parts/main-header.php')); ?>
      <div class="partners-page">
        <section class="banner-section" style="background-image: url(<?php the_field('banner_image'); ?>)">
            <div>
                <div class="header-text">
                    <h1 class="title"><?php the_field('hero_title'); ?></h1>
                    <div class="subtitle"><?php the_field('hero_subtitle'); ?></div>
                </div>
            </div>
        </section>
        <section class="partners-content">
          <div class="content-container">
            <?php if(have_rows('partners_repeater')) {
                $selected_option = 'All';
                $categories = array(
                  "All" => True
                );
                while(have_rows('partners_repeater')) : the_row();
                  if (have_rows('tags')) {
                    while(have_rows('tags')) : the_row();
                      $categories[get_sub_field('tag_name')] = True;
                    endwhile;
                  }
                endwhile;
                ksort($categories);
                $categories = array("All" => True) + $categories;
                ?>
              <div id="partner-category-filter">
                <h4><?php the_field('filter_text'); ?></h4>
                <form id="filter-type">
                    <ul class="list">
                        <?php foreach(array_keys($categories) as $key) { ?>
                            <li class="category<?php if ($key == $selected_option) {
                                    echo ' active';
                                } ?>"><?php echo $key ?></li>
                        <?php } ?>                        
                    </ul>
                </form>
              </div>
              <?php } ?>
            <?php if(have_rows('partners_repeater')): ?>
                <div id="partners-list">
                    <h4>PARTNERS</h4>
                    <ul>
                    <?php while(have_rows('partners_repeater')) : the_row(); ?>
                      <?php $found_tag = array_filter(get_sub_field('tags'), function ($var) {
                          return $var["tag_name"] == "Partner";
                        });
                        if (count($found_tag) > 0) {
                      ?>
                      <a class="card" rel="noopener noreferrer" target="_blank" href="<?php the_sub_field('external_link'); ?>">
                          <div class="image-wrapper">
                              <img class="logo" src="<?php the_sub_field('company_logo'); ?>" />
                          </div>                      
                          <div class="company-info">
                            <h4><?php the_sub_field('company_name'); ?></h4>
                            <div class="description"><?php the_sub_field('description'); ?></div>
                            <?php if(have_rows('tags')) { ?>
                                <div class="tag-list">
                                <?php while(have_rows('tags')) : the_row(); ?>
                                    <span data-tag="<?php the_sub_field('tag_name'); ?>"><?php the_sub_field('tag_name'); ?></span>
                                <?php endwhile; ?>
                            </div>
                            <?php } ?>
                          </div>
                        </a>
                      <?php } ?>
                    <?php endwhile; ?>
                    </ul>
                    <h4>INTEGRATIONS</h4>
                    <ul>
                    <?php while(have_rows('partners_repeater')) : the_row(); ?>
                      <?php $found_tag = array_filter(get_sub_field('tags'), function ($var) {
                          return $var["tag_name"] == "Integration";
                        });
                        if (count($found_tag) > 0) {
                      ?>
                        <a class="card" rel="noopener noreferrer" target="_blank" href="<?php the_sub_field('external_link'); ?>">
                            <div class="image-wrapper">
                                <img class="logo" src="<?php the_sub_field('company_logo'); ?>" />
                            </div>                          
                            <div class="company-info">
                              <h4><?php the_sub_field('company_name'); ?></h4>
                              <div class="description"><?php the_sub_field('description'); ?></div>
                              <?php if(have_rows('tags')) { ?>
                                  <div class="tag-list">
                                  <?php while(have_rows('tags')) : the_row(); ?>
                                      <span data-tag="<?php the_sub_field('tag_name'); ?>"><?php the_sub_field('tag_name'); ?></span>
                                  <?php endwhile; ?>
                              </div>
                              <?php } ?>
                            </div>
                          </a>
                      <?php } ?>
                    <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
          </div>
        </section>        
        <section class="footer-cta">
        <div class="container">
          <div class="contributor-footnote">
              <?php $cta = get_field('partners_cta'); ?>
              <div class="more-info email-info-text" style="font-size: 32px; line-height: 42px; color: white; text-align: center;">
                  <?php echo $cta['text'] ?>
              </div>
            <div class="button-container">
              <a href="<?php echo $cta['email_url']; ?>" class="email-cta button">
                <?php echo $cta['email_text']; ?>
              </a>
            </div>
          </div>
        </div>
      </section>
    <?php include(locate_template('template_parts/main-footer.php')); ?>
    <?php include(locate_template('template_parts/main-scripts.php')); ?>
    <script>
      (function() {
        var form = document.getElementById('filter-type');

        document.getElementById('partner-category-filter').addEventListener('click', event => {
          if (event.target.nodeName === 'LI') {
            document.querySelector('#partner-category-filter li.active').classList.remove('active');
            event.target.classList.add('active');
            var data = {
              'action' : 'get_integrations_list',
              'post_id': '<?php echo $post->ID; ?>'                                
            };
            if (event.target.innerText !== 'All') {
              data.type = event.target.innerText;
            }
            jQuery.get('<?php echo admin_url('admin-ajax.php'); ?>', data, function( response ) {
              var responseData = JSON.parse(response);
              var partnerList = document.getElementById('partners-list');
              partnerList.innerHTML = '';
              Object.keys(responseData).forEach(category => {
                var companyData = responseData[category];
                // Construct list of results                
                var listTitle = document.createElement('H4');
                listTitle.innerText = category;
                partnerList.appendChild(listTitle);
                var listElem = document.createElement('UL');
                companyData.forEach(function (data) {
                  var cardElem = document.createElement('A');
                  cardElem.className = 'card';
                  cardElem.rel = 'noopener noreferrer';
                  cardElem.target = '_blank';
                  cardElem.href = data.external_link;
                  cardElem.innerHTML = `<div class="image-wrapper">${
                    data.company_logo ?
                      `<img class="logo" src="${data.company_logo}" />`
                      : ''
                  }</div>
                  <div class="company-info">
                    <h4>${data.company_name}</h4>
                    <div class="description">${data.description}</div>
                    <div class="tag-list">${
                      data.tags.map(tag => (`<span>${tag.tag_name}</span>`)).join('')
                    }
                    </div>
                  </div>`;
                  listElem.appendChild(cardElem);
                });
                partnerList.appendChild(listElem);
              });
            });
          }
        });
      })();
    </script>
  </body>
</html>