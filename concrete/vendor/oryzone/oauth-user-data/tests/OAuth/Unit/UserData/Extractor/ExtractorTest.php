<?php

namespace OAuth\Unit\UserData\Extractor;

use OAuth\UserData\Extractor\Extractor;
use OAuth\UserData\Extractor\ExtractorInterface;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-02-08 at 10:56:38.
 */
class ExtractorTest extends \PHPUnit_Framework_TestCase
{

    protected $fields;

    protected $fieldSupportFunctions;

    protected $fieldGetFunctions;

    protected $fieldValues;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->fields = array(
            ExtractorInterface::FIELD_UNIQUE_ID,
            ExtractorInterface::FIELD_USERNAME,
            ExtractorInterface::FIELD_FIRST_NAME,
            ExtractorInterface::FIELD_LAST_NAME,
            ExtractorInterface::FIELD_FULL_NAME,
            ExtractorInterface::FIELD_EMAIL,
            ExtractorInterface::FIELD_DESCRIPTION,
            ExtractorInterface::FIELD_LOCATION,
            ExtractorInterface::FIELD_PROFILE_URL,
            ExtractorInterface::FIELD_IMAGE_URL,
            ExtractorInterface::FIELD_WEBSITES,
            ExtractorInterface::FIELD_VERIFIED_EMAIL,
            ExtractorInterface::FIELD_EXTRA
        );

        $this->fieldSupportFunctions = array(
            ExtractorInterface::FIELD_UNIQUE_ID         => 'supportsUniqueId',
            ExtractorInterface::FIELD_USERNAME          => 'supportsUsername',
            ExtractorInterface::FIELD_FIRST_NAME        => 'supportsFirstName',
            ExtractorInterface::FIELD_LAST_NAME         => 'supportsLastName',
            ExtractorInterface::FIELD_FULL_NAME         => 'supportsFullName',
            ExtractorInterface::FIELD_EMAIL             => 'supportsEmail',
            ExtractorInterface::FIELD_DESCRIPTION       => 'supportsDescription',
            ExtractorInterface::FIELD_LOCATION          => 'supportsLocation',
            ExtractorInterface::FIELD_PROFILE_URL       => 'supportsProfileUrl',
            ExtractorInterface::FIELD_IMAGE_URL         => 'supportsImageUrl',
            ExtractorInterface::FIELD_WEBSITES          => 'supportsWebsites',
            ExtractorInterface::FIELD_VERIFIED_EMAIL    => 'supportsVerifiedEmail',
            ExtractorInterface::FIELD_EXTRA             => 'supportsExtra',
        );

        $this->fieldGetFunctions = array(
            ExtractorInterface::FIELD_UNIQUE_ID         => 'getUniqueId',
            ExtractorInterface::FIELD_USERNAME          => 'getUsername',
            ExtractorInterface::FIELD_FIRST_NAME        => 'getFirstName',
            ExtractorInterface::FIELD_LAST_NAME         => 'getLastName',
            ExtractorInterface::FIELD_FULL_NAME         => 'getFullName',
            ExtractorInterface::FIELD_EMAIL             => 'getEmail',
            ExtractorInterface::FIELD_DESCRIPTION       => 'getDescription',
            ExtractorInterface::FIELD_LOCATION          => 'getLocation',
            ExtractorInterface::FIELD_PROFILE_URL       => 'getProfileUrl',
            ExtractorInterface::FIELD_IMAGE_URL         => 'getImageUrl',
            ExtractorInterface::FIELD_WEBSITES          => 'getWebsites',
            ExtractorInterface::FIELD_VERIFIED_EMAIL    => 'isEmailVerified',
            ExtractorInterface::FIELD_EXTRA             => 'getExtras',
        );

        $this->fieldValues = array(
            ExtractorInterface::FIELD_UNIQUE_ID     => '1234567',
            ExtractorInterface::FIELD_USERNAME      => 'johnnydonny',
            ExtractorInterface::FIELD_FIRST_NAME    => 'john',
            ExtractorInterface::FIELD_LAST_NAME     => 'doe',
            ExtractorInterface::FIELD_FULL_NAME     => 'john doe',
            ExtractorInterface::FIELD_EMAIL         => 'johndoe@gmail.com',
            ExtractorInterface::FIELD_DESCRIPTION   => 'A life on the edge',
            ExtractorInterface::FIELD_LOCATION      => 'Rome, Italy',
            ExtractorInterface::FIELD_PROFILE_URL   => 'http://social.co/johnnydonny',
            ExtractorInterface::FIELD_IMAGE_URL     => 'http://social.co/avatar/johnnydonny.jpg',
            ExtractorInterface::FIELD_WEBSITES      => array(
                'http://johnnydonny.com',
                'http://blog.johnnydonny.com',
            ),
            ExtractorInterface::FIELD_VERIFIED_EMAIL => true,
            ExtractorInterface::FIELD_EXTRA         => array(
                'foo' => 'bar',
                'skills' => array('php', 'symfony', 'butterflies')
            ),
        );
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testSupportsFields()
    {
        foreach ($this->fields as $field) {
            $supports = array($field);
            $value = $this->fieldValues[$field];
            $fields = array($field => $value);
            $extractor = new Extractor($supports, $fields);
            $supportFunction = $this->fieldSupportFunctions[$field];
            $getFunction = $this->fieldGetFunctions[$field];
            $message = sprintf('Failed asserting that "%s" must return true', $supportFunction);
            $this->assertTrue($extractor->$supportFunction(), $message);
            $message = sprintf('Failed asserting that "%s" must return %s', $getFunction, json_encode($value));
            $this->assertEquals($value, $extractor->$getFunction(), $message);
        }
    }

    public function testDoesNotSupportFields()
    {
        $supports = array();
        $fields = array();
        foreach ($this->fields as $field) {
            $extractor = new Extractor($supports, $fields);
            $supportFunction = $this->fieldSupportFunctions[$field];
            $getFunction = $this->fieldGetFunctions[$field];
            $message = sprintf('Failed asserting that "%s" must return false', $supportFunction);
            $this->assertFalse($extractor->$supportFunction(), $message);
            $message = sprintf('Failed asserting that "%s" must return null', $getFunction);
            $this->assertNull($extractor->$getFunction(), $message);
        }
    }

    public function testGetExtra()
    {
        $supports = array(ExtractorInterface::FIELD_EXTRA);
        $fields = array(ExtractorInterface::FIELD_EXTRA => array(
            'foo' => 'bar',
            'bar' => 'baz'
        ));
        $extractor = new Extractor($supports, $fields);
        $this->assertEquals('bar', $extractor->getExtra('foo'));
        $this->assertEquals('baz', $extractor->getExtra('bar'));
        $this->assertNull($extractor->getExtra('baz'));
    }

    public function testSetService()
    {
        /**
         * @var \OAuth\Common\Service\ServiceInterface $service
         */
        $service = $this->getMock('\\OAuth\\Common\\Service\\ServiceInterface');
        $extractor = new Extractor();
        $extractor->setService($service);
    }
}
