<?php

class Bus{
	public $armed = false;
	public $exploded = false;
	public $speed = 20;
	
	function setSpeed($speed){
	 $this->speed = $speed;
	  if($this->speed > 50){
	    $this->armed = true;
	    
	  } else {
	  
		$this->exploded = true;
	}  
		return $this->armed;
	}
	
	function getSpeed(){
	  return $this->speed;
	}
	
	function trigger(){
		$this->exploded = true;
		return $this->exploded;
	}

}

class Tester{
  public $passed = 0;
  public $failed = 0;
  
  function test($a, $b){
  	if($a == $b){
  		$this->passed = $this->passed + 1;
  		return true; 
  	} else {
  		echo "FAILED: expected $b, got $a</br>";
  		$this->failed = $this->failed + 1;
  		return false;
  	}
  }
}
  
?>
