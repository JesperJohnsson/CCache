[![Build Status](https://travis-ci.org/JesperJohnsson/CCache.svg?branch=master)](https://travis-ci.org/JesperJohnsson/CCache.svg?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/JesperJohnsson/CLog/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/JesperJohnsson/CLog/?branch=master) [![License](https://poser.pugx.org/dlid/cdbyuml/license.svg)](https://packagist.org/packages/jejd14/ccache)

# CCache
## About
A small class for chaching information

##Tech
<pre><code>PHP >= 5.4.0
Tested on Anax MVC >= 2.0.4</code></pre>

## Introduction
__Instantiate an object of CCache:__
<pre><code>$newCCache = new \jejd14\ccache\CCache($dir);</code></pre>

__Or instantiate an object of CCache as a shared service within the [Anax](https://github.com/mosbth/Anax-MVC) framework:__
<pre><code>$di->setShared('cache', function($dir) {
    $cache = new \jejd14\ccache\CCache($dir);
    return $cache;
});</code></pre>

## Methods

1. __construct ( $dir) - *Constructor*
2. get ($key) - *Get an item from the cache if its there.*
3. put ($key, $item) - *Put an item to the cache.*
4. prune($key) - *Prune a item from cache.*
5. pruneAll() - *Prune all items from cache.*

## Calling of Methods
To properly use the methods listed above you can call it as follows
(Assuming you've set the service as a shared service in your frontcontroller)

__Inside a class that extends/implements/uses \Anax\DI\TInjectionAware:__
<pre><code>$this->di->cache->put('file','hello');</code></pre>

__In your frontcontroller:__
<pre><code>$app->cache->put('file','hello');</code></pre>

__To prune all items from cache:__
<pre><code>$app->cache->pruneAll();</code></pre>

## Composer
You can add [ccache](https://packagist.org/packages/jejd14/ccache) to your composer.json file like this.

<pre><code>"require": {
  "jejd14/ccache": "dev-master"
 }</code></pre>
 
## License
 MIT
