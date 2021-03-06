<?php
defined('_JEXEC') or die;
// Licensed under the GPL v3  
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root() . 'administrator/components/com_jdtoursshowcase/assets/css/jdtoursshowcase.css');
$document->addStyleSheet(JUri::root() . 'media/com_jdtoursshowcase/css/list.css');
$button_link=$params->get('button_link','#');

?>
<div class="row">
	<?php foreach ($tours as $i => $item) :  ?>
   <div class="col-lg-<?php echo  $params->get('grid_coloumns',1);?> d-md-flex mb-4">
			<div class="tour-wrap">
				<div class="tour-view-img">
					<a href="<?php echo JRoute::_(JDtourRoute::getTourRoute($item->id));?>">	<img src="<?php echo $item->tour_image; ?>" alt="top-destinations">
					</a>
					<?php if($item->show_discount){ ?>
						<div class="tour-discount">
							<?php
								
									if($item->discount_type=="percentage"){	
										echo '<div class="off_percentage"><span>'.$item->percentage. '%' .'</span> </br>Off' . '</div>';	
										
									}elseif($item->discount_type=="fixed_amount"){
										echo '<div class="off_fixed_amount"> <span>Flat '.$item->fixed_amount.' </span></br>Off' .'</div>';
									}
								
							?>
						</div>
					<?php }?> 
				</div>
				<div class="tour-body text-center">
					<div class="tour-title">
						<a href="<?php echo JDtourRoute::getTourRoute($item->id); ?>" target="1">
							<h5><?php echo ($item->title); ?></h5>
						</a>
					</div>
					<div class="tour-sub-title">
						<span class="text-muted"><?php echo $tour_type = JdtoursshowcaseHelpersJdtoursshowcase::tour_type($item->tour_type); ?></span>
					</div>
						<div class="tour-show-discount">
							<strong>
								<?php
									if($item->show_discount){
										if($item->discount_type=="percentage"){
											$percentage =  (($item->price*$item->percentage)/100);
											echo '$'.$price =  ($item->price - $percentage);
											
										}elseif($item->discount_type=="fixed_amount"){
											$fixed_amount = $item->fixed_amount;
											echo '$'.$price = ($item->price - $fixed_amount);
										}
									}
								?>
							</strong> 
							<span><?php  if($item->show_discount){ ?>   <del>$<?php echo  $item->price; ?></del> <?php }  ?>
							<?php  if(!$item->show_discount){ ?>  $<?php echo  $item->price; ?><br> <?php }  ?></span>
							<p class="tour-person">
							<?php if(!empty($item->price_postfix)) { ?>
									<span class="text-muted"><?php echo $item->price_postfix; ?></span>
								<?php } ?>
							</p>
						</div>
						<?php $features = json_decode($item->feature); ?>
						<?php if(!empty($features)){ ?>
							<div class="tour-showcase-icon">
									<?php foreach($features as $feature){ ?>
										<?php  if($feature->show_img_feature == 1){ ?>
											<i class="<?php echo $feature->icon_class; ?>"  data-toggle="tooltip" data-placement="top" title="<?php echo $feature->tool_tip; ?>" aria-hidden="true"></i>
										<?php } ?>
										<?php  if($feature->show_img_feature == 2){ ?>
											<img src="<?php echo $feature->icon_img; ?>"  data-toggle="tooltip" data-placement="top" title="<?php echo $feature->tool_tip; ?>" aria-hidden="true"/>
										<?php } ?>
									<?php } ?>
							</div>
						<?php } ?>		
						<a href="<?php echo JDtourRoute::getTourRoute($item->id); ?>" class="tour-showcase-see-more">
							See More <i class="fa fa-angle-right pl-2" style="color: #ff2424;" aria-hidden="true"></i>
						</a>
				</div>
			</div>
		</div>
   <?php endforeach; ?>					
</div>
<div class="row pt-5">
	<div class="col-12 d-flex justify-content-center">	
		<a href="<?php echo JRoute::_("index.php?Itemid={$button_link}"); ?>"><button class="btn btn-outline-primary"><?php echo $params->get('button','See More'); ?></button></a>
	</div>
</div>