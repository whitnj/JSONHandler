<?php
/*
Title:JSON API Handler
Description:Grabs data from API and creates a JSON file locally.
Author:Joshua Whitney
Date: 4/5/2018
*/

class jsonHandler
{
	
	public static function jsonGet($fileName,$apiURL,$timeZone)
	{
		
		date_default_timezone_set($timeZone);//Determine timezone
		
		$fileTime=date("H:i",filemtime($fileName));//get previous update time.
		
		$updateTime=date('H:i', strtotime($fileTime . " +2 hours"));//determine time needs to be updated next.	
		
		$currentTime=date('H:i');//determine current time.
		
		if($currentTime>=$updateTime){
			
			$grabAPI =  file_get_contents($apiURL);//grabs data from API
			
			if($grabAPI===false)
			{
				
				echo 'no data';
				
			}//if ends
			
			else
			{
				$jsonFile = fopen($fileName, "w") or die("Unable to open file!");//Opens file stream
				
				$content = $grabAPI;//Fills content variable to write to file
				
				fwrite($jsonFile, $content);//Writes to file
				
				fclose($jsonFile);//Closes file stream.
			}//else ends
			
		}//compare current time with update time to see if you need to update json file.
		
		else
		{
		
			echo 'Do nothing its '.$currentTime.'. Next update will be '.$updateTime.'';//Returns error file does not need to be updated.
		
		}//else ends
			
	}//static function ends
	
}//Class ends
?>