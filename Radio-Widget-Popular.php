<?php
/**
 * Plugin Name: Radio Widget Popular
 * Plugin URI: https://wordpress.org/plugins/radio-widget-popular
 * Description: Радиоплеер для сайта
 * Version: 1.2
 * Author: Иванов Тихон
 * Author URI: https://radiola.audio
 */

add_action( 'widgets_init', 'radio_widget_popular' );


function radio_widget_popular() {
	register_widget( 'Radio_Widget_Popular' );
}

class Radio_Widget_Popular extends WP_Widget {

	function Radio_Widget_Popular() {
		$widget_ops = array( 'classname' => 'rwidget', 'description' => __('Виджет радиоплеера для сайдбара', 'rwidget') );
		
		$control_ops = array( 'id_base' => 'radio-widget' );
		
		$this->WP_Widget( 'radio-widget', __('Радио Виджет', 'rwidget'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		
		$player_back = $instance['player_back'];
		$buttons_back = $instance['buttons_back'];
		
		$radstation1 = $instance['radstation1'];
		$radstation2 = $instance['radstation2'];
		$radstation3 = $instance['radstation3'];
		$radstation4 = $instance['radstation4'];
		$radstation5 = $instance['radstation5'];
		
		$radname1 = $instance['radname1'];
		$radname2 = $instance['radname2'];
		$radname3 = $instance['radname3'];
		$radname4 = $instance['radname4'];
		$radname5 = $instance['radname5'];
		
		$showtracks = $instance['showtracks'];
		$showslider = $instance['showslider'];
		
		$customslide1 = $instance['customslide1'];
		$customslide2 = $instance['customslide2'];
		$customslide3 = $instance['customslide3'];
		
		$customlink1 = $instance['customlink1'];
		$customlink2 = $instance['customlink2'];
		$customlink3 = $instance['customlink3'];
		
		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;
		echo "<meta charset='UTF-8'>";
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>";
		echo "<script src='https://radiola.audio/radio/ads/sliderdata/jquery.bxslider.min.js'></script>";
		echo "<link href='https://radiola.audio/radio/ads/sliderdata/jquery.bxslider.css' rel='stylesheet' />";
		echo "<div id='radiola_container' align='absmiddle'><a rel='nofollow' href='https://radiola.audio'>Слушать радио онлайн</a></div>";
		echo "<script type='text/javascript'>// <![CDATA[\n";
		echo "var rad_type='Multiple';";
		echo "var ad_slider = 'radiowidgetpopular';";
		
		if ( $customslide1 ) {
			echo "var customslide1 = '$customslide1'; ";
			if ( $customlink1 ) echo "var customlink1 = '$customlink1'; ";
		}

		if ( $customslide2 ) {
			echo "var customslide2 = '$customslide2'; ";
			if ( $customlink2 ) echo "var customlink2 = '$customlink2'; ";
		}

		if ( $customslide3 ) {
			echo "var customslide3 = '$customslide3'; ";
			if ( $customlink3 ) echo "var customlink3 = '$customlink3'; ";
		}
		
		if ( $showtracks == 1 ) {
			echo "var showtracks = true; ";
		} else {
			echo "var showtracks = false; ";
		}
		
		if ( $showslider == 1 ) {
			echo "var showslider = true; ";
		} else {
			echo "var showslider = false; ";
		}
		
		if ( $buttons_back ) echo "var buttons_back = '$buttons_back'; ";		
		if ( $player_back ) echo "var player_back='$player_back'; ";
		echo "var rad_home = 'https://radiola.audio'; var rad_stations =[";
		if ( $radstation1 ) {
			echo "";
			if ( $radname1 ) {
				echo "['$radstation1','$radname1']";
			} else {
				echo "['$radstation1','Поток 1']";
			}
		}
		if ( $radstation2 ) {
			echo "";
			if ( $radname2 ) {
				echo ", ['$radstation2','$radname2']";
			} else {
				echo ", ['$radstation2','Поток 2']";
			}
		}
		if ( $radstation3 ) {
			echo "";
			if ( $radname3 ) {
				echo ", ['$radstation3','$radname3']";
			} else {
				echo ", ['$radstation3','Поток 3']";
			}
		}
		if ( $radstation4 ) {
			echo "";
			if ( $radname4 ) {
				echo ", ['$radstation4','$radname4']";
			} else {
				echo ", ['$radstation4','Поток 4']";
			}
		}
		if ( $radstation5 ) {
			echo "";
			if ( $radname5 ) {
				echo ", ['$radstation5','$radname5']";
			} else {
				echo ", ['$radstation5','Поток 5']";
			}
		}				
		echo "];\n";
		echo "// ]]></script>";
		echo "<script src='https://radiola.audio/radio/soundmanager2.js' type='text/javascript'></script>";
		echo "<script src='https://radiola.audio/radio/radiola_player7.2.js' type='text/javascript'></script>";

		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance; 
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		$instance['player_back'] = strip_tags( $new_instance['player_back'] );
		$instance['buttons_back'] = strip_tags( $new_instance['buttons_back'] );
		
		$instance['radstation1'] = strip_tags( $new_instance['radstation1'] );
		$instance['radstation2'] = strip_tags( $new_instance['radstation2'] );
		$instance['radstation3'] = strip_tags( $new_instance['radstation3'] );
		$instance['radstation4'] = strip_tags( $new_instance['radstation4'] );
		$instance['radstation5'] = strip_tags( $new_instance['radstation5'] );
		
		$instance['radname1'] = strip_tags( $new_instance['radname1'] );
		$instance['radname2'] = strip_tags( $new_instance['radname2'] );
		$instance['radname3'] = strip_tags( $new_instance['radname3'] );
		$instance['radname4'] = strip_tags( $new_instance['radname4'] );
		$instance['radname5'] = strip_tags( $new_instance['radname5'] );
		
		$instance['showtracks'] = strip_tags( $new_instance['showtracks'] );
		$instance['showslider'] = strip_tags( $new_instance['showslider'] );
		
		$instance['customslide1'] = strip_tags( $new_instance['customslide1'] );
		$instance['customslide2'] = strip_tags( $new_instance['customslide2'] );
		$instance['customslide3'] = strip_tags( $new_instance['customslide3'] );
		
		$instance['customlink1'] = strip_tags( $new_instance['customlink1'] );
		$instance['customlink2'] = strip_tags( $new_instance['customlink2'] );
		$instance['customlink3'] = strip_tags( $new_instance['customlink3'] );
		
		return $instance;
	}
	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array('title' => __('Радио', 'rwidget'), 'radstation1' => __('http://icecast.piktv.cdnvideo.ru/vanya?80', 'rwidget'), 'radstation2' => __('http://listen.rusongs.ru/ru-mp3-128', 'rwidget'), 'radstation3' => __('http://listen2.myradio24.com:9000/1632', 'rwidget'), 'radstation4' => __('http://radio.horoshee.fm:8000/mp3', 'rwidget'), 'radstation5' => __('http://stream01.radiocon.ru:8000/live', 'rwidget'), 'radname1' => __('Радио Ваня', 'rwidget'), 'radname2' => __('Русские песни', 'rwidget'), 'radname3' => __('Пляж', 'rwidget'), 'radname4' => __('Хорошее радио', 'rwidget'), 'radname5' => __('Континенталь', 'rwidget'), 'buttons_back' => __('#630c00', 'rwidget'), 'showtracks' => __(1, 'rwidget'), 'showslider' => __(1, 'rwidget'), 'customslide1' => __('https://radiola.audio/radio/widgets/the_getaway.jpg', 'rwidget'), 'customslide2' => __('https://radiola.audio/radio/widgets/default_ad5.jpg', 'rwidget'), 'customslide3' => __('https://radiola.audio/radio/widgets/default_ad6.jpg', 'rwidget'), 'customlink1' => __('https://radiola.audio/red-hot-chili-peppers-the-getaway-2016/', 'rwidget'), 'customlink2' => __('https://radiola.audio/10-kaverov-kotorye-luchshe-originalov/', 'rwidget'), 'customlink3' => __('https://radiola.audio/dajdo-zhizn-posle-jeminema/', 'rwidget'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<h2>Внешний вид</h2>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Заголовок:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'player_back' ); ?>"><?php _e('Фон плеера:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'player_back' ); ?>" name="<?php echo $this->get_field_name( 'player_back' ); ?>" value="<?php echo $instance['player_back']; ?>" style="width:100%;" />	

			<label for="<?php echo $this->get_field_id( 'buttons_back' ); ?>"><?php _e('Цвет кнопок:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'buttons_back' ); ?>" name="<?php echo $this->get_field_name( 'buttons_back' ); ?>" value="<?php echo $instance['buttons_back']; ?>" style="width:100%;" />				
		</p>
		
		<h2>Радиостанции</h2>
		<p>
			<label for="<?php echo $this->get_field_id( 'radname1' ); ?>"><?php _e('Название первого потока:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radname1' ); ?>" name="<?php echo $this->get_field_name( 'radname1' ); ?>" value="<?php echo $instance['radname1']; ?>" style="width:100%;" />
			
			<label for="<?php echo $this->get_field_id( 'radstation1' ); ?>"><?php _e('Ссылка на первый поток:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radstation1' ); ?>" name="<?php echo $this->get_field_name( 'radstation1' ); ?>" value="<?php echo $instance['radstation1']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'radname2' ); ?>"><?php _e('Название второго потока:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radname2' ); ?>" name="<?php echo $this->get_field_name( 'radname2' ); ?>" value="<?php echo $instance['radname2']; ?>" style="width:100%;" />
		
			<label for="<?php echo $this->get_field_id( 'radstation2' ); ?>"><?php _e('Ссылка на второй поток:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radstation2' ); ?>" name="<?php echo $this->get_field_name( 'radstation2' ); ?>" value="<?php echo $instance['radstation2']; ?>" style="width:100%;" />
		</p>	
		<p>
			<label for="<?php echo $this->get_field_id( 'radname3' ); ?>"><?php _e('Название третьего потока:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radname3' ); ?>" name="<?php echo $this->get_field_name( 'radname3' ); ?>" value="<?php echo $instance['radname3']; ?>" style="width:100%;" />

			<label for="<?php echo $this->get_field_id( 'radstation3' ); ?>"><?php _e('Ссылка на третий поток:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radstation3' ); ?>" name="<?php echo $this->get_field_name( 'radstation3' ); ?>" value="<?php echo $instance['radstation3']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'radname4' ); ?>"><?php _e('Название четвёртого потока:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radname4' ); ?>" name="<?php echo $this->get_field_name( 'radname4' ); ?>" value="<?php echo $instance['radname4']; ?>" style="width:100%;" />
		
			<label for="<?php echo $this->get_field_id( 'radstation4' ); ?>"><?php _e('Ссылка на четвёртый поток:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radstation4' ); ?>" name="<?php echo $this->get_field_name( 'radstation4' ); ?>" value="<?php echo $instance['radstation4']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'radname5' ); ?>"><?php _e('Название пятого потока:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radname5' ); ?>" name="<?php echo $this->get_field_name( 'radname5' ); ?>" value="<?php echo $instance['radname5']; ?>" style="width:100%;" />
		
			<label for="<?php echo $this->get_field_id( 'radstation5' ); ?>"><?php _e('Ссылка на пятый поток:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'radstation5' ); ?>" name="<?php echo $this->get_field_name( 'radstation5' ); ?>" value="<?php echo $instance['radstation5']; ?>" style="width:100%;" />
		</p>		
		<input id="<?php echo $this->get_field_id('showtracks'); ?>" name="<?php echo $this->get_field_name('showtracks'); ?>" type="checkbox" value="1" <?php checked('1', $instance['showtracks']); ?>/>
	  	<label for="<?php echo $this->get_field_id('showtracks'); ?>"><?php _e('Показывать названия песен', 'rwidget'); ?></label><br>
		<h2>Слайдер</h2>
		<input id="<?php echo $this->get_field_id('showslider'); ?>" name="<?php echo $this->get_field_name('showslider'); ?>" type="checkbox" value="1" <?php checked('1', $instance['showslider']); ?>/>
	  	<label for="<?php echo $this->get_field_id('showslider'); ?>"><?php _e('Показывать слайдер', 'rwidget'); ?></label>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'customslide1' ); ?>"><?php _e('Изображение третьего слайда:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'customslide1' ); ?>" name="<?php echo $this->get_field_name( 'customslide1' ); ?>" value="<?php echo $instance['customslide1']; ?>" style="width:100%;" />

			<label for="<?php echo $this->get_field_id( 'customlink1' ); ?>"><?php _e('Ссылка третьего слайда:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'customlink1' ); ?>" name="<?php echo $this->get_field_name( 'customlink1' ); ?>" value="<?php echo $instance['customlink1']; ?>" style="width:100%;" />				
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'customslide2' ); ?>"><?php _e('Изображение четвёртого слайда:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'customslide2' ); ?>" name="<?php echo $this->get_field_name( 'customslide2' ); ?>" value="<?php echo $instance['customslide2']; ?>" style="width:100%;" />

			<label for="<?php echo $this->get_field_id( 'customlink2' ); ?>"><?php _e('Ссылка четвёртого слайда:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'customlink2' ); ?>" name="<?php echo $this->get_field_name( 'customlink2' ); ?>" value="<?php echo $instance['customlink2']; ?>" style="width:100%;" />				
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'customslide3' ); ?>"><?php _e('Изображение пятого слайда:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'customslide3' ); ?>" name="<?php echo $this->get_field_name( 'customslide3' ); ?>" value="<?php echo $instance['customslide3']; ?>" style="width:100%;" />

			<label for="<?php echo $this->get_field_id( 'customlink3' ); ?>"><?php _e('Ссылка пятого слайда:', 'rwidget'); ?></label>
			<input id="<?php echo $this->get_field_id( 'customlink3' ); ?>" name="<?php echo $this->get_field_name( 'customlink3' ); ?>" value="<?php echo $instance['customlink3']; ?>" style="width:100%;" />				
		</p>		
			<p>Выбрать подходящие для виджета радиостанции вы можете на портале <a href="https://radiola.audio">Radiola.Audio</a></p>
	<?php
	}
}

?>