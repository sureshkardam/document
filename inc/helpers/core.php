<? if ( ! defined('BASEDIR')) exit('Acces denied');
/*
|-------------------------------------------------------------------
| HELPERS CORE
|-------------------------------------------------------------------
| This file contains all the vital functions for your website
| 
*/


	//Load module
	function load_mod($file,$folder=''){
		if(is_file(BASEDIR.'helpers/'.$folder.$file.".php")){
			include BASEDIR."helpers/".$folder.$file.".php";
		}else{
			die('Helper <b>'.$file."</b> not found!");
		}
	}

	


	//Trim off unnecessary text
	function smart_trim($text, $max_len, $trim_middle = false, $trim_chars = '...')
	{
		$text = trim($text);

		if (strlen($text) < $max_len) {

			return $text;

		} elseif ($trim_middle) {

			$hasSpace = strpos($text, ' ');
			if (!$hasSpace) {
				/**
				 * The entire string is one word. Just take a piece of the
				 * beginning and a piece of the end.
				 */
				$first_half = substr($text, 0, $max_len / 2);
				$last_half = substr($text, -($max_len - strlen($first_half)));
			} else {
				/**
				 * Get last half first as it makes it more likely for the first
				 * half to be of greater length. This is done because usually the
				 * first half of a string is more recognizable. The last half can
				 * be at most half of the maximum length and is potentially
				 * shorter (only the last word).
				 */
				$last_half = substr($text, -($max_len / 2));
				$last_half = trim($last_half);
				$last_space = strrpos($last_half, ' ');
				if (!($last_space === false)) {
					$last_half = substr($last_half, $last_space + 1);
				}
				$first_half = substr($text, 0, $max_len - strlen($last_half));
				$first_half = trim($first_half);
				if (substr($text, $max_len - strlen($last_half), 1) == ' ') {
					/**
					 * The first half of the string was chopped at a space.
					 */
					$first_space = $max_len - strlen($last_half);
				} else {
					$first_space = strrpos($first_half, ' ');
				}
				if (!($first_space === false)) {
					$first_half = substr($text, 0, $first_space);
				}
			}

			return $first_half.$trim_chars.$last_half;

		} else {

			$trimmed_text = substr($text, 0, $max_len);
			$trimmed_text = trim($trimmed_text);
			if (substr($text, $max_len, 1) == ' ') {
				/**
				 * The string was chopped at a space.
				 */
				$last_space = $max_len;
			} else {
				/**
				 * In PHP5, we can use 'offset' here -Mike
				 */
				$last_space = strrpos($trimmed_text, ' ');
			}
			if (!($last_space === false)) {
				$trimmed_text = substr($trimmed_text, 0, $last_space);
			}
			return remove_trailing_punctuation($trimmed_text).$trim_chars;

		}

	}	

	//Smart pagination
	function remove_trailing_punctuation($text)
	{
		return preg_replace("'[^a-zA-Z_0-9]+$'s", '', $text);
	}

	function smart_pagination($page,$total,$limit,$url){
	global $ext;
	$lang['back']='Back';
	$lang['page']='Page';
	$lang['next']='Next';
		$adjacents = 2;
		$total_pages =$total;

		/* Setup page vars for display. */
		if ($page == 0) $page = 1;					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		
		$username=$ext;
		/* 
			Now we apply our rules and draw the pagination object. 
			We're actually saving the code to a variable in case we want to draw it more than once.
		*/
		$pagination = "";
		if($lastpage > 1)
		{	
			$pagination .= "<div class=\"pagination\">";
			//previous button
			if ($page > 1) 
				$pagination.= "<a href=\"".$url."$prev\">&laquo; ".$lang['back']."&nbsp;</a>";
			
			//pages	
			if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"".$url."$counter".$username."\">$counter</a>";					
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"".$url."$counter".$username."\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"".$url."$lpm1".$username."\">$lpm1</a>";
					$pagination.= "<a href=\"".$url."$lastpage".$username."\">$lastpage</a>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"".$url."1".$username."\">1</a>";
					$pagination.= "<a href=\"".$url."2".$username."\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"".$url."$counter".$username."\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"".$url."$lpm1".$username."\">$lpm1</a>";
					$pagination.= "<a href=\"".$url."$lastpage".$username."\">$lastpage</a>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"".$url."1".$username."\">1</a>";
					$pagination.= "<a href=\"".$url."2".$username."\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"".$url."$counter".$username."\">$counter</a>";					
					}
				}
			}
			
			//next button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"".$url."$next\" style='border-right:0px;'>&nbsp;".$lang['next']." &raquo;</a>";

			$pagination.= "</div>\n";		
		}
		return $pagination;
		}  
?>