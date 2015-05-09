<?php
namespace jejd14\ccache;
/**
* A class for caching objects.
*
* @package LydiaCore
*/
class CCacheTest extends \PHPUnit_Framework_TestCase {
    /*
    public function testExceptionHasRightMessage()
    {
        $el = new \phpe\cache\CCache('hejsan');
        throw new InvalidArgumentException('Failed to create hejsan', 'hejsan');
    }
    */
    public function testCCache()
    {
        $el = new \jejd14\ccache\CCache('hejsan');
        $fil = $el->get('fil');
        $this->assertNull($fil);
    }
    public function testPruneCCache()
    {
        $el = new \phpe\cache\CCache('hejsan');
        $fil = $el->pruneAll();
        $this->assertEquals($fil, 0);
    }
}
