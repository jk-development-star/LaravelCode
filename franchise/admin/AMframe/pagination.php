<?php
 function limitation($itemPerPage){
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		$page = (int)$_GET['page'];
	} else {
		$page = 1;
	}
	$offset = ($page - 1) * $itemPerPage;
	return " LIMIT $offset, $itemPerPage";
}
 function getPagingQuery1($sql, $itemPerPage = 20){
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		$page = (int)$_GET['page'];
	} else {
		$page = 1;
	}
	// start fetching from this row number
	$offset = ($page - 1) * $itemPerPage;
	//echo $sql."LIMIT $offset,$itemPerPage";
	return $sql . " LIMIT $offset, $itemPerPage";	
}
function getPagingLink1($sql, $itemPerPage = 20,$strGet,$db){
	$first=isset($first)?$first:'';
	$prev=isset($prev)?$prev:'';
	$next=isset($next)?$next:'';
	$last=isset($last)?$last:'';
	$result        = $db->get_all_assoc($sql);
	$pagingLink    = '';
	$totalResults  = count($result);	
	$totalPages    = ceil($totalResults / $itemPerPage);
	// how many link pages to show
	$numLinks      = 4;
	// create the paging links only if we have more than one page of results
	if ($totalPages > 1){
		$self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];//$_SERVER['PHP_SELF'];
		
		$last_two=substr($self,-1);
		if($last_two=='&'){
		$self=substr($self,0,strlen($self)-1);	
		}
		
		$length = strlen($self);
		$pagepos = $length+1;
		
		if(strpos($self,'page=')!==false){
		$pagepos = strpos($self,'page=');
		}
		if(empty($_SERVER['QUERY_STRING']) || ($_SERVER['QUERY_STRING']=="top")){
		$self.='?';			
		}else{
		$self.='&';	
		}
		
        $self = str_replace('??','?',$self);
		$self = substr($self,0,$pagepos);
		//echo $self;
		
		
		if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
			$pageNumber = (int)$_GET['page'];
		} else {
			$pageNumber = 1;
		}
		
		
		/* $getext = substr(strrchr($self, '?'), 1);
		if($getext !="")
			$getext=$self; */
		
		// print 'previous' link only if we're not
		// on page one
		if ($pageNumber > 1) {
			$page = $pageNumber - 1;
			if ($page > 1) {
				$prev = "<li><a href='$self"."page=$page'>Previous</a></li>";
			} else {
				$prev = "<li><a href='$self"."$strGet'> Previous</a></li>";
			}	
				
			$first = "<li><a href='$self"."$strGet'>First</a></li>";
		}
		// print 'next' link only if we're not
		// on the last page
		if ($pageNumber < $totalPages) {
			$page = $pageNumber + 1;
			$next = "<li><a href='$self"."page=$page'>Next</a></li>";
			$last = "<li><a href='$self"."page=$totalPages'>Last</a></li>";
		}
		$start = $pageNumber - ($pageNumber % $numLinks) + 1;
		$end   = $start + $numLinks - 1;		
		
		$end   = min($totalPages, $end);
		
		$pagingLink = array();
		for($page = $start; $page <= $end; $page++)	{
			if ($page == $pageNumber) {
			    
				$pagingLink[] = "<li class='active'><a href='#'>$page</a></li>";   // no need to create a link to current page
			} else {
				if ($page == 1) {
				  
					$pagingLink[] = "<li><a href='$self"."$strGet'>$page</a></li>";
				} else {	
				 
					$pagingLink[] = "<li><a href='$self"."page=$page'>$page</a></li>";
				}	
			}
		}
		
		$pagingLink = implode('  ', $pagingLink);
		
		// return the page navigation link
		$pagingLink = "<ul class=\"pagination remove-margin-pagination\" id=\"pagination-flickr\">". $first . $prev . $pagingLink . $next . $last ."</ul>";
	}
	//$getext = substr(strrchr($self, '?'), 1);

	return $pagingLink;
}
 ?>