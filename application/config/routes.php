<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// $route['external_driver/(:any)'] = 'external/driver/is_agree/$1';
// $route['(:any)'] = 'external/driver/add/$1';




$route['default_controller'] = 'Home';
$route['login'] = 'Auth';
$route['admission'] = 'Auth/admission';
$route['event/(:any)'] = 'single/event/$1';
$route['old_event/(:any)'] = 'single/old_event/$1';
$route['video/(:any)'] = 'single/video/$1';
$route['lecture/(:any)'] = 'single/lecture/$1';
$route['course/(:any)'] = 'single/course/$1';
$route['video/playlist/(:any)'] = 'home/video_playlist/$1';
$route['audio/(:any)'] = 'single/audio/$1';
$route['audio/playlist/(:any)'] = 'home/audio_playlist/$1';
$route['academic/(:any)'] = 'single/academic/$1';
$route['welfare/(:any)'] = 'single/welfare/$1';
// $route['auth'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['upload'] = 'Upload';



$url_seg = $this->uri->segment(1);
$urls = array();
$files = array();
/*controllers*/

	$directory = APPPATH.'controllers';

    if ($handle = opendir($directory)) {

	    while (false !== ($entry = readdir($handle))) {

	        if ($entry != "." && $entry != "..") {

	            $files[] = $entry;
	        }
	    }

	    closedir($handle);
	}

    foreach ($files as $file ) {
        // str_replace("world","Peter","Hello world!");
        if(pathinfo($file, PATHINFO_EXTENSION) == 'php'){
            $urls[] = basename(strtolower(str_replace('_',' ',$file)), '.php');
        }
    }

// $route['([a-zA-Z0-9_-]+)'] = 'message/view/$1';
if(!in_array($url_seg, $urls))
$route['(:any)'] = 'page/index/$1';
