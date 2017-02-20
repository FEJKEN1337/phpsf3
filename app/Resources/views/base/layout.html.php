<?php $view->extend('views/base/base.html.php');?>

<body onload="odliczanie();">
	
	<div id="container">
	
		<div class="rectangle"> 
			<div id="logo"><a href="powrot" class="tilelinkhtml5">HOTEL Kamil</a></div>
			<div id="zegar">12:00:00</div>
			<div style="clear: both;"></div>
		</div>
		
		<div class="square">
			<div class="tile1">
				<a href="<?=$view['router']->generate('index')?>" class="tilelink"><i class="demo-icon icon-water"></i><br />O nas</a>
			</div>
			<a href="<?=$view['router']->generate('cennik')?>" class="tilelinkhtml5">
				<div class="tile1">
					<i class="demo-icon icon-money"></i><br />Oferta
				</div>
				
				
			</a>
			<div style="clear:both;"></div>
		 
			<div class="tile2">
                           
			  <a href="<?=$view['router']->generate('load_rooms')?>" id="rezerwacja">    <i>Zarezweruj Pokój Hotelowy </i>
			</p>
			</div>
                     </a>
					 
					 </div>
					 					 
		<div class="square">
			<div class="tile3">
                            <?php $view['slots']->output('_content'); ?>
                            
			</div>
			<div class="tile4">
			
				      <a href="<?=$view['router']->generate('kontakt')?>" class="tilelinkhtml5">
						<i> KONTAKT</i>
	
		  
			</div>
			<div style="clear:both;"></div>
			</div>
			
				<div style="clear:both;"></div>
			
			
			
			<div class="tile5">
				<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1000px; height: 142px; overflow: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1000px; height: 142px; overflow: hidden;">
            <div style="display: none;">
                <img data-u="image" src="/img/002.jpg" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="/img/4.jpg" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="/img/1.jpg" />
            </div>
            <div style="display: none;">
                <img data-u="image" src="/img/2.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:6px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora12l" style="top:123px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora12r" style="top:123px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
      
    </div>
	
			</div>
			
			
		</div>
		<div style="clear:both;"></div>
<div class="rectangle3">2015 &copy; asdasdasdas</div>
	
	
</body>