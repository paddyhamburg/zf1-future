<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Cache
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * Zend_Cache
 */
require_once 'Zend/Cache.php';
require_once 'Zend/Cache/Backend/ZendServer/ShMem.php';

/**
 * Common tests for backends
 */
require_once 'CommonBackendTest.php';

/**
 * @category   Zend
 * @package    Zend_Cache
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @group      Zend_Cache
 */
class Zend_Cache_ZendServerShMemTest extends Zend_Cache_CommonBackendTest
{
    protected $_instance;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct('Zend_Cache_Backend_ZendServer_Disk', $data, $dataName);
    }

    public function set_up($notag = true)
    {
        $this->_instance = new Zend_Cache_Backend_ZendServer_ShMem();
        parent::set_up(true);
    }

    protected function tear_down()
    {
        parent::tear_down();
        unset($this->_instance);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testConstructorCorrectCall()
    {
        $test = new Zend_Cache_Backend_ZendServer_ShMem();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testCleanModeOld()
    {
        $this->_instance->setDirectives(['logging' => false]);
        $this->_instance->clean('old');
        // do nothing, just to see if an error occured
        $this->_instance->setDirectives(['logging' => true]);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testCleanModeMatchingTags()
    {
        $this->_instance->setDirectives(['logging' => false]);
        $this->_instance->clean('matchingTag', ['tag1']);
        // do nothing, just to see if an error occured
        $this->_instance->setDirectives(['logging' => true]);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testCleanModeNotMatchingTags()
    {
        $this->_instance->setDirectives(['logging' => false]);
        $this->_instance->clean('notMatchingTag', ['tag1']);
        // do nothing, just to see if an error occured
        $this->_instance->setDirectives(['logging' => true]);
    }

    // Because of limitations of this backend...
    /**
     * @doesNotPerformAssertions
     */
    public function testGetWithAnExpiredCacheId()
    {
    }
    /**
     * @doesNotPerformAssertions
     */
    public function testCleanModeMatchingTags2()
    {
    }
    /**
     * @doesNotPerformAssertions
     */
    public function testCleanModeNotMatchingTags2()
    {
    }
    /**
     * @doesNotPerformAssertions
     */
    public function testCleanModeNotMatchingTags3()
    {
    }
    /**
     * @doesNotPerformAssertions
     */
    public function testSaveCorrectCall()
    {
        $this->_instance->setDirectives(['logging' => false]);
        parent::testSaveCorrectCall();
        $this->_instance->setDirectives(['logging' => true]);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSaveWithNullLifeTime()
    {
        $this->_instance->setDirectives(['logging' => false]);
        parent::testSaveWithNullLifeTime();
        $this->_instance->setDirectives(['logging' => true]);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSaveWithSpecificLifeTime()
    {
        $this->_instance->setDirectives(['logging' => false]);
        parent::testSaveWithSpecificLifeTime();
        $this->_instance->setDirectives(['logging' => true]);
    }
}
