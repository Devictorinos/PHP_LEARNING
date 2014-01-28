<?php 
/**
 * A class to The aim of this project is to make the interaction between javascript, jquery, php and HTML5 easier.
 * @author Juan Chaves, juan.cha63@gmail.com
 * @version 0.1
 * Copyright (C) 2013 Juan Chaves
 * This program is free software; distributed under the artistic license.
 */ 
class je5_html5_php { 
    //canvas
    /**
    *@var private $_type canvas video audio etc.
	*@param string
    */	
    private $_type;
    /**
    *@var private $_container tags id
	*@param string
    */	
	private $_container;
    /**
    *@var private $_fillStyle color fill
	*@param string
    */	
    private $_fillStyle;
    /**
    *@var private $_strokeStyle color stroke
	*@param string
    */	
	private $_strokeStyle;
    /**
    *@var private $_color1 color start gradient
	*@param string
    */	
	private $_color1;
    /**
    *@var private $_color2 color end gradient
	*@param string
    */	
	private $_color2;
    /**
    *@var private $_shadow_c shadow color
	*@param string
    */		
	private $_shadow_c;
    /**
    *@var private $_shadow_b shadow Blur
	*@param numeric
    */		
	private $_shadow_b;
    /**
    *@var private $_shadow_ox shadow placed value pixels to the right
	*@param numeric
    */		
	private $_shadow_ox;
    /**
    *@var private $_shadow_oy shadow placed value pixels below the rectangle's top position
	*@param numeric
    */		
	private $_shadow_oy;
    /**
    *@var private $_lineWidth Draw with a line width of value pixels
	*@param numeric
    */		
	private $_lineWidth;
    /**
    *@var private $_rotate Rotate the rectangle value degrees
	*@param numeric
    */	
	private $_rotate;
    /**
    *@var private $_traslate_x rectangle now starts in position x
	*@param numeric
    */		
	private $_traslate_x;
    /**
    *@var private $_traslate_y rectangle now starts in position y
	*@param numeric
    */		
	private $_traslate_y;
    /**
    *@var private $_draw rectangle circle line etc...
	*@param string
    */		
	private $_draw;
    /**
    *@var private $_x position coordinate x
	*@param numeric
    */		
	private $_x;
    /**
    *@var private $_y position coordinate y
	*@param numeric
    */		
	private $_y;
    /**
    *@var private $_width width
	*@param numeric
    */		
	private $_width;
    /**
    *@var private $_height height
	*@param numeric
    */		
	private $_height;
    /**
    *@var private $_moveTo_x move to position x
	*@param numeric
    */		
	private $_moveTo_x;
    /**
    *@var private $_moveTo_y move to position y
	*@param numeric
    */	
	private $_moveTo_y;
    /**
    *@var private $_lineTo_x  line to position x
	*@param numeric
    */	
	private $_lineTo_x;
    /**
    *@var private $_lineTo_y  line to position y
	*@param numeric
    */	
	private $_lineTo_y;
    /**
    *@var private $_lineCap Draw a line with rounded end caps
	*@param numeric
    */	
	private $_lineCap;
    /**
    *@var private $_r radius
	*@param numeric
    */	
	private $_r;
    /**
    *@var private $_start start arc
	*@param numeric
    */	
	private $_start;
    /**
    *@var private $_stop end arc
	*@param numeric
    */	
	private $_stop;
    /**
    *@var private $_clockwise Optional. Specifies whether the drawing should be 
	* counterclockwise or clockwise. False is default, and indicates clockwise, 
	* while true indicates counter-clockwise.
	*@param boolean
    */	
	private $_clockwise;
    /**
    *@var private $_scale_x scale x
	*@param numeric
    */	
	private $_scale_x;
    /**
    *@var private $_scale_y $_scale_y scale y
	*@param numeric
    */	
	private $_scale_y;
    /**
    *@var private $_x1 quadraticCurveTo and bezierCurveTo position x 1
	*@param numeric
    */	
	private $_x1;
    /**
    *@var private $_y1 quadraticCurveTo and bezierCurveTo position y 1
	*@param numeric
    */	
	private $_y1;
    /**
    *@var private $_x2 quadraticCurveTo and bezierCurveTo position x 2
	*@param numeric
    */	
	private $_x2;
    /**
    *@var private $_y2 quadraticCurveTo and bezierCurveTo position y 2
	*@param numeric
    */	
	private $_y2;
    /**
    *@var private $_x3 quadraticCurveTo and bezierCurveTo position x 3
	*@param numeric
    */	
	private $_x3;
    /**
    *@var private $_y3 quadraticCurveTo and bezierCurveTo position y 3
	*@param numeric
    */	
	private $_y3;
    /**
    *@var private $_repeat move to position y
	*@param numeric
    */	
	private $_repeat;
    /**
    *@var private $_img url to image
	*@param string
    */	
	private $_img;
    /**
    *@var private $_xMove moveXImage position x
	*@param numeric
    */	
	private $_xMove;
    /**
    *@var private $_yMove moveXImage position y
	*@param numeric
    */	
	private $_yMove;
    /**
    *@var private $_widthMove move Width
	*@param numeric
    */	
	private $_widthMove;
    /**
    *@var private $_heightMove move height
	*@param numeric
    */	
	private $_heightMove;
    /**
    *@var private $_font font tex
	*@param string
    */	
	private $_font;
    /**
    *@var private $_text type text
	*@param string
    */	
	private $_text;
    /**
    *@var private $_closePath Draw a path
	*@param bolean
    */	
	private $_closePath;
	//media
    /**
    *@var private $_link links media
	*@param string
    */	
	private $_link;
    /**
    *@var private $_codecs codecs media
	*@param string
    */	
	private $_codecs;
    /**
    *@var private $_auto auto start media
	*@param boolean
    */	
	private $_auto;
    /**
    *@var private $_muted muted media
	*@param boolean
    */	
	private $_muted;
    /**
    *@var private $_controls move to position y
	*@param numeric
    */	
	private $_controls;
    /**
    *@var private $_loop loop media
	*@param boolen
    */	
	private $_loop;
    /**
    *@var private $_preload preload media
	*@param boolean
    */	
	private $_preload;
    /**
    *@var private $_alert alert media
	*@param streang
    */	
	private $_alert;

