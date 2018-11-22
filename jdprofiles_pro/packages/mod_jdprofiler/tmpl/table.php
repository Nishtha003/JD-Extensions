<?php
defined('_JEXEC') or die;
//echo "<pre>";
//print_r($profiles);
?>

<style>
.team-member-name .name{
  color:<?php echo  $params->get('NameColor'); ?>;
}
.team-member-designation{
  color:<?php echo  $params->get('designationColor'); ?>;
}
</style>
<div class="jd-team-showcase-wrapper jd-table-layout-view jd-table-simple-layout">
  <div class="row">
    <div class="col-12">
      <div class="row <?php echo ($params->get('gutter_space')=='nomargin') ? 'no-gutters' : '' ?>">
        <!-- Team Item wrapper start -->
        <div class="jd-team-table col-12">
          <table class="table table-striped">
            <tbody>
            <?php foreach($profiles as $profile) { ?>
                <tr>
                  <?php if(!empty($profile->image)) { ?>
                    <th scope="team-mamber-image-wrapper">
                        <img src="<?php  echo $profile->image; ?>" alt="<?php  echo $profile->name; ?>">
                    </th>
                  <?php } ?>

                  <?php if($params->get('display_name')) { ?>
                    <?php if(!empty($profile->name)) { ?>
                      <td class="team-member-name">
                        <span class="name">
                          <?php if($params->get('enable_link')){ ?>
                            <a href="<?php echo JRoute::_('index.php?option=com_jdprofiler &view=profile&id='.(int) $profile->id); ?>"><?php  echo $profile->name; ?></a>
                          <?php }else {?>
                            <?php  echo $profile->name; ?>
                          <?php  } ?>
                        </span>
                      </td>
                    <?php } ?>
                  <?php } ?>  

                  <?php if($params->get('display_designation')) { ?>
                    <?php if(!empty($profile->designation)) { ?>
                      <td class="team-member-designation"><i class="fas fa-stamp"></i> <?php  echo $profile->designation; ?></td>
                    <?php } ?> 
                  <?php } ?>

                  <?php if(!empty($profile->email)) { ?>
                    <td class="team-member-address"><i class="fas fa-envelope"></i> <?php  echo $profile->email; ?> </td>
                  <?php } ?>

                  <?php if($params->get('show_Contact')) { ?>
                    <?php if(!empty($profile->phone)) { ?>
                      <td class="team-member-email"><i class="fas fa-phone fa-rotate-90"></i> <?php  echo $profile->phone; ?></td>
                    <?php } ?>
                  <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- Team Item wrapper end -->
      </div>
    </div>
  </div>
</div>