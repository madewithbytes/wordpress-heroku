<?php
/*
Template Name: DEV TEMPLATE (template v3full)
*/

session_start();

if (!(isset($_SESSION['previous'])) || ($_SESSION['previous'] != "messageTest")) {
 	unset($_SESSION['err']);
 	unset($_SESSION['email']);
 	unset($_SESSION['thanks']);
 	session_destroy();
}else{
	unset($_SESSION['previous']);
};

get_header('v3full'); ?>
    <section id="content">
      <div class="inner">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          
          <script type="text/javascript" charset="utf-8">
            head.ready(function() {
              $('.current-menu-item > a, .current-menu-ancestor > a').addClass('active');
              if ($('.current-menu-ancestor .current-menu-item:first, .current-menu-item:first .sub-menu:first').size() > 0) {
                $('.current-menu-item:first').each(function() {
                  var sidebar_menu = false;
                  var sidebar_parent = false;
                  if ($(this).parent().is('.sub-menu')) {
                    sidebar_menu = $(this).parent();
                    sidebar_parent = sidebar_menu.parent();
                  } else {
                    sidebar_menu = $(this).find('.sub-menu:first').size()? $(this).find('.sub-menu:first') : false;
                  }
                  if (sidebar_menu == false) {
                    $('#content > .inner > .cols-a > .secondary').remove();
                    $('#content > .inner > cols-a').removeClass('.cols-a');
                  } else {
                    if (sidebar_parent) {
                      sidebar_parent_link = sidebar_parent.find('a:first');
                      $('#sub_menu_title').append('<a href="'+sidebar_parent_link.attr('href')+'">'+sidebar_parent_link.html()+'</a>');
                    } else {
                      $('#sub_menu_title').remove();
                    }
                    $(sidebar_menu).appendTo('.secondary .sidenav-a');
                  }
                });
              } else {
                $('#content > .inner > .cols-a > .secondary').remove();
                $('#content > .inner > .cols-a').removeClass('cols-a');
              }
              
            });
          </script>

          <h1><?php the_title(); ?></h1>
          <div class="cols-a">
            <div class="primary">
              
              <?php if($post->post_name == "get-involved" ){ ?>
              <style type="text/css" media="screen">
                #signup_box_a {
                  position:relative;
                  font-size:1.5em;
                }
                #signup_box_a > img {
                  width:100%;
                  height:auto;
                }
                
                #signup {
                    background: none transparent;
                    height: auto;
                    padding:1.5em 0 0;
                    position: relative;
                    border-top:1px dotted #ffffff;
                }
                #signup fieldset {
                  width:100%;
                }
                #signup legend{
                  font-family: proxima-nova, Helvetica, Arial, sans-serif;
                  font-size: 30px;
                  font-weight: normal;
                  font-style: normal;
                  text-transform: uppercase;
                  color: #ffffff;
                  padding: 0;
                  line-height: 120%;
                }

                #response{
                  margin-top: 5px;
                  padding: 0;
                  background-color: transparent;
                  border: none;
                  color: #f56922;
                  width: 100%;
                }
                #signup .form_submit {
                  background:none transparent;
                  border:0;
                  margin:1em 0;
                  padding:0;
                  text-transform:uppercase;
                  color:#666;
                }
                #signup #email {
                  width:178px;
                  display:block;
                }
                #signup input {
                  font-size:1.4em;
                }
                .contact_button {
                  display:inline-block;
                  width:177px;
                  height:40px;
                  text-indent:-9999em;
                  background:transparent url(/assets/v3/images/btn-contactUsNormal.png) no-repeat 0 0;
                }
                .contact_button:hover {
                  background-image:url(/assets/v3/images/btn-contactUsRollover.png);
                }
                
              </style>
              <div id="signup_box_a">
                <div id="signupWrap">
                  <!--<form id="signup" action="<?=$_SERVER['PHP_SELF']; ?>" method="get">-->
                  <form id="signup" action="/wp-content/themes/usignite/inc/signup-validate.php" method="get">
                    <fieldset>
                      <legend>Join Our Mailing List</legend>
                      <label for="email" id="address-label">Email Address
                        <span id="response">
                          <?php if(isset($_SESSION['err']) && (strlen($_SESSION['err']) > 0)){
                                      echo $_SESSION['err'];
                                  }else if(isset($_SESSION["thanks"])){
                                      echo $_SESSION["thanks"];
                                  }
                          require_once('inc/store-address.php'); if($_GET['submit']){ echo storeAddress(); } ?>
                          </span>
                      </label>
                      <input type="text" name="email" id="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];} ?>" />
                      <input type="submit" name="submit" value="Submit &gt;" class="form_submit" alt="Join" />

                    </fieldset>
                  </form>
                </div>
                <?php the_post_thumbnail('full'); ?>
              </div>
              
              <script type="text/javascript" charset="utf-8">
                head.ready(function() {
                  $('#signup').appendTo('.primary .box-a.alignright');
                });
              </script>
              
              <?php } ?>
              
              
              
              <?php the_content(); ?>
            </div>
            
            <div class="secondary">
              <h2 id="sub_menu_title"></h2>
              <nav class="sidenav-a">
                
              </nav>
            </div>
            
          </div>
        <?php endwhile; endif; ?>
      </div>
    </section><!-- #content -->
    

<?php get_footer('v3'); ?>