<? 
    if(!function_exists('in_multiarray')) {
      function in_multiarray($elem, $array)
      {
        $top = sizeof($array) - 1;
        $bottom = 0;
        while($bottom <= $top)
        {
          if($array[$bottom] == $elem)
            return true;
          else 
            if(is_array($array[$bottom]))
              if(in_multiarray($elem, ($array[$bottom])))
                return true;
            $bottom++;
        }
        return false;
			}
		}
?>
