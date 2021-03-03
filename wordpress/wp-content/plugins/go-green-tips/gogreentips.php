<?php
/*
Plugin Name: Green Living Tips
Plugin URI: http://www.iwasinturkey.com/blog/green-living-tips
Description: Displays green tips for Green Living
Author: Onur Kocatas
Version: 3.0.4
Author URI: http://www.iwasinturkey.com/blog/green-living-tips
*/
	$currentLocale = get_locale();
	if(!empty($currentLocale)) {
		$moFile = dirname(__FILE__) . "/go-green-tips-" . $currentLocale . ".mo";
		if(@file_exists($moFile) && is_readable($moFile)) load_textdomain('go-green-tips', $moFile);
	}
/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'go_green_tips_load_widgets' );

/* Function that registers our widget. */
function go_green_tips_load_widgets() {
	register_widget( 'Go_Green_Tips_Widget' );
}

class Go_Green_Tips_Widget extends WP_Widget {
function Go_Green_Tips_Widget() {

/* Widget settings. */
$widget_ops = array( 'classname' => 'Go_Green_Tips', 'description' => 'Displays green tips for Green Living.' );

/* Widget control settings. */
$control_ops = array( 'width' => 200,  'id_base' => 'go-green-tips-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'go-green-tips-widget', 'Go Green Tips', $widget_ops, $control_ops );
	}
	
	
	function widget( $args, $instance ) {
		extract( $args );

/* User-selected settings. */
$title = apply_filters('widget_title', $instance['title'] );
$css = $instance['css'];


/* Before widget (defined by themes). */
		echo $before_widget;

/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

/*some work*/
$i1='1_fluorescent_bulbs.jpg';
$i2='3_hang_to_dry.jpg';
$i3='5_use_both_side_paper.jpg';
$i4='6_get_rid_of_bath.jpg';
$i5='7_no_bottled_water.jpg';
$i6='9_shorten_shower.jpg';
$i7='10_recycle_glass.jpg';
$i8='13_turn_down_thermostat.jpg';
$i9='14_turn_off_light.jpg';
$i10='17_dont_get_phonebook.jpg';
$i11='18_give_things_away.jpg';
$i12='19_car_wash.jpg';
$i13='21_rechargeable_batteries.jpg';
$i14='22_pay_your_bill.jpg';
$i15='23_reusable_bag.jpg';
$i16='25_inflate_tire.jpg';
$i17='27_plant_tree.jpg';
$i18='29_ride_bike.jpg';


/*translate below this*/
$h1=__('Change to fluorescent bulbs', 'go-green-tips');
$h2=__('Hang outside to dry', 'go-green-tips');
$h3=__('Use both sides of paper', 'go-green-tips');
$h4=__('Get rid of baths', 'go-green-tips');
$h5=__('Do not get bottled water', 'go-green-tips');
$h6=__('Shorten your shower', 'go-green-tips');
$h7=__('Recycle glass', 'go-green-tips');
$h8=__('Turn down your thermostat', 'go-green-tips');
$h9=__('Turn off your lights', 'go-green-tips');
$h10=__('Do not get a paper phone book', 'go-green-tips');
$h11=__('Give things away', 'go-green-tips');
$h12=__('Go to a car wash', 'go-green-tips');
$h13=__('Buy rechargeable batteries', 'go-green-tips');
$h14=__('Pay your bills online', 'go-green-tips');
$h15=__('Get a reusable bag', 'go-green-tips');
$h16=__('Inflate your tires', 'go-green-tips');
$h17=__('Plant a tree', 'go-green-tips');
$h18=__('Walk or ride your bike when you can', 'go-green-tips');
$t1=__('If every house in the United States changed all of the light bulbs in their house, that would be equivalent to taking one million cars off the streets.', 'go-green-tips');
$t2=__('Get a clothes line or rack to dry your cloths. Your clothes will last longer and you will save money.', 'go-green-tips');
$t3=__('If you have a printer with a double sided print option, use it. You will save half of the amount of paper you would have normally used.', 'go-green-tips');
$t4=__('Do not take baths, take showers. You will save about half the amount of water that you would if you were taking a bath.', 'go-green-tips');
$t5=__('Instead of bottled water get a reusable container to carry water. Also you can get a filter to make your home tap taste more like bottled water. It is definitely more cost efficient.', 'go-green-tips');
$t6=__('Every minute you cut from your shower is roughly 5 gallons of water. The less time your shower takes, the lower your impact on the environment.', 'go-green-tips');
$t7=__('If you do not recycle this, it will take a million years to decompose.', 'go-green-tips');
$t8=__('Every degree lower in the winter or higher in the summer you put it is a 10 percent decrease on your energy bill.', 'go-green-tips');
$t9=__('Turn off your lights when you are not using them. The benefits are obvious.', 'go-green-tips');
$t10=__('Instead of getting a paper phone book. Use a online directory instead.', 'go-green-tips');
$t11=__('Take things that you are not going to wear or use and give it to a charity or someone who will use it.', 'go-green-tips');
$t12=__('Going to a car wash is a lot more water efficient then washing your car at home.', 'go-green-tips');
$t13=__('Even though it will take a good investment to buy these you will find yourself gaining it back in no time.', 'go-green-tips');
$t14=__('If every house in the US did this then we would save 18 million trees every year.', 'go-green-tips');
$t15=__('You can not recycle plastic bags, instead get yourself a reusable bag so that you will not have to worry about carrying your necessities.', 'go-green-tips');
$t16=__('If your tires are inflated at all times your car will run more miles on less gas.', 'go-green-tips');
$t17=__('It is good for the air, can keep you cool, and can increase your property value.', 'go-green-tips');
$t18=__('If you have to go somewhere close consider riding your bike or walking there instead of your car. It is better on the environment and healthier.', 'go-green-tips');
/*translate ends*/

$num = Rand (1,18);
switch ($num)
{
case 1:$h = $h1;$t = $t1;$i=$i1;break;
case 2:$h = $h2;$t = $t2;$i=$i2;break;
case 3:$h = $h3;$t = $t3;$i=$i3;break;
case 4:$h = $h4;$t = $t4;$i=$i4;break;
case 5:$h = $h5;$t = $t5;$i=$i5;break;
case 6:$h = $h6;$t = $t6;$i=$i6;break;
case 7:$h = $h7;$t = $t7;$i=$i7;break;
case 8:$h = $h8;$t = $t8;$i=$i8;break;
case 9:$h = $h9;$t = $t9;$i=$i9;break;
case 10:$h = $h10;$t = $t10;$i=$i10;break;
case 11:$h = $h11;$t = $t11;$i=$i11;break;
case 12:$h = $h12;$t = $t12;$i=$i12;break;
case 13:$h = $h13;$t = $t13;$i=$i13;break;
case 14:$h = $h14;$t = $t14;$i=$i14;break;
case 15:$h = $h15;$t = $t15;$i=$i15;break;
case 16:$h = $h16;$t = $t16;$i=$i16;break;
case 17:$h = $h17;$t = $t17;$i=$i17;break;
case 18:$h = $h18;$t = $t18;$i=$i18;
}



//echo the chosen line
echo  '<style type="text/css">
#GGT {-moz-border-radius:5px;background-color:#8cc540;padding:5px;font-family:Georgia,Times,"Times New Roman",serif;font-size:12px;}
div#GGT div.gotogreen {padding:0 0 3px;text-align:center;}
div#GGT div.gotogreen a{color:#FFFFFF;font-size:13px;font-weight:bold;text-decoration:none;}
div#GGT div.gotogreen a:hover{color:#ccc;}
';

if($css==1){	
echo  '
#GGT div.go_green_tips{-moz-border-radius:5px;background-color:#FFFFFF;padding:3px;display:inline-block;}
#GGT div.go_green_tips img{float:left;margin:0 3px 0 0;border:0px;}
#GGT div.go_green_tips .go_green_tips_text{color:#333;}
' ;
} else {
echo  '
#GGT div.go_green_tips{-moz-border-radius:5px;background-color:#FFFFFF;padding:3px;text-align:center;display:inline-block;}
#GGT div.go_green_tips img{border:0px;}
#GGT div.go_green_tips .go_green_tips_text{float:left;text-align:left;color:#333;}
' ;
}



echo 'div#GGT a.ggt_add{bottom:11px;float:right;position:relative;right:-5px;}
div#GGT a.ggt_add img{margin:0px;padding:0px;border:0px;}</style>' ;
	echo '<div id="GGT"><div class="gotogreen"><a href="http://www.iwasinturkey.com/blog/green-living-tips">Green Living Tips</a></div><div class="go_green_tips"><img src="'.plugins_url('/go-green-tips/').''.$i.'"><div class="go_green_tips_text"><strong>'.$h.'</strong><br/>'.$t.'</div></div><a href="http://www.iwasinturkey.com/blog/green-living-tips#download" alt="Add this to your site" class="ggt_add"><img src="'.plugins_url('/go-green-tips/').'add.gif" alt="Add this to your site"></a></div>';

/* After widget*/
		echo $after_widget;
	}
	
	
/* Update the widget settings.*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

/* Strip tags */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['css'] = strip_tags( $new_instance['css'] );
		return $instance;
	}
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Green Living Tips', 'css' => '0');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'go-green-tips') ?></label>
<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'css' ); ?>"><?php _e('Style', 'go-green-tips') ?></label>
			<select name="<?php echo $this->get_field_name( 'css' ); ?>" id="<?php echo $this->get_field_id( 'css' ); ?>" class="widefat">
				<option value="0" <?php if ($instance ['css'] == '0') echo 'selected'; ?>><?php _e('Vertical', 'go-green-tips') ?></option>
				<option value="1" <?php if ($instance ['css'] == '1') echo 'selected'; ?>><?php _e('Horizontal', 'go-green-tips') ?></option>
			</select>
		</p>
		
<?php
	}
}
?>