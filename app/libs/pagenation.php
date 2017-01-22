<?PHP
/*
The MIT License (MIT)

 * Copyright (c) 2016 Benjamin Wong, benjamin-w@hotmail.com
 * https://github.com/yben56/pagenation
 * Dependencies - jquery-3.1.1, Bootstrap v3.3.6

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), 
to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, 
and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, 
DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Usage
	1. Required Bootstrap (However you can create your own css if you don't like Bootstrap's style)
		wrapper css -	.pagination
		previous css -	.previous
		next css -		.next
		on css -		.active
		
	2. First 3 param, must have
		$rows -		rows count from database
		$get -		$_GET['']'s name
		$url -		the url you wish for each buttons

	3. You can change buttons size to pagination-sm, pagination-lg (default will be pagination-md)
	
	4. You can change previous & next button to any text you like (default will be < >)
*/

//pagination
function pageNation($rows, $get, $url, $size = FALSE, $previous = FALSE, $next = FALSE){
	
	if ( $size == FALSE ) { $size = ""; }
	
	if ( $previous == FALSE ) { $previous = "<"; }
	if ( $next == FALSE ) { $next = ">"; }
	
	if ( isset($_GET[$get]) ) { $page = $_GET[$get]; } else { $page = 1; }
		
	if ( !is_numeric($page) ) { die("Page Number must be a number."); }
	
	echo "<ul class='pagination ".$size."'>";
	
	//PREVIOUS BTN
	if ( $page > 1 ) {
		echo "<li class='previous'><a href='$url".($page - 1)."'>".$previous."</a></li>";
	}

	if ( $rows > 1 ) {
	
		//IF PAGES MORE THAN 10
		if ( $rows > 10 ) {
			
			if ( $page < 5 ) {
				//START
				$s = 1; $e = 11 - $page;
			} else {
				//MIDDLE
				$s = $page - 4; $e = 6;
			}
			
			//END - PAGE START NUM KEEP CHANGE UNTIL HIT LAST 5
			if( $page > $rows - 5 ) {
				$s = $rows-9;
			}
		
			for ( $s; $s <= $rows; $s++ ) {
				//BOLD
				if ( $s == $page ) {
					echo "<li class='active'><a>".$s." </a></li>";
				} else {
					if ( $s < $page+$e ) {
						echo "<li><a href='$url".$s."'>".$s." </a></li>";
					}
				}					
			}
		} else{
			for ( $n = 1; $n <= $rows; $n++ ) {
				if ( $n == $page ) {
					echo "<li class='active'><a>".$n." </a></li>";
				} else {
					echo "<li><a href='$url".$n."'>".$n." </a></li>";
				}
			}
		}
	}
	
	//NEXT BTN
	if ( $page < $rows ) {
		echo "<li class='next'><a href='$url".($page + 1)."'>".$next."</a></li>";
	}
	
	echo "</ul>";
}
?>