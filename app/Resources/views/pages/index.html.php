<?php $view->extend('views/base/layout.html.php') ?>
<p>
Hotel CYKA* to biznesowy obiekt położony w centrum Krakowa. Do dyspozycji naszych Gości oddajemy 10 nowoczesnych, klimatyzowanych pokoi. W całym Hotelu zapewniamy bezpłatny, bezprzewodowy dostęp do Internetu. Naszym Gościom oferujemy monitorowany parking naziemny oraz podziemny garaż.
			</p>
<script src="<?php echo $view['assets']->getUrl('js/timer.js')?>"></script>
        <script src="<?php echo $view['assets']->getUrl('js/jssor.slider-20.mini.js')?>"></script>
        
        <!-- use jssor.slider-20.debug.js instead for debug -->
        <script>
            jQuery(document).ready(function ($) {

                var jssor_1_SlideshowTransitions = [
                  {$Duration:1200,$Opacity:2}
                ];

                var jssor_1_options = {
                  $AutoPlay: true,
                  $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                  },
                  $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                  },
                  $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                  }
                };

                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                //responsive code begin
                //you can remove responsive code if you don't want the slider scales while window resizes
                function ScaleSlider() {
                    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                    if (refSize) {
                        refSize = Math.min(refSize, 1000);
                        jssor_1_slider.$ScaleWidth(refSize);
                    }
                    else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }
                ScaleSlider();
                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
                //responsive code end
            });
        </script>
		