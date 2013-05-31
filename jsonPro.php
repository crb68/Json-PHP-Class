<?php
//Casey Balzer
//Media Post
// 4-6-13
//crb68@pitt.edu   
    
    //recursively lists json array requires a path
    function jsonList($path)
    {
     $data=file_get_contents($path);
     $json_a = json_decode($data, true);
     $test = checkIsEmpty($json_a);
    
        if($test==1)
	    {
	        foreach($json_a as $key => $value)
             {
              echo $key.":";
              $test = checkIsList($value);
              
              if($test==0)
                 {
                 echo $value."</br>";
                 }
              
             }//end foreach	     
	    }
	    else
	    {
	    return $test;
	    }

    }
    
    //just checks if json is empty
    function checkIsEmpty($data)
    {
    $count=count($data);
  
    if($count < 1) {
    return 0;
    }
    else{
    return 1;
    }  
   }//end checkIsEmpty
   
   //just checks for nested associative arrays or normal arrays
   function checkIsList($value)
   {
       if(is_array($value))
       {
       
         
         if($value == array_values($value))
         {
          $count=count($value);
          
              for($i=0;$i<$count;$i++)
              {
               $count2=$i+1;
                 if($count2 < $count)
                 {
                 echo " ".$value[$i].",";
                 }
                 else
                 {
                  echo " ".$value[$i];
                 }
              }
              echo "</br>";
              return 1;
         }
        else
        {  
          foreach($value as $key2 => $value2)
            {
            
              echo $key2.":";
              $test = checkIsList($value2);
                 
                 if($test==0)
                 {
                 echo ":".$value2."</br>";
                 }
            }//end foreach   
            return 1;     
        }//end else
       }//end outter if
       else
       {
       return 0;
       }
   }//end checkIsList()
   
    //add a key and value, takes a key, a value and path
   function addValue($k,$v,$path)
   {
   $data=file_get_contents($path);
   $json_a = json_decode($data, true);
   $json_a[$k] = $v;
   $json_c=$json_a;
   $data = json_encode($json_c);
   file_put_contents($path, $data); 
   return $json_c;
   
   }//end addValue()
   
   //unset entire json
  function jsonUnset($path)
  {
  $data=file_get_contents($path);
   $json_a = json_decode($data, true);
  $count=count($json_a);
    if($count >= 1)
    {
  foreach ($json_a as $key => $value){
      unset($json_a[$key]);
       }
      $json_c=$json_a;
      $data = json_encode($json_a);
      file_put_contents($path, $data); 
      return $json_c;
      }
      else
      {
      return 0;
      }
  } //end jsonUnset
  
   //use this function to return a specific key value or to get the structure to edit
   //I get it, its a test but the nesting is silly so just giving
   //the user the opportunity to get a value from key, the user can then edit to his
   // or her hearts desire and just replace the existing key with edited value
   function returnVal($key,$path)
   {
   $data=file_get_contents($path);
   $json_a = json_decode($data, true);
      foreach($json_a as $key2 => $value)
      {
         if($key==$key2)
         {
          return $value;
         }
      } 
      return 0;
   
}//end return value
  
  //function added to always obtain multi dimensional array whenever you choose
  function retMultiDim($path)
  {
   $data=file_get_contents($path);
   $json_a = json_decode($data, true);
    return $json_a;
  }
  //unset a specific key include path
  function jsonUnsetKey($k,$path)
  {
  
  $data=file_get_contents($path);
  $json_a = json_decode($data, true);
  unset($json_a[$k]);
  $json_c=$json_a;
  $data = json_encode($json_a);
  file_put_contents($path, $data); 
      return $json_c;
  }//end jsonUnsetKey

?>