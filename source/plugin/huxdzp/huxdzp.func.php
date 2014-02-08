<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class getValues{
    public function inputValue($inputArray){
        $this->inputArray=$inputArray;
    }
    public function getValue($number){
        $this->number=$number;
        for ($i=0;$i<$this->number;$i++){
            $index=rand(0,count($this->inputArray)-1-$i);
            $getArray[$i]=$this->inputArray[$index];
            unset($this->inputArray[$index]);
            for($k=$index;$k<count($this->inputArray)-1;$k++)
                {
                    $this->inputArray[$k]=$this->inputArray[$k+1];
                }
            }
        asort ($getArray);//从小到大排序，根据需要修改
        return $getArray;
    }
}
?>