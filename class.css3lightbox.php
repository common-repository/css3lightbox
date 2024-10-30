<?php

add_filter ( 'the_content' , 'css3');
//global $content;
function css3 ( $content ) {

		$master_pattern = '%<a[^>]+><img([^>])+></a>%'; // for regular images
		

		if ( preg_match_all ( $master_pattern , $content , $links ) ) {

			foreach ( $links[0] as $link ) {
			    //define ('counter');
				$counter +=1;
				$img_thumbnail_src = preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $link, $matchesthumb);
				$img_fullimage_src = preg_match('/href=["\']?([^"\'>]+)["\']?/', $link, $matchesfull);
				
				$replacestring = '<div class="lb-album"><a href="#image-'.$counter.'"><img src="'.$matchesthumb[1].'" alt="image-'.$counter.'"><span></span></a></div>
                   <a href="#" class="close">
				   <div class="lb-overlay" id="image-'.$counter.'">
                   <img src="'.$matchesfull[1].'" alt="image-'.$counter.'">
                   </div></a>';
				
					  
					  $content = str_replace ( $link, $replacestring, $content);
				
			}
			

		}

		return $content;
	}
	


function buffer_end() { 
ob_end_flush(); 
}

	function buffer_start() { 
	ob_start("css3"); 
	}


?>