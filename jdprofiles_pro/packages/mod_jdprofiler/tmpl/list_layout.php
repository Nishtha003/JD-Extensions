<?php
defined('_JEXEC') or die;
//echo "<pre>";
//print_r($profiles);
?>
<style>
.team-member-name{
  color:<?php echo  $params->get('NameColor'); ?>;
}
.team-member-designation{
  color:<?php echo  $params->get('designationColor'); ?>;
}
.team-member-bio{
  color:<?php echo  $params->get('shortBio'); ?>;
}
.team-mamber-image-wrapper .social-profile li a {
  color: <?php echo $params->get('icon_color');?>;
  border: 1px solid <?php echo $params->get('icon_background');?>;
  background-color: <?php echo $params->get('icon_background');?>;
}
</style>
<div class="jd-team-showcase-wrapper jd-list-layout-view jd-list-simple-layout">
  <div class="row">
    <div class="col-12">
      <div class="row <?php echo ($params->get('gutter_space')=='nomargin') ? 'no-gutters' : '' ?>">
      <?php foreach($profiles as $profile) { ?>
        <!-- Team Item wrapper start -->
        <div class="jd-team-columns col-12">
          <div class="card-team jd-team-items">
            <div class="team-mamber-image-wrapper">
              <img src="<?php echo $profile->image; ?>" alt="<?php  echo $profile->name; ?>" class="team-mamber-image">
            </div>
            <?php if($params->get('display_name') or $params->get('display_designation') ) { ?>
              <div class="card-team-body">
                <div class="team-member-content-wrapper">
                  <?php if($params->get('display_name')) { ?>
                    <h5 class="team-member-name">
                      <?php if($params->get('enable_link')){ ?>
                        <a href="<?php echo JRoute::_('index.php?option=com_jdprofiler &view=profile&id='.(int) $profile->id); ?>"><?php  echo $profile->name; ?></a>
                      <?php }else {?>
                        <?php  echo $profile->name; ?>
                      <?php  } ?>
                    </h5>
                  <?php } ?>
                  <?php if($params->get('display_designation')) { ?>
                    <?php if(!empty($profile->designation)) { ?>
                      <p class="team-member-designation">
                        <small><?php  echo $profile->designation; ?></small>
                      </p>
                    <?php } ?>
                  <?php } ?>
                  <?php if(!empty($profile->sbio)) { ?>
                    <p class="team-member-bio"><?php echo $profile->sbio;  ?></p>
                  <?php } ?>    
                  <ul class="list-unstyled contact-info">
                    <?php if($params->get('show_Contact')) { ?>
                      <li>
                        <i class="fas fa-phone fa-rotate-90"></i>  <?php  echo $profile->phone; ?></li>
                      <li>
                    <?php } ?>
                    <?php if(!empty($profile->email)) { ?>
                      <i class="fas fa-envelope"></i> <?php  echo $profile->email; ?></li>
                    <?php } ?>
                    <?php if(!empty($profile->location)) { ?>
                    <li>
                      <i class="fas fa-map-marker-alt"></i>
                      <?php  echo $profile->location; ?></li>
                    <?php } ?>    
                  </ul>
                </div>
              <?php } ?> 
              <?php if($params->get('show_socialsIcon')) { ?>
                  <?php if(!empty($profile->social)) { ?>
                      <div class="social-profile-wrapper">
                        <ul class="social-profile <?php if($params->get('social_icons')=="c"){ echo $params->get('IconStyle'); } ?>">
                          <?php  $socials=  json_decode($profile->social);?>
                            <?php  foreach($socials as $social){?>
                                <li>
                                    <a href="<?php echo $social->link?>" target="<?php if($params->get('new_tab')){echo '1'; } ?>" >
                                      <i class="<?php echo $social->icon?>"></i>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                      </div>
                    <?php } ?> 
                  <?php } ?>
              <!-- Social Profile Wrapper End -->
            </div>
          </div>
        </div>
      <?php } ?>
        <!-- Team Item wrapper end -->
      </div>
    </div>
  </div>
</div>

<script>
(function ($) {
    // Slick Js start
    var intislickSlider = function () {
        $('.jd-team-carousel, .jd-team-carousel-hover').slick({
            arrows: true,
            dots: true,
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