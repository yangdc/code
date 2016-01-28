<?php
/*
 *遍历目录
 *param:$dir 需要遍历的目录
 *return:文件结构的数组
 */
function scanAll($dir){
	$dirArr = array();   
	$child = scandir($dir);
	foreach($child as $c){
		if($c !== '.' && $c !=='..'){
			if(is_dir($dir.'/'.$c)){
				$dirArr["$c"] = scanAll($dir.'/'.$c);
			}elseif(is_file($dir.'/'.$c)){
				array_push($dirArr, $c);
			}	
		}
	}
	return $dirArr;
}


