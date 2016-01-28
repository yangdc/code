<?php
/*
 *复制目录
 *param:$sourceDir 需要复制的目录 $destDir 目标文件夹地址
 *return: (bool)
 */

 function copydir($sourceDir, $destDir){
	 if(!is_dir($sourceDir)){
		 return false;
	 }
	 
	 if(!is_dir($destDir)){
		 if(!mkdir($destDir)){
			 return false;
		 }
	 }
	 
	 $dir = opendir($sourceDir);
	 if(!$dir){
		 return false;
	 }
	 
	 while(false !== ($file=readdir($dir))){
		 if($file != '.' && $file != '..'){
			 if(is_dir($sourceDir.'/'.$file)){
				 if(!copydir($sourceDir.'/'.$file, $destDir.'/'.$file)){
					 return false;
				 }
			 }else{
				 if(!copy($sourceDir.'/'.$file, $destDir.'/'.$file)){
					 return false;
				 }
			 }
		 }
	 }
	 closedir($dir);
	 return true;
 }
 
 var_dump(copydir('./D1', './D1'));
