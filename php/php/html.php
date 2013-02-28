<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="en-us">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="all">

    <title>Template</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="/css/font-awesome.css" rel="stylesheet">
<?php
    if (file_exists("css/pages/{$current_page_name}.css"))
      print "   <link href=\"/css/pages/{$current_page_name}.css\" rel=\"stylesheet\">";
?>

    <script src="/js/jquery-1.9.1.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/sorttable.js"></script>

<?php
    if (file_exists("js/pages/{$current_page_name}.js"))
      print "   <script src=\"/js/pages/{$current_page_name}.js\"></script>";
?>
  </head>
  <body>