<?php

namespace jejd14\ccache;



/**
* A class for caching objects.
*
*/
class CCache
{



    /**
    * Properties
    */
    public $options;



    /**
    * Constructor.
    *
    * @param $dir, the directory of the cachefiles.
    */
    public function __construct($dir)
    {
        $this->options = [
            'age' => 7 * 24 * 60 * 60,
            'dir' => $dir,
        ];
        if (!is_dir($dir)) {
            $res = mkdir($dir, 0777, true);
            if (!$res) {
                throw new Exception("Failed to create {$dir}");
            }
        }
    }



    /**
    * Get an item from the cache it its there.
    *
    * @param string $key to the cached object.
    *
    * @return mixed the cached object or false if it has aged or null if it does not exists.
    */
    public function get($key)
    {
        $file = $this->options['dir'] . '/' . strtolower($key);
        if (is_file($file)) {
            if (filemtime($file) + $this->options['age'] > time()) {
                return unserialize(file_get_contents($file));
            }
            return false;
        }
        return null;
    }



    /**
    * Put an item to the cache.
    *
    * @param string $key to the cached object.
    *
    * @throws Exception if failing to write to cache.
    */
    public function put($key, $item)
    {
        $file = $this->options['dir'] . '/' . strtolower($key);
        if (!file_put_contents($file, serialize($item))) {
            throw new Exception("Failed writing cache object '{$key}'.");
        }
    }



    /**
    * Prune a item from cache.
    *
    * @param string $key to the cached object.
    */
    public function prune($key = "default")
    {
        unlink($this->options['dir'] . '/' . strtolower($key));
    }



    /**
    * Prune all items from cache.
    *
    * @return int number of items removed.
    */
    public function pruneAll()
    {
        $files = glob($this->options['dir'].'/*');
        $items = count($files);
        array_map('unlink', $files);
        return $items;
    }
}
