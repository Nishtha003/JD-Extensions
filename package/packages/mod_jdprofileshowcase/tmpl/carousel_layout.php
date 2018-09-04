<?php
defined('_JEXEC') or die;
//echo "<pre>";
//print_r($profiles);
?>
<section>
    <div class="container py-5">
      <div class="jd-team-showcase-wrapper jd-carousel-layout-view jd-carousel-simple-layout">
        <div class="row <?php echo ($params->get('gutter_space')=='nomargin') ? 'no-gutters' : '' ?>">
          <div class="col-12">
            <div class="row jd-team-carousel">
              <!-- Team Item wrapper start -->
              <?php foreach($profiles as $profile) { ?>
                  <div class="jd-team-columns" <?php if($params->get('gutter_space')=='custom') { ?> style="padding-right:<?php echo $params->get('margin');?>px; padding-left:<?php echo $params->get('margin');?>px;" <?php } ?>>
                    <div class="card-team jd-team-items">
                      <img src="<?php echo $profile->image;  ?>" alt="" class="card-img-top team-mamber-image">
                      <?php if($params->get('display_name') or $params->get('display_designation') ) { ?>
                        <div class="card-team-body">
                          <div class="team-member-content-wrapper">
                            <?php if($params->get('display_name')) { ?>
                              <h5 class="card-img-overlayteam-member-name">
                                <?php if($params->get('enable_link')){ ?>
                                  <a href="<?php echo JRoute::_('index.php?option=com_jdprofiles&view=profile&id='.(int) $profile->id); ?>"><?php  echo $profile->name; ?></a>
                                <?php }else {?>
                                  <?php  echo $profile->name; ?>
                                <?php  } ?>
                              </h5>
                            <?php } ?>
                            <?php if($params->get('display_designation')) { ?>
                              <?php if(!empty($profile->designation)) { ?>  
                                <p class="team-member-designation">
                                  <small><?php echo $profile->designation;  ?></small>
                                </p>
                              <?php } ?>
                            <?php } ?>
                            <?php if(!empty($profile->sbio)) { ?>    
                              <p class="card-img-overlayteam-member-bio"><?php echo $profile->sbio;  ?></p>
                            <?php } ?>
                          </div>
                        </div>
                      <?php } ?>
                      <?php if($params->get('show_socialsIcon')) { ?>
                        <div class="card-team-footer social-profile-wrapper">
                          <ul class="social-profile  <?php if($params->get('social_icons')=="c"){ echo $params->get('IconStyle'); } ?>">
                            <?php if(!empty($profile->social)) { ?>
                              <?php  $socials=  json_decode($profile->social);?>
                                <?php  foreach($socials as $social){?>
                                    <li>
                                        <a href="<?php echo $social->link?>" target="<?php if($params->get('new_tab')){echo '1'; } ?>" >
                                          <i class="<?php echo $social->icon?>"></i>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php } ?>      
                          </ul>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
              <?php  } ?>
              <!-- Team Item wrapper end -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Jd Team Showcase wrapper -->
    </div>
  </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
(function ($) {
    // Slick Js start
    var intislickSlider = function () {
        $('.jd-team-carousel, .jd-team-carousel-hover').slick({
            arrows: <?php if($params->get('DisplayArrow')){ echo "true"; }else{ echo 'false'; } ?>,
            dots: <?php if($params->get('DisplayBullit')){ echo "true"; }else{ echo 'false'; } ?>,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            adaptiveHeight: true,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });
    }
    // end slick slider
    // Events
    var docReady = function () {
        intislickSlider();
    };
    $(docReady);
})(jQuery);
  </script>
