<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
*
*
** Name : twitter feed shortcode
*/
class CuckooTwitter {

	var $cache_duration_hour = 2;

	function __construct(){
		add_shortcode( 'tweet', array( &$this, 'shortcode') );	
	}

	/**
	 * Display an error (not used yet)
	 */
	function twitter_error(){

		$output = '<p>'.__('Sorry, could not load tweets.', 'cuckoothemes').'</p>';
		
		if ( is_user_logged_in() )
			$output = '<p>'.__('Sorry, could not load tweets. Please double check your twitter username.', 'cuckoothemes').'</p>';

		return $output;
	}

	/**
	* Get the Twitter XML feed 
	*/
	function get_twitter_feed($username, $id){
		$id_tra = rand(1,10000);
		$trans_key = 'cuckoo_tweet_'.$username.'_'.$id_tra.'_'.$id;
		$url = "http://wolftwitter.wpwolf.com/username/$username";
		$cache_duration = ceil($this->cache_duration_hour*3600);
		if( $cache_duration < 3600 )
			$cache_duration = 3600;

		if ( false === ( $cached_data = get_transient( $trans_key ) ) ){

			if( function_exists('curl_init') ){
				$c = curl_init($url);
				curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($c, CURLOPT_HEADER, 0);
				curl_setopt($c, CURLOPT_TIMEOUT, 10);
				$data = curl_exec($c);
				curl_close($c);
			} else {
				$data = file_get_contents($url);
			}
			
			if ($data){
				set_transient( $trans_key, $data, $cache_duration ); 
			}
		}else{

			$data = $cached_data;
		}
			
		return  json_decode($data);
	}

	/**
	* Display tweets as list or single tweet 
	*/
	function twitter( $username, $count = 3, $size = null, $color = null, $text_align = null, $data_size = null, $id, $link_color = null, $font_weight = null ){
		
		$tweet ='';
		$style ='';
		$data_size = $data_size ? ' style="font-size:'.$data_size.';"' : '';
		$data = $this->get_twitter_feed($username, $id);
		if( $size or $color or $text_align ){
			$size = $size ? 'font-size:'.$size.';' : '';
			$font_weight = $font_weight ? ' font-weight:'.$font_weight.';' : '';
			$color = $color ? ' color:'.$color.';' : '';
			$text_align = $text_align ? ' text-align:'.$text_align.';' : '';
			$style=' style="'.$size.$color.$text_align.$font_weight.'"';
		}
		
		if( $data ){
			if($data[0]){
				$tweet .= "<ul".$style." id=\"shortcode-".$id."\" class=\"tweets-list-container\">"; 
				for ($i=0; $i<$count; $i++){
					if(isset($data[$i])){
						$content = $data[$i]->text;
						$created = $data[$i]->created_at;
						$ids = $data[$i]->id_str;
						$tweet_link = "https://twitter.com/$username/statuses/$ids";
						
						$tweet .= "<li class=\"tweet-list\">";   
						$tweet .= "<p class=\"tweet_text\">".$this->twitter_to_link($content)."</p>";
						$tweet .= "<span".$data_size." class=\"twitt-create-time\"><a href=\"$tweet_link\" target=\"_blank\">". $this->twitter_time_ago($created)."</a></span>"; 
						$tweet .= "</li>";
					}
				}
				$tweet .= "</ul>";
				if($link_color){
					$tweet .= "<style type='text/css'>#shortcode-".$id." li a { color:".$link_color."; }</style>";
				}
			}else{
				$tweet = $this->twitter_error();
			}
		}else{
			$tweet = $this->twitter_error();
		}
		
		return $tweet;
	}

	/**
	* Find url strings, tags and username strings and make them as link
	**/
	function  twitter_to_link($text) {
		// Match URLs
		$text = preg_replace('`\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))`', '<a href="$0" target="_blank">$0</a>', $text);

		// Match @name
		$text = preg_replace('/(@)([a-zA-Z0-9\_]+)/', '<a href="https://twitter.com/$2" target="_blank">@$2</a>', $text);

		// Match #hashtag
		$text = preg_replace('/(#)([a-zA-Z0-9\_]+)/', '<a href="https://twitter.com/search/?q=$2" target="_blank">#$2</a>', $text);
		    return $text;
	}
		    
	/**
	* Convert the twitter date to "X ago" type
	*/        
	function   twitter_time_ago($date){
		$h         = date("H", strtotime($date));
		$m         = date("i", strtotime($date));
		$s         = date("s", strtotime($date));
		$d         = date("d", strtotime($date));
		$m         = date("m", strtotime($date));
		$y         = date("Y", strtotime($date));
		$timestamp = mktime($h,$m,$s,$m,$d,$y);
		$stf       = 0;
		$cur_time  = time();
		$diff      = $cur_time - $timestamp;
		$phrase = array(__('second', 'wolf'),__('minute', 'wolf'),__('hour', 'wolf'),__('day', 'wolf'),__('week', 'wolf'),__('month', 'wolf'),__('year', 'wolf'),__('decade', 'wolf'));
		$length = array(1,60,3600,86400,604800,2630880,31570560,315705600);
		for($i =sizeof($length)-1; ($i >=0)&&(($no =  $diff/$length[$i])<=1); $i--); if($i < 0) $i=0; $_time = $cur_time  -($diff%$length[$i]);
		$no = floor($no); if($no <> 1) $phrase[$i] .='s'; $value=sprintf("%d %s ",$no,$phrase[$i]);
		if(($stf == 1)&&($i >= 1)&&(($cur_tm-$_time) > 0)) $value .= time_ago($_time);
		return $value.' '.__('ago', 'wolf');
	} 

	// --------------------------------------------------------------------------


	/**
	* Shortcode
	*/ 
	function shortcode($atts){

		extract(shortcode_atts(array(
		    'username'  => 'cuckoothemes',
		    'count'  => '5',
		    'id'  => '1',
			'size' => '',
			'color' => '',
			'text_align' => '',
			'data_size' => '',
			'link_color' => '',
			'font_weight' => 'bold',
		), $atts));

		return $this->twitter($username, $count, $size, $color, $text_align, $data_size, $id, $link_color, $font_weight);	
	}


} // end class

global $twitter_cuckoo;
$twitter_cuckoo = new CuckooTwitter;


?>