	public function embed() {  
		$this->_type = $this->type;
		$this->_container = $this->container;
		//canvas
        	$this->_fillStyle = $this->fillStyle;
		$this->_strokeStyle = $this->strokeStyle;
		$this->_color1 = $this->color1;
		$this->_color2 = $this->color2;		
		$this->_shadow_c = $this->shadow_c;
		$this->_shadow_b = $this->shadow_b;
		$this->_shadow_ox = $this->shadow_ox;
		$this->_shadow_oy = $this->shadow_oy;
		$this->_lineWidth = $this->lineWidth;
		$this->_rotate = $this->rotate;
		$this->_traslate_x = $this->traslate_x;
		$this->_traslate_y = $this->traslate_y;
		$this->_draw = $this->draw;
		$this->_x = $this->x;
		$this->_y = $this->y;
		$this->_width = $this->width;
		$this->_height = $this->height;
		$this->_moveTo_x = $this->moveTo_x;
		$this->_moveTo_y = $this->moveTo_y;
		$this->_lineTo_x = $this->lineTo_x;	
		$this->_lineTo_y = $this->lineTo_y;
		$this->_lineCap = $this->lineCap;
		$this->_r = $this->r;	
		$this->_start = $this->start;
		$this->_stop = $this->stop;
		$this->_clockwise = $this->clockwise;
		$this->_scale_x = $this->scale_x;
		$this->_scale_y = $this->scale_y;
		$this->_x1 = $this->x1;
		$this->_y1 = $this->y1;
		$this->_x2 = $this->x2;
		$this->_y2 = $this->y2;		
		$this->_x3 = $this->x3;
		$this->_y3 = $this->y3;
		$this->_repeat = $this->repeat;
		$this->_img = $this->img;
		$this->_xMove = $this->xMove;
		$this->_yMove = $this->yMove;
		$this->_widthMove = $this->widthMove;
		$this->_heightMove = $this->heightMove;
		$this->_font = $this->font;
		$this->_text = $this->text;
		$this->_closePath = $this->closePath;
		//media
		$this->_link = $this->link;
		$this->_codecs = $this->codecs;
		$this->_auto = $this->auto;
		$this->_muted = $this->muted;
		$this->_controls = $this->controls;
		$this->_loop = $this->loop;
		$this->_preload = $this->preload;
		$this->_alert = $this->alert; 
		return $this->_embed();
	}
	
