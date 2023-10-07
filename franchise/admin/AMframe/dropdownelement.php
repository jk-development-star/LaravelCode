<?php

class dropdown {
    //=====================================================================================
    /* Drop Down List From Database Tables */
    //======================================================================================
    function get_dropdown($db,$query,$chkfor) {
        $qrycondition = "" ;
        $droplist = "";
        $rs=$db->get_all("$query");
        for($i=0;$i<count($rs);$i
		++) {
            $dropval=$rs[$i][0];
            $dropcont =$rs[$i][1];

            if($dropval == $chkfor)
                $select="selected";
            else
                $select="";

            $droplist .="<option value=\"$dropval\" $select>$dropcont</option>";
        }
        return $droplist;
    }
	
	
	function get_dropdown_assoc($db,$query,$chkfor) {
        $qrycondition = "" ;
        $droplist = '';
        $rs=$db->get_all("$query");
        for($i=0;$i<count($rs);$i++) {
            $dropval=$rs[$i][0];
            if($dropval == $chkfor)
                $select="selected";
			else if(strtolower($dropval)==$chkfor)
				$select="selected";
            else
                $select="";

            $droplist .="<option value='$dropval' $select>$dropval</option>";
        }
        return $droplist;
    }
	
	function get_dropdown_multiple($db,$query,$chkfor) {
        
		//$browsers = $db->gell_all_assoc("select ")
		$chkfor = explode(',',$chkfor);
		$qrycondition = "" ;
        $droplist = '';
        $rs=$db->get_all("$query");
        for($i=0;$i<count($rs);$i++) {
            $dropval=$rs[$i][0];
            $dropcont =$rs[$i][1];
			
			for($j=0;$j<count($chkfor);$j++)
			{
				if($dropval == $chkfor[$j]){
					$select="selected";
					break;
					}
					
				else
					$select="";
			}
            $droplist .="<option value=\"$dropval\" $select>$dropcont</option>";
        }
        return $droplist;
    }
	
	
	function get_dropdownall($db,$query,$chkfor) {
        $qrycondition = "" ;
        $droplist = '';
        $rs=$db->get_all("$query");
        for($i=0;$i<count($rs);$i++) {
            $dropval=$rs[$i][0];
            $dropcont =$rs[$i][1];

			$myArray = explode(',', $chkfor);
			for($i=0;$i<count($myArray);$i++) {
			  if($dropval == $myArray[$i])
			  {
			   $select="selected";
				$droplist .="<option value=\"$dropval\" $select>$dropcont</option>";
			  }
               
				 else{
				  $select="";
                  $droplist .="<option value=\"$dropval\" $select>$dropcont</option>";
				 }
               
			}
			
        }
        return $droplist;
    }
    //=====================================================================================
	function get_2_dropdown($db,$query,$chkfor) {
        $qrycondition = "" ;
        $droplist = '';
        $rs=$db->get_all("$query");
        for($i=0;$i<count($rs);$i++) {
            $dropval=$rs[$i][0];
            $dropcont =$rs[$i][1];
			$dropcont2 =$rs[$i][2]."%";

            if($dropval == $chkfor)
                $select="selected";
            else
                $select="";

            $droplist .="<option value=\"$dropval\" $select>$dropcont - $dropcont2</option>";
        }
        return $droplist;
    }
}//end class
?>