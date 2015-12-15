<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__.'/RegexRouter.php';

$router = new RegexRouter();

// Parameter di dalam kurung
// url: /blog/regex/21
// 
$router->route('/^\/blog\/(\w+)\/(\d+)\/?$/', function($category, $id){
    echo "category={$category}, id={$id}";
 });

// url: /category/post-artikel/2
// 
$router->route('/^\/(\w+)\/(post-\w+)\/(\d+)\/?$/', function($cons, $slug, $id){
    echo "$cons , $slug , $id";
 });

// static page, url: /about
// 
$router->route('/^\/about\/?$/', function(){
    require __DIR__.'/about.php';
 });

// home page
// 
$router->route('/^\/?$/', function(){
	require __DIR__.'/home.php';
});

// eksekusi paling bawah
// 
$router->execute($_SERVER['REQUEST_URI'], function(){
	require __DIR__.'/error.php';
});