    	private function _embed() {
		if($this->_height) {
			$echo_height_je5 = 'height:'.$this->_height.',';
		}
		if($this->_width) {
			$echo_width_je5 = 'width:'.$this->_width.',';
		}
		if($this->_draw) {
			$echo_draw_je5 = 'draw:\''.$this->_draw.'\',';
		}
		if($this->_x) {
			$echo_x_je5 = 'x:'.$this->_x.',';
		}
		if($this->_y) {
			$echo_y_je5 = 'y:'.$this->_y.',';
		}
		if($this->_lineWidth) {
			$echo_lineWidth_je5 = 'lineWidth:'.$this->_lineWidth.',';
		}
		if($this->_rotate) {
			$echo_rotate_je5 = 'rotate:'.$this->_rotate.',';
		}
		if($this->_traslate_x) {
			$echo_traslate_x_je5 = 'traslate_x:'.$this->_traslate_x.',';
		}
		if($this->_traslate_y) {
			$echo_traslate_y_je5 = 'traslate_y:'.$this->_traslate_y.',';
		}
		if($this->_color1) {
			$echo_color1_je5 = 'color1:\''.$this->_color1.'\',';
		}
		if($this->_color2) {
			$echo_color2_je5 = 'color2:\''.$this->_color2.'\',';
		}
		if($this->_shadow_c) {
			$echo_shadow_c_je5 = 'shadow_c:\''.$this->_shadow_c.'\',';
		}
		if($this->_shadow_b) {
			$echo_shadow_b_je5 = 'shadow_b:\''.$this->_shadow_b.'\',';
		}
		if($this->_shadow_ox) {
			$echo_shadow_ox_je5 = 'shadow_ox:'.$this->_shadow_ox.',';
		}
		if($this->_shadow_oy) {
			$echo_shadow_oy_je5 = 'shadow_oy:'.$this->_shadow_oy.',';
		}
		if($this->_strokeStyle) {
			$echo_strokeStyle_je5 = 'strokeStyle:\''.$this->_strokeStyle.'\',';
		}
		if($this->_fillStyle) {
			$echo_fillStyle_je5 = 'fillStyle:\''.$this->_fillStyle.'\',';
		}
		if($this->_start) {
			$echo_start_je5 = 'start:'.$this->_start.',';
		}	
		if($this->_stop) {
			$echo_stop_je5 = 'stop:'.$this->_stop.',';
		}			
		if($this->_r) {
			$echo_r_je5 = 'r:'.$this->_r.',';
		}
		if($this->_moveTo_x) {
			$echo_moveTo_x_je5 = 'moveTo_x:'.$this->_moveTo_x.',';
		}			
		if($this->_moveTo_y) {
			$echo_moveTo_y_je5 = 'moveTo_y:'.$this->_moveTo_y.',';
		}				
		if($this->_lineTo_x) {
			$echo_lineTo_x_je5 = 'lineTo_x:'.$this->_lineTo_x.',';
		}				
		if($this->_lineTo_y) {
			$echo_lineTo_y_je5 = 'lineTo_y:'.$this->_lineTo_y.',';
		}
		if($this->_lineCap) {
			$echo_llineCap_je5 = 'lineCap:\''.$this->_lineCap.'\',';
		}
		if($this->_clockwise) {
			$echo_clockwise_je5 = 'clockwise:'.$this->_clockwise.',';
		}
		if($this->_scale_x) {
			$echo_scale_x_je5 = 'scale_x:'.$this->_scale_x.',';
		}			
		if($this->_scale_y) {
			$echo_scale_y_je5 = 'scale_y:'.$this->_scale_y.',';
		}			
		if($this->_x1) {
			$echo_x1_je5 = 'x1:'.$this->_x1.',';
		}
		if($this->_y1) {
			$echo_y1_je5 = 'y1:'.$this->_y1.',';
		}
		if($this->_x2) {
			$echo_x2_je5 = 'x2:'.$this->_x2.',';
		}
		if($this->_y2) {
			$echo_y2_je5 = 'y2:'.$this->_y2.',';
		}
		if($this->_x3) {
			$echo_x3_je5 = 'x3:'.$this->_x3.',';
		}
		if($this->_y3) {
			$echo_y3_je5 = 'y3:'.$this->_y3.',';
		}				
		if($this->_repeat) {
			$echo_repeat_je5 = 'repeat:\''.$this->_repeat.'\',';
		}				
		if($this->_img) {
			$echo_img_je5 = 'img:\''.$this->_img.'\',';
		}				
		if($this->_xMove) {
			$echo_xMove_je5 = 'xMove:'.$this->_xMove.',';
		}	
		if($this->_yMove) {
			$echo_yMove_je5 = 'yMove:'.$this->_yMove.',';
		}			
		if($this->_widthMove) {
			$echo_widthMove_je5 = 'widthMove:'.$this->_widthMove.',';
		}				
		if($this->_heightMove) {
			$echo_heightMove_je5 = 'heightMove:'.$this->_heightMove.',';
		}
		if($this->_font) {
			$echo_font_je5 = 'font:\''.$this->_font.'\',';
		}
		if($this->_text) {
			$echo_text_je5 = 'text:\''.$this->_text.'\',';
		}
		if($this->_closePath) {
			$echo_closePath_je5 = 'closePath:'.$this->_closePath.',';
		}
		if($this->_link) {
			$echo_link_je5 = 'link:\''.$this->_link.'\',';
		}				
		if($this->_codecs) {
			$echo_codecs_je5 = 'codecs:\''.$this->_codecs.'\',';
		}	
		if($this->_auto) {
			$echo_auto_je5 = 'auto:'.$this->_auto.',';
		}			
		if($this->_muted) {
			$echo_muted_je5 = 'muted:'.$this->_muted.',';
		}				
		if($this->_controls) {
			$echo_controls_je5 = 'controls:'.$this->_controls.',';
		}
		if($this->_loop) {
			$echo_loop_je5 = 'loop:\''.$this->_loop.'\',';
		}
		if($this->_preload) {
			$echo_preload_je5 = 'preload:\''.$this->_preload.'\',';
		}
		if($this->_alert) {
			$echo_alert_je5 = 'alert:\''.$this->_alert.'\',';
		}		
		
		switch ($this->_type) {
		case 'canvas':			
			$result = '<script>';
			$result .= '$(\'#'.
				$this->_container.'\').je5({ sort:\'canvas\', '.
					$echo_draw_je5.' '.
					$echo_start_je5.' '.
					$echo_stop_je5.' '.
					$echo_r_je5.' '.
					$echo_x_je5.' '.
					$echo_y_je5.' '.
					$echo_width_je5.' '.
					$echo_height_je5.' '.
					$echo_lineWidth_je5.' '.
					$echo_rotate_je5.' '.
					$echo_traslate_x_je5.' '.
					$echo_traslate_y_je5.' '.
					$echo_lineTo_x_je5.' '.
					$echo_lineTo_y_je5.' '.
					$echo_moveTo_x_je5.' '.
					$echo_moveTo_y_je5.' '.					
					$echo_llineCap_je5.' '.
					$echo_x1_je5.' '.
					$echo_y1_je5.' '.
					$echo_x2_je5.' '.
					$echo_y2_je5.' '.
					$echo_x3_je5.' '.
					$echo_y3_je5.' '.
					$echo_repeat_je5.' '.
					$echo_img_je5.' '.
					$echo_xMove_je5.' '.
					$echo_yMove_je5.' '.
					$echo_widthMove_je5.' '.
					$echo_heightMove_je5.' '.
					$echo_font_je5.' '.
					$echo_text_je5.' '.
					$echo_closePath_je5.' '.
					$echo_clockwise_je5.' '.
					$echo_scale_x_je5.' '.
					$echo_scale_y_je5.' '.
					$echo_color1_je5.' '.
					$echo_color2_je5.' '.
					$echo_shadow_c_je5.' '.
					$echo_shadow_b_je5.' '.
					$echo_shadow_ox_je5.' '.
					$echo_shadow_oy_je5.' '.				
					$echo_strokeStyle_je5.' '.
					$echo_fillStyle_je5.
				' });';
			$result .= '</script>';
			return $result;
			break;
		case 'media':
			$result = '<script>';
			$result .= '$(\'#'.
					$this->_container.'\').je5({ sort:\'media\', '.
					$echo_link_je5.' '.
					$echo_codecs_je5.' '.
					$echo_auto_je5.' '.
					$echo_muted_je5.' '.
					$echo_controls_je5.' '.
					$echo_loop_je5.' '.
					$echo_preload_je5.' '.
					$echo_alert_je5.' '.
					$echo_width_je5.' '.
					$echo_height_je5.
				' });';
			$result .= '</script>';
			return $result;
			break;
		}
         
    } 
    
} 

