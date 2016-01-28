<?php
/*
 *删除目录
 *param:$dir(string) 需要删除的文件夹
 *return: (bool)
 */

 function deldir($dir){
	 
	 if(!is_dir($dir)){
		 return false;
	 }
	 
	 $dh = opendir($dir);
	 while($file = readdir($dh)){
		 if($file != '.' && $file != '..'){
			 $fullpath = $dir.'/'.$file;
			 if(!is_dir($fullpath)){
				 unlink($fullpath);
			 }else{
				 deldir($fullpath);
			 }
		 }
	 }
	 closedir($dh);
	 
	 if(rmdir($dir)){
		 return true;
	 }
	 
	 return false;
 }
 
 var_dump(deldir('./D2'));

