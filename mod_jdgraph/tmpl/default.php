<?php
defined('_JEXEC') or die;
$items = $params->get('items', []);

$doc = JFactory::getDocument();
$doc->addScript(JURI::root().'media/mod_jdgraph/js/utils.js');
$doc->addScript(JURI::root().'media/mod_jdgraph/js/Chart.bundle.js');
?>
<div id="canvas-holder" style="width:80%">
      <canvas id="chart-area-<?php echo $module->id; ?>"></canvas>
</div>

<script>
      var config_<?php echo $module->id; ?> = {
      type: 'doughnut',
      data: {
            datasets: [{
            data: [
                  <?php foreach($items as $item){ ?>
                        <?php echo $item->donation; ?>,
                  <?php } ?>
            ],
            backgroundColor: [
                  <?php foreach($items as $item){ ?>
                        '<?php echo $item->color; ?>',
                  <?php } ?>
            ],
            label: ''
            }],
            labels: [
            <?php foreach($items as $item){ ?>
                  '<?php echo $item->country; ?>',
            <?php } ?>
            ]
      },
      options: {
            responsive: true,
            legend: {
            position: 'top',
            },
            title: {
            display: true,
            },
            animation: {
            animateScale: true,
            animateRotate: true
            }
      }
      };

      //  load the graph
      var ctx_<?php echo $module->id; ?> = document.getElementById('chart-area-<?php echo $module->id; ?>').getContext('2d');
      window.myDoughnut = new Chart(ctx_<?php echo $module->id; ?>, config_<?php echo $module->id; ?>);
      
</script>