?>

<!doctype html>
	<html lang="en">
	<head>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://je5.es/js/plugin-jquery/plugin-jquery-je5-beta.0.1.js"></script>
		<meta charset="utf-8">
		<title>Class HTML5 php demo</title>
	</head>	
		<h1>Class HTML5 php demo</h1>
		<h2>HTML5 Move</h2>	
		<p id="pos"></p>
		<canvas id="stars" width="500" height="500"></canvas>
		<pre>	
		$canvas = new je5_html5_php();
		//rectangle	
		$canvas->type = 'canvas';
		$canvas->container = 'stars';
		$canvas->draw = 'rectangle';
		$canvas->x = 10;
		$canvas->y = 10;
		$canvas->width = 500;
		$canvas->height = 500;
		$canvas->fillStyle = '#000';
		echo $canvas->embed();
		$canvas = new je5_html5_php();
		$canvas->type = 'canvas';
		$canvas->container = 'stars';		
		$canvas->draw = 'circle';	
		$canvas->x = 200;
		$canvas->y = 200; 
		$canvas->r = 100; 
		$canvas->start = 100;
		$canvas->stop = 100; 
		$canvas->fillStyle = 'orange';
		$canvas->lineWidth = 50; 
		$canvas->strokeStyle = 'blue';
		$canvas->shadow_c = 'blue'; 
		$canvas->shadow_b = 100; 
		$canvas->shadow_ox = 5; 
		$canvas->shadow_oy = 5;
		echo $canvas->embed();
		$canvas = new je5_html5_php();
		$canvas->type = 'canvas';
		$canvas->container = 'stars';	
		$canvas->draw = 'tex'; 	
		$canvas->fillStyle = '#000';
		$canvas->font = 'italic 35pt Calibri';
		$canvas->strokeStyle = '#fff'; 	
		$canvas->lineWidth = 1.7; 	
		$canvas->text = 'Move the mouse here';
		$canvas->x = 50;
		$canvas->y = 220;	
		$canvas->shadow_c = 'blue'; 
		$canvas->shadow_b = 20; 
		$canvas->shadow_ox = 10; 
		$canvas->shadow_oy = 10;	
		echo $canvas->embed();
		echo '
		&#60;script&#62;
			$(\'#stars\').mousemove(function( event ) {
				var clientCoords = "( " + event.clientX + ", " + event.clientY + " )";
				$(\'#move\').attr(\'style\', \'position:absolute;top: \'+event.clientY+\'px; left:\'+event.clientX+\'px\');
				if(event.clientY > 269 && event.clientY < 302) {
					$(\'#stars\').remove();
					$(\'#move\').remove();					
					$(\'#pos\').html(\'&#60;video id="stars_video"&#62;&#60;/video&#60;\');
					$(\'#stars_video\').je5({
						sort:\'media\',
						link:\'http://je5.es/je5_media/salvador.webm,http://je5.es/je5_media/salvador_x264.mp4\',
						codecs:\'VP8,H.264\',
						auto:1,
						muted:1,
						controls:1,
						loop:\'1\',
						preload:\'auto\',
						alert:\'Your browser does not support the video tag.\',
						width:500,
						height:300
					});					
				}
			});
		&#60;/script&#62;';	
		</pre>
		<p><canvas id="move" width="100" height="100"></canvas></p>	
		<h2>HTML5 Canvas Text</h2>
		<br /><canvas id="text" width="700" height="150"></canvas>
		<pre>
		$canvas = new je5_html5_php();
		//text
		$canvas->type = 'canvas'; 
		$canvas->container = 'text';
		$canvas->draw = 'tex'; 	
		$canvas->font = 'italic 40pt Calibri'; 
		$canvas->text = 'Welcome to';
		$canvas->fillStyle = 'red'; 
		$canvas->x = 50;
		$canvas->y = 50;
		echo $canvas->embed();		
		$canvas->text = 'jquery je5 plugin and class!';
		$canvas->fillStyle = 'red';
		$canvas->strokeStyle = '#000'; 
		$canvas->lineWidth = 1.7; 
		$canvas->x = 90;
		$canvas->y = 100;
		$canvas->shadow_c = 'yellow';
		$canvas->shadow_b = 27;
		$canvas->shadow_ox = 10;
		$canvas->shadow_oy = 10;		
		echo $canvas->embed();
		</pre>
		<h2>HTML5 Canvas Rectangle</h2>
		<canvas id="rectangle" width="300" height="150"></canvas>
		<pre>
		$canvas = new je5_html5_php();
		//rectangle	
		$canvas->type = 'canvas';
		$canvas->container = 'rectangle';
		$canvas->draw = 'rectangle';
		$canvas->x = 10;
		$canvas->y = 10;
		$canvas->width = 250;
		$canvas->height = 100;
		$canvas->fillStyle = 'red';
		echo $canvas->embed();
		//new rectangle
		$canvas->x = 20;
		$canvas->y = 20;	
		$canvas->fillStyle = 'blue';
		echo $canvas->embed();
		//new rectangle
		$canvas->x = 30;
		$canvas->y = 30;	
		$canvas->fillStyle = '#a00';
		echo $canvas->embed();
		</pre>
		<h2>HTML5 Canvas Circle</h2>
		<canvas id="circle" width="300" height="150"></canvas>
		<pre>
		//circle
		$canvas->container = 'circle';	
		$canvas->draw = 'circle';	
		$canvas->fillStyle = 'red';
		$canvas->x = 200;
		$canvas->y = 75; 
		$canvas->r = 54; 
		$canvas->start = 50;
		$canvas->stop = 50; 
		$canvas->fillStyle = 'yellow';
		$canvas->lineWidth = 2; 
		$canvas->strokeStyle = 'blue';
		$canvas->shadow_c = 'blue'; 
		$canvas->shadow_b = 20; 
		$canvas->shadow_ox = 0; 
		$canvas->shadow_oy = 0;
		echo $canvas->embed();
		echo '
			&#60;script type=\"text/javascript"&#62;
				jQuery.fn.intermittent = function() {
					this.each(function(){ 
						elem = $(this); 
						elem.fadeOut(550, 
						function(){ 
							$(this).fadeIn(550); 
						}); 
					}); 
					return this; 
				};
				setInterval(function(){
					$("#circle").intermittent();
				},24);
			&#60;/script&#62;';
		</pre>		
		<h2>HTML5 Canvas Rotate</h2>		
		<p><canvas id="rotate" width="578" height="400"></canvas></p>
		<pre>
		$rotate = new je5_html5_php();
		//rotate img
		$rotate->type = 'canvas'; 
		$rotate->container = 'rotate';
		$rotate->draw = 'img';
		$rotate->img = 'http://www.egeon.es/sites/default/files/canvas.png';
		$rotate->x = 0;
		$rotate->y = 0;	
		$rotate->width = 300; 
		$rotate->height = 200;
		$rotate->traslate_x = 10; 
		$rotate->traslate_y = 10; 
		$rotate->rotate = 0.2;
		echo $rotate->embed();
		</pre>
		<h2>HTML5 Video</h2>		
		<p><video id="media_video" width="300" height="150"></video></p>
		<pre>
		$media = new je5_html5_php();
		//media video
		$media->type = 'media';
		$media->container = 'media_video';	
		$media->link = 'http://je5.es/je5_media/salvador.webm,http://je5.es/je5_media/salvador_x264.mp4';//urls separate ','
		$media->codecs = 'VP8,H.264';//codecs separate ',' order by links           
		$media->img = 'http://je5.es/je5_media/salvador.jpg';
		$media->controls = true;
		$media->auto = true;
		$media->muted = true;
		$media->loop = true;
		$media->preload = 'auto';//load tipes: auto, metadata, none
		$media->width = 500;
		$media->height = 300;
		$media->alert = 'Your browser does not support the video tag.';	
		echo $media->embed();
		</pre>
		<h2>HTML5 Canvas Line</h2>
		<canvas id="line" width="300" height="150"></canvas>		
		<pre>
		$canvas = new je5_html5_php();
		//line
		$canvas->type = 'canvas';
		$canvas->container = 'line';
		$canvas->draw = 'line'; 
		$canvas->strokeStyle = 'yellow';
		$canvas->lineWidth = 5;
		$canvas->lineCap = 'round';
		$canvas->moveTo_x = 10;
		$canvas->moveTo_y = 10;
		$canvas->lineTo_x = 200;
		$canvas->lineTo_y = 100; 
		$canvas->shadow_c = 'red';
		$canvas->shadow_b = 27;
		$canvas->shadow_ox = 10;
		$canvas->shadow_oy = 10;
		echo $canvas->embed();
		echo '
		&#60;script type="text/javascript"&#62;
			var ini = 1;
			jQuery.fn.animation = function() {
				this.each(function(){ 
					elem = $(this); 
					elem.fadeOut(250, 
					function(){ 
						$(this).fadeIn(250);
						if(ini == 1) {
							$(this).animate({height: "200px"}, 700);
							ini = 0;
						} else {							
							$(this).animate({height: "2px"}, 700);							
							ini = 1;							
						}
						
					}); 
				}); 
				return this; 
			};
			setInterval(function(){
				$("#line").animation();
			},24);
		&#60;/script&#62;';
		</pre>			
<?php

	$canvas = new je5_html5_php();
	//rectangle	
	$canvas->type = 'canvas';
	$canvas->container = 'stars';
	$canvas->draw = 'rectangle';
	$canvas->x = 10;
	$canvas->y = 10;
	$canvas->width = 500;
	$canvas->height = 500;
	$canvas->fillStyle = '#000';
	echo $canvas->embed();
	$canvas = new je5_html5_php();
	$canvas->type = 'canvas';
	$canvas->container = 'stars';		
	$canvas->draw = 'circle';	
	$canvas->x = 200;
	$canvas->y = 200; 
	$canvas->r = 100; 
	$canvas->start = 100;
	$canvas->stop = 100; 
	$canvas->fillStyle = 'orange';
	$canvas->lineWidth = 50; 
	$canvas->strokeStyle = 'blue';
	$canvas->shadow_c = 'blue'; 
	$canvas->shadow_b = 100; 
	$canvas->shadow_ox = 5; 
	$canvas->shadow_oy = 5;
	echo $canvas->embed();
	$canvas = new je5_html5_php();
	$canvas->type = 'canvas';
	$canvas->container = 'stars';	
	$canvas->draw = 'tex'; 	
	$canvas->fillStyle = '#000';
	$canvas->font = 'italic 35pt Calibri';
	$canvas->strokeStyle = '#fff'; 	
	$canvas->lineWidth = 1.7; 	
	$canvas->text = 'Move the mouse here';
	$canvas->x = 50;
	$canvas->y = 220;	
	$canvas->shadow_c = 'blue'; 
	$canvas->shadow_b = 20; 
	$canvas->shadow_ox = 10; 
	$canvas->shadow_oy = 10;	
	echo $canvas->embed();
	echo '
		<script>	
			$(\'#stars\').mousemove(function( event ) {
				var clientCoords = "( " + event.clientX + ", " + event.clientY + " )";
				$(\'#move\').attr(\'style\', \'position:absolute;top: \'+event.clientY+\'px; left:\'+event.clientX+\'px\');
				if(event.clientY > 320 && event.clientY < 342) {
					$(\'#stars\').remove();
					$(\'#move\').remove();					
					$(\'#pos\').html(\'<video id="stars_video"></video>\');
					$(\'#stars_video\').je5({
						sort:\'media\',
						link:\'http://je5.es/je5_media/salvador.webm,http://je5.es/je5_media/salvador_x264.mp4\',
						codecs:\'VP8,H.264\',
						auto:1,
						muted:1,
						controls:1,
						loop:\'1\',
						preload:\'auto\',
						alert:\'Your browser does not support the video tag.\',
						width:500,
						height:300
					});					
				}
			});
		</script>';
	
	$move = new je5_html5_php();
	//move
	$move->type = 'canvas';
	$move->container = 'move';
	$move->draw = 'tex'; 	
	$move->font = 'italic 30pt Calibri'; 
	$move->text = 'je5';
	$move->fillStyle = 'red'; 
	$move->x = 30;
	$move->y = 30;
	echo $move->embed();
	
	$canvas = new je5_html5_php();
	//rectangle	
	$canvas->type = 'canvas';
	$canvas->container = 'rectangle';
	$canvas->draw = 'rectangle';
	$canvas->x = 10;
	$canvas->y = 10;
	$canvas->width = 250;
	$canvas->height = 100;
	$canvas->fillStyle = 'red';
	echo $canvas->embed();
	
	//new rectangle
	$canvas->x = 20;
	$canvas->y = 20;	
	$canvas->fillStyle = 'blue';
	echo $canvas->embed();
	
	//new rectangle
	$canvas->x = 30;
	$canvas->y = 30;	
	$canvas->fillStyle = '#a00';
	echo $canvas->embed();
		
	//circle
	$canvas->container = 'circle';	
	$canvas->draw = 'circle';	
	$canvas->fillStyle = 'red';
	$canvas->x = 200;
	$canvas->y = 75; 
	$canvas->r = 54; 
	$canvas->start = 50;
	$canvas->stop = 50; 
	$canvas->fillStyle = 'yellow';
	$canvas->lineWidth = 2; 
	$canvas->strokeStyle = 'blue';
	$canvas->shadow_c = 'blue'; 
	$canvas->shadow_b = 20; 
	$canvas->shadow_ox = 0; 
	$canvas->shadow_oy = 0;
	echo $canvas->embed();	
	echo '
		<script type="text/javascript">
			jQuery.fn.intermittent = function() {
				this.each(function(){ 
					elem = $(this); 
					elem.fadeOut(550, 
					function(){ 
						$(this).fadeIn(550); 
					}); 
				}); 
				return this; 
			};
			setInterval(function(){
				$("#circle").intermittent();
			},24);
		</script>';
		
	$canvas = new je5_html5_php();
	//line
	$canvas->type = 'canvas';
	$canvas->container = 'line';
	$canvas->draw = 'line'; 
	$canvas->strokeStyle = 'yellow';
	$canvas->lineWidth = 5;
	$canvas->lineCap = 'round';
	$canvas->moveTo_x = 10;
	$canvas->moveTo_y = 10;
	$canvas->lineTo_x = 200;
	$canvas->lineTo_y = 100; 
	$canvas->shadow_c = 'red';
	$canvas->shadow_b = 27;
	$canvas->shadow_ox = 10;
	$canvas->shadow_oy = 10;
	echo $canvas->embed();
	echo '
		<script type="text/javascript">
			var ini = 1;
			jQuery.fn.animation = function() {
				this.each(function(){ 
					elem = $(this); 
					elem.fadeOut(250, 
					function(){ 
						$(this).fadeIn(250);
						if(ini == 1) {
							$(this).animate({height: "200px"}, 700);
							ini = 0;
						} else {							
							$(this).animate({height: "2px"}, 700);							
							ini = 1;							
						}
						
					}); 
				}); 
				return this; 
			};
			setInterval(function(){
				$("#line").animation();
			},1000);
		</script>';	
	
	$canvas = new je5_html5_php();
	//text
	$canvas->type = 'canvas'; 
	$canvas->container = 'text';
	$canvas->draw = 'tex'; 	
	$canvas->font = 'italic 40pt Calibri'; 
	$canvas->text = 'Welcome to';
	$canvas->fillStyle = 'red'; 
	$canvas->x = 50;
	$canvas->y = 50;
	echo $canvas->embed();		
	$canvas->text = 'jquery je5 plugin and class!';
	$canvas->fillStyle = 'red';
	$canvas->strokeStyle = '#000'; 
	$canvas->lineWidth = 1.7; 
	$canvas->x = 90;
	$canvas->y = 100;
	$canvas->shadow_c = 'yellow';
	$canvas->shadow_b = 27;
	$canvas->shadow_ox = 10;
	$canvas->shadow_oy = 10;	
	echo $canvas->embed();

	$rotate = new je5_html5_php();
	//rotate img
	$rotate->type = 'canvas'; 
	$rotate->container = 'rotate';
	$rotate->draw = 'img';
	$rotate->img = 'http://www.egeon.es/sites/default/files/canvas.png';
	$rotate->x = 0;
	$rotate->y = 0;	
	$rotate->width = 300; 
	$rotate->height = 200;
	$rotate->traslate_x = 10; 
	$rotate->traslate_y = 10; 
	$rotate->rotate = 0.2;
	echo $rotate->embed();
	
	$media = new je5_html5_php();
	//media video
	$media->type = 'media';
	$media->container = 'media_video';	
	$media->link = 'http://je5.es/je5_media/salvador.webm,http://je5.es/je5_media/salvador_x264.mp4';//urls separate ','
	$media->codecs = 'VP8,H.264';//codecs separate ',' order by links           
	$media->img = 'http://je5.es/je5_media/salvador.jpg';
	$media->controls = true;
	$media->auto = true;
	$media->muted = true;
	$media->loop = true;
	$media->preload = 'auto';//load tipes: auto, metadata, none
	$media->width = 500;
	$media->height = 300;
	$media->alert = 'Your browser does not support the video tag.';	
	echo $media->embed();	
?>		
	</body>
</html>