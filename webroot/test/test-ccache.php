<?php
// Include CForm
include('../../autoloader.php');
//parameter = path to folder.
$cache = new \phpe\cache\CCache('../../folder');
//parameter = name of file and content.
$cache->put('file', 'hello');
/**
* Prune a item from cache.
*
* @param string $key to the cached object.
*/
$cache->prune($key);
/**
* Prune all items from cache.
*
* @return int number of items removed.
*/
$cache->pruneAll();
?>


<!doctype html>
<meta charset=utf8>
<title>CCache</title>
<h1>Get file cached content</h1>
<?=$cache->get('file')?>
