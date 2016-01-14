<html>
    <head>
    <?php
        e($this->Html->charset());
    # JS
        e($html->script("jquery")); 
        e($html->script("jqPhones")); 
        e($html->script('jquery-1.3.1.min',false));
        e($html->script('jquery.form'));
        e($html->script('interact'));
        e($html->script('draggable'));
        e($html->script('dropzones'));
        e($html->script('bootstrap.min'));
        e($html->script('scripts'));
        e($html->script('jquery.datetimepicker'));

    # CSS
        e($html->css("styles"));
        e($this->Html->css('bootstrap.min', 'stylesheet'));
        e($this->Html->css('style', 'stylesheet'));
        e($html->css('draggable'));
        e($html->css('dropzones'));
        e($html->css('jquery.datetimepicker'));
        
        $theme = 'toast/';
        e($this->Html->script($theme.'jquery.toastmessage.js'));
        e($this->Html->script($theme.'tells.js'));
    ?>
  
    </head>
    <body>
    <body >
    <?php 
    $link = (isset($_SESSION['Auth']['User']['id'])) ? 'logout' : 'login' ;
    ?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				
			</div>
		
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand" href="#">
                      <?php
                      if(isset($_SESSION['Auth']['User']['id']))
                        {
                            e($html->image("kaluna_in.png",array('width'=>'28px','height'=>'28px','onclick'=>'window.location = "'.$this->webroot.'"')));
                        }else
                            {
                                e($html->image("kaluna_out.png",array('width'=>'28px','height'=>'28px','onclick'=>'window.location = "'.$this->webroot.'"')));
                            }
                        ?>
                  </a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  
                    <ul class="nav navbar-nav">
					<?php
                        if(isset($_SESSION['Auth']['User']['id']))
                        {
                            /*<li><a href="<?php e($this->webroot.'menu/show')?>" class=""><?php e($html->image("carta.png"));?></a></li>*/

                        ?>
                            <li><a href="<?php e($this->webroot.'shoppings/index')?>" class=""><?php e($html->image("shopping.png"));?></a></li>
                            <li><a href="<?php e($this->webroot.'orders/index')?>" class=""><?php e($html->image("orders.png"));?></a></li>
                            <li><a href="<?php e($this->webroot.'tables/index')?>" class=""><?php e($html->image("tables.png"));?></a></li>
                            <li><a href="<?php e($this->webroot.'events/index')?>" class=""><?php e($html->image("events.png"));?></a></li>
                            <li><a href="<?php e($this->webroot.'reports/index')?>" class=""><?php e($html->image("reports.png"));?></a></li>

                            <li><a href="<?php e($this->webroot.'promotions/')?>" class=""><?php e($html->image("promotions.png"));?></a></li>

                    <?php
                        }
                    ?>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(!isset($_SESSION['Auth']['User']['id']))
                        {
                        ?>
                      <li><a href="#" id="log_in_button"  data-toggle="tooltip" title="Iniciar Sesión"><?php e($html->image("login.png",array('width'=>'28px','height'=>'28px')));?></a></li>
                        <?php
                        }else{
                            ?>
                            <li><a href="<?php e($this->webroot.'Users/'.$link)?>"  data-toggle="tooltip" title="Cerrar Sesión"><?php e($html->image("logout.png",array('width'=>'28px','height'=>'28px')));?></a></li>
                            <?php
                        }
                        ?>
                       
				  </ul>
				</div>
			  </div>
			</nav>
            <hr>
            <div class="row">
                <?php
                if(!isset($_SESSION['Auth']['User']['id']))
                {
                ?>
                    <div class="col-md-12" id="slogan">
                        <div class="jumbotron">
                            <p style="text-align: center;">
                                <img alt="Bootstrap Thumbnail Second"
                                     src="<?php e($this->webroot . "img/slogan.png"); ?>"/>
                            </p>

                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="row clearfix">
                    <div class="col-md-12 column" >
                        <?php 
                            e($this->Session->flash());
                            echo $content_for_layout 
                        ?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row clearfix">
                <?php
                    if(!isset($_SESSION['Auth']['User']['id']))
                    {
                $arrIMG = array();
                $i = 0;
                while ($i != 1):
                    $x = mt_rand(1,11);
                    if(!in_array($x, $arrIMG)){
                        array_push($arrIMG, $x);
                    }
                    if(count($arrIMG)==4)
                    {
                        $i=1;
                    }
                endwhile;
                    ?>
                        <?php $id_wall  = 'wall_'.$arrIMG[0].'.jpg';?> 
                        <div class="carousel slide" id="carousel-731019">
                            <ol class="carousel-indicators">
                              <li data-slide-to="0" data-target="#carousel-731019" class="active" ></li>
                              <li data-slide-to="1" data-target="#carousel-731019" class=""></li>
                              <li data-slide-to="2" data-target="#carousel-731019" class=""></li>
                              <li data-slide-to="3" data-target="#carousel-731019" class=""></li>
                            </ol>
                            <div class="carousel-inner" style="max-height:475px; overflow:hidden;">
                              <?php
                                $x=0;
                                foreach($arrIMG as $img)
                                {
                                    $id_wall  = 'wall_'.$img.'.jpg';
                                    $active = ($x==0) ? ' active ' : '' ;
                                    ?>
                                    <div class="item <?php e($active)?>" style="max-width: 100%; height: auto;">
                                      <img alt="Kaluna Café" src="<?php e($this->webroot."img/walls/$id_wall");?>">
                                    </div>
                                    <?php
                                    $x++;
                                }
                              ?>
                            </div>

                            <a class="left carousel-control" href="#carousel-731019" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-731019" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                          </div>
                    <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="row" style="text-align: center;">
                        <div class="col-md-4">
                            <img alt="Evento A" style="width:250px;height: 250px" class="img-circle" style="" src="<?php e($this->webroot."img/events/event_1.jpg");?>">
                        </div>
                        <div class="col-md-4">
                            <img alt="Evento B" style="width:250px;height: 250px" class="img-circle" style="" src="<?php e($this->webroot."img/events/event_2.jpg");?>">
                        </div>
                        <div class="col-md-4">
                            <img alt="Evento C" style="width:250px;height: 250px" class="img-circle" style="" src="<?php e($this->webroot."img/walls/wall_4.jpg");?>">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="Bootstrap Thumbnail First" src="<?php e($this->webroot."img/walls/wall_4.jpg");?>" />
                                <div class="caption">
                                    <h3>
                                        Thumbnail label
                                    </h3>
                                    <p>
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    </p>
                                    <p>
                                        <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="Bootstrap Thumbnail Second" src="<?php e($this->webroot."img/walls/wall_7.jpg");?>" />
                                <div class="caption">
                                    <h3>
                                        Thumbnail label
                                    </h3>
                                    <p>
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    </p>
                                    <p>
                                        <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img alt="Bootstrap Thumbnail Third" src="<?php e($this->webroot."img/walls/wall_8.jpg");?>" />
                                <div class="caption">
                                    <h3>
                                        Thumbnail label
                                    </h3>
                                    <p>
                                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                    </p>
                                    <p>
                                        <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel slide" id="carousel-854789">
                                <ol class="carousel-indicators">
                                    <li class="active" data-slide-to="0" data-target="#carousel-854789">
                                    </li>
                                    <li data-slide-to="1" data-target="#carousel-854789">
                                    </li>
                                    <li data-slide-to="2" data-target="#carousel-854789">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img alt="Carousel Bootstrap First" src="<?php e($this->webroot."img/promotions/promotion_1.jpg");?>" />
                                        <div class="carousel-caption">
                                            <h4>
                                                First Thumbnail label
                                            </h4>
                                            <p>
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img alt="Carousel Bootstrap Second" src="<?php e($this->webroot."img/promotions/promotion_2.jpg");?>" />
                                        <div class="carousel-caption">
                                            <h4>
                                                Second Thumbnail label
                                            </h4>
                                            <p>
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img alt="Carousel Bootstrap Third" src="<?php e($this->webroot."img/promotions/promotion_3.jpg");?>" />
                                        <div class="carousel-caption">
                                            <h4>
                                                Third Thumbnail label
                                            </h4>
                                            <p>
                                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                            </p>
                                        </div>
                                    </div>
                                </div> <a class="left carousel-control" href="#carousel-854789" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-854789" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <br/>
            </div>
            
    </div>
    </div>
    <br/><br/><br/><br/><br/><br/>
</div>

<div class="row clearfix">
    <footer id="footer" class="navbar-fixed-bottom">
      <div class="container" role="contentinfo">
        <div class="row">
          <div class="col-sm-12">
          	
          </div>
        </div><!--/row-->

        <div class="row">
        	<div class="col-md-12">
              	<p class="text-right">
              	<a href="#" rel="nofollow">KALUNA</a> Café
                </p>
          	</div>
            
        </div><!--/row-->
      </div>
    </footer>
</div>
    
        
</body>
    </body>
    <div class="clear"></div>
    <div id="mysql"><?php //e($this->element('sql_dump')); ?></div>
</html>
<script>
function preAction(section,f0cus)
{
    jQuery(section).show();
    jQuery('html,body,div').animate({
        scrollTop:jQuery(section).offset().top
        },2000);
    jQuery(f0cus).focus();	
}

function loginForm()
{
    preAction("#log_in_panel","#username");
    jQuery('#log_in_panel').slideDown(3000);
}    
    
$(document).ready(function () {
        $(function() {
            $('#log_in_button').click(function(){
                loginForm();
                return false;
            });
            
        });
    });
</script>
