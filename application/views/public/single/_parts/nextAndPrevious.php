
        <?php if($referItems['previousItem'] || $referItems['nextItem']){ ?>
        <div class="port-navigation clearfix">
          <?php if($referItems['previousItem']): ?>
          <div class="port-navigation-left float-left">
            <div class="tooltip-content-3" data-original-title="<?php echo $referItems['previousItem']['title'] ?>" data-toggle="tooltip" data-placement="right">
              <a href="<?php echo base_url($referItems['targetUrl'].'/'.$referItems['previousItem']['slug']); ?>">
                <?php if(!empty($referItems['previousItem']['thumbnail'])): ?>
                  <div class="port-photo float-left">
                    <img src="<?php echo base_url('uploads/'.$referItems['previousItem']['thumbnail']); ?>" alt="">
                  </div>
                <?php endif; ?>
                <div class="port-arrow"> <i class="fa fa-angle-left"></i>
                </div>
              </a>
            </div>
          </div>
        <?php endif; ?>
        <?php if($referItems['nextItem']): ?>
          <div class="port-navigation-right float-right">
            <div class="tooltip-content-3" data-original-title="<?php echo $referItems['nextItem']['title'] ?>" data-toggle="tooltip" data-placement="left">
              <a href="<?php echo base_url($referItems['targetUrl'].'/'.$referItems['nextItem']['slug']); ?>">
                <div class="port-arrow float-left"> <i class="fa fa-angle-right"></i>
                </div>
                <?php if(!empty($referItems['nextItem']['thumbnail'])): ?>
                  <div class="port-photo">
                    <img src="<?php echo base_url('uploads/'.$referItems['nextItem']['thumbnail']); ?>" alt="">
                  </div>
                <?php endif; ?>
              </a>
            </div>
          </div>
        <?php endif; ?>
        </div>
      <?php } ?>