          <div class="sidebar">
            <div class="sidebar-widget">
              <h6 class="mb-20">Search</h6>
              <form method="get" action="" id="search-form">
                <div class="widget-search autocomplete"> <i class="fa fa-search"></i>
                  <input type="search" name="search" id="search" class="form-control" placeholder="Search...." value="<?php echo $CI->input->get('big_search'); ?>"/>
                </div>
              </form>
            </div>
            <div class="sidebar-widget">
              <h6 class="mt-40 mb-20">Recent <?php echo ucfirst($CI->_uriSegment) ?> </h6>
              <?php foreach ($sidebar['recent_post'] as $post) { ?>
                <div class="recent-post clearfix">
                <?php if(!empty($post['thumbnail'])): ?>
                  <div class="recent-post-image">
                    <img class="img-fluid" src="<?php echo uploads_path($post['thumbnail']); ?>" alt="">
                  </div>
                <?php endif; ?>
                <div class="recent-post-info"> <a href="<?php echo $CI->_uriTarget,'/',$post['slug'] ?>"><?php echo $post['title'] ?></a>  <span><i class="fa fa-calendar-o"></i> <?php echo getDateFromDB($post['created'],'F d, Y') ?></span>
                </div>
                </div>
              <?php } ?>
            </div>
            <?php echo get_block('sidebar-extra'); ?>
          </div>
            <!-- <div class="sidebar-widget clearfix">
              <h6 class="mt-40 mb-20">Archives</h6>
              <ul class="widget-categories">
                <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2018</a>
                </li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2018</a>
                </li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2018</a>
                </li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2018</a>
                </li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> August 2018</a>
                </li>
              </ul>
            </div>
            <div class="sidebar-widget">
              <h6 class="mt-40 mb-20">Tags</h6>
              <div class="widget-tags">
                <ul>
                  <li><a href="#">Bootstrap</a>
                  </li>
                  <li><a href="#">HTML5</a>
                  </li>
                  <li><a href="#">Wordpress</a>
                  </li>
                  <li><a href="#">CSS3</a>
                  </li>
                  <li><a href="#">Creative</a>
                  </li>
                  <li><a href="#">Multipurpose</a>
                  </li>
                  <li><a href="#">Bootstrap</a>
                  </li>
                  <li><a href="#">HTML5</a>
                  </li>
                  <li><a href="#">Wordpress</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="sidebar-widget">
              <h6 class="mt-40 mb-20">Meta</h6>
              <ul class="widget-categories">
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Log in</a>
                </li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Entries RSS</a>
                </li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Comments RSS </a>
                </li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2018</a>
                </li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> WordPress.org</a>
                </li>
              </ul>
            </div>
            <div class="sidebar-widget">
              <h6 class="mt-40 mb-20">Testimonials</h6>
              <div class="owl-carousel" data-nav-dots="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                <div class="item">
                  <div class="testimonial-widget">
                    <div class="testimonial-content">
                      <p>Webster provide me consectetur adipisicing elit. Voluptatum dignissimos amet numquam at est eum libero repellat reiciendis! Accusamus quibusdam.</p>
                    </div>
                    <div class="testimonial-info mt-20">
                      <div class="testimonial-avtar">
                        <img class="img-fluid" src="images/team/01.jpg" alt="">
                      </div>
                      <div class="testimonial-name"> <strong>Michael Bean</strong>
                        <span>Project Manager</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimonial-widget">
                    <div class="testimonial-content">
                      <p>I am happy with webster service adipisicing elit. Voluptatum dignissimos amet libero repellat reiciendis! Accusamus quibusdam numquam at est eum.</p>
                    </div>
                    <div class="testimonial-info mt-20">
                      <div class="testimonial-avtar">
                        <img class="img-fluid" src="images/team/01.jpg" alt="">
                      </div>
                      <div class="testimonial-name"> <strong>Paul Flavius</strong>
                        <span>Design</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="sidebar-widget-widget">
              <h6 class="mt-40 mb-20">Quick contact</h6>
              <form class="gray-form">
                <div class="form-group">
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="exampleInputphone" placeholder="Email">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="4" placeholder="message"></textarea>
                </div> <a class="button" href="#">Submit</a> 
              </form>
            </div>
            <div class="sidebar-widget">
              <h6 class="mt-40 mb-20">Photo gallery</h6>
              <div class="widget-gallery popup-gallery clearfix">
                <ul>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/01.jpg">
                      <img class="img-fluid" src="images/portfolio/small/01.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/02.jpg">
                      <img class="img-fluid" src="images/portfolio/small/02.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/03.jpg">
                      <img class="img-fluid" src="images/portfolio/small/03.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/04.gif">
                      <img class="img-fluid" src="images/portfolio/small/04.gif" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/05.jpg">
                      <img class="img-fluid" src="images/portfolio/small/05.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/06.jpg">
                      <img class="img-fluid" src="images/portfolio/small/06.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/07.jpg">
                      <img class="img-fluid" src="images/portfolio/small/07.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/08.gif">
                      <img class="img-fluid" src="images/portfolio/small/08.gif" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/09.jpg">
                      <img class="img-fluid" src="images/portfolio/small/09.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/10.jpg">
                      <img class="img-fluid" src="images/portfolio/small/10.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/01.jpg">
                      <img class="img-fluid" src="images/portfolio/small/01.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/02.jpg">
                      <img class="img-fluid" src="images/portfolio/small/02.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/03.jpg">
                      <img class="img-fluid" src="images/portfolio/small/03.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/04.gif">
                      <img class="img-fluid" src="images/portfolio/small/04.gif" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/05.jpg">
                      <img class="img-fluid" src="images/portfolio/small/05.jpg" alt="">
                    </a>
                  </li>
                  <li>
                    <a class="portfolio-img" href="images/portfolio/small/06.jpg">
                      <img class="img-fluid" src="images/portfolio/small/06.jpg" alt="">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="sidebar-widget">
              <h6 class="mt-40 mb-20">Newsletter</h6>
              <div class="widget-newsletter">
                <div class="newsletter-icon"> <i class="fa fa-envelope-o"></i>
                </div>
                <div class="newsletter-content"> <i>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter. </i>
                </div>
                <div class="newsletter-form mt-20">
                  <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Name">
                  </div> <a class="button btn-block" href="#">Submit</a> 
                </div>
              </div>
            </div>
            <div class="sidebar-widget mb-40">
              <h6 class="mt-40 mb-20">Our clients</h6>
              <div class="widget-clients">
                <div class="owl-carousel" data-nav-dots="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                  <div class="item">
                    <img class="img-fluid mx-auto" src="images/clients/01.png" alt="">
                  </div>
                  <div class="item">
                    <img class="img-fluid mx-auto" src="images/clients/02.png" alt="">
                  </div>
                  <div class="item">
                    <img class="img-fluid mx-auto" src="images/clients/03.png" alt="">
                  </div>
                  <div class="item">
                    <img class="img-fluid mx-auto" src="images/clients/04.png" alt="">
                  </div>
                </div>
              </div>
            </div> -->