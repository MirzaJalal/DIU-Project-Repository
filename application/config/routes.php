<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['404_override'] 		 = 'error404'; //override by controller
$route['default_controller'] = 'front';



/*
!---------------------------------------------------
! 	Controller For Admin Profile
!---------------------------------------------------
*/
$route['admin'] 		  		= 'admin/admin/index';
$route['admin/dashboard'] 	  	= 'admin/admin/dashboard';
$route['admin/settings'] 	  	= 'admin/admin/settings';
$route['admin/profile'] 	  	= 'admin/admin/profile';
$route['admin/profile_update']  = 'admin/admin/profile_update';
$route['admin/settings']  		= 'admin/admin/settings';
$route['admin/logout'] 		  	= 'admin/logout'; 


$route['student'] 		  	= 'web/student'; 
$route['student/register'] 	= 'web/student/register'; 
$route['student/profile/(:any)'] 	= 'web/student/profile/$1'; 
$route['student/account_settings'] 	= 'web/student/account_settings'; 
$route['student/logout'] 	= 'web/student/logout'; 
$route['upload'] 		   = 'web/student/upload'; 


/*
!---------------------------------------------------
! 	Public Project
!---------------------------------------------------
*/
$route['project/(:num)'] 		= 'project/index/$1'; 
$route['project/view/(:any)'] 	= 'project/view/$1'; 
$route['blog/(:num)'] 			= 'front/blog/$1';
$route['blog/category/(:num)'] 	= 'front/blog_bycategory/$1';
$route['blog/view/(:any)'] 		= 'front/blog_view/$1'; 
$route['about-us'] 				= 'front/about_us'; 
$route['download/(:any)'] 		= 'web/student/download/$1'; 
$route['follow/(:num)'] 		= 'web/student/follow/$1'; 



$route['department'] 					= 'project/department'; 
$route['department_wise_project/(:num)/(:num)'] 	    = 'project/department_wise_project/$1/$2'; 



$route['translate_uri_dashes'] 	= FALSE;


