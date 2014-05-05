<?php

/**
 * Function to display array
 * @param $asData string or array or object
 * @param $ssFlag boolean
 */
function _pr($asData,$ssFlag = FALSE)
{
	if($ssFlag == TRUE)
	{
		echo "<pre>";print_r($asData);exit;
	}
	else
	{
		echo "<pre>";print_r($asData);
	}
}

/**
 * Function for change Date formate
 * @Param $ssFormate = string of date formate
 * @Param $ssDate = date
 * return Date
 */
function dateFormate($ssFormate,$ssDate)
{
	if($ssDate != '' && $ssFormate != '')
	{
		$ssStrToTime= strtotime($ssDate);
		return date($ssFormate,$ssStrToTime);
	}
	return false;
}



