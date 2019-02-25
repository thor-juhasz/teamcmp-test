<?php

namespace App\Tests\Service;

use App\Service\MessageService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MessageServiceTest extends KernelTestCase
{
    /** @var MessageService */
    private $messageService;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->messageService = $kernel->getContainer()->get(MessageService::class);
    }

    /**
     * Test that the message service by default has one message.
     * Also test the contents of the message.
     */
    public function testGetMessages(): void
    {
        $messages = $this->messageService->getMessages();
        $this->assertCount(1, $messages);

        $this->assertCount(1, $messages);
        $this->assertArrayHasKey('id', $messages[0]);
        $this->assertArrayHasKey('message', $messages[0]);
        $this->assertArrayHasKey('type', $messages[0]);
        $this->assertEquals('0', $messages[0]['id']);
        $this->assertEquals('received', $messages[0]['type']);
    }

    public function testAddMessage()
    {
        $this->messageService->addMessage('Test message');

        $messages = $this->messageService->getMessages();
        $this->assertCount(2, $messages);

        $this->assertCount(2, $messages);
        $this->assertArrayHasKey('id', $messages[1]);
        $this->assertArrayHasKey('message', $messages[1]);
        $this->assertArrayHasKey('type', $messages[1]);
        $this->assertEquals('1', $messages[1]['id']);
        $this->assertEquals('Test message', $messages[1]['message']);
        $this->assertEquals('sent', $messages[1]['type']);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->messageService = null; // avoid memory leaks
    }
}