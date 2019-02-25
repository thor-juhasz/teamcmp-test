<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MessageControllerTest extends WebTestCase
{
    public function testGetMessages()
    {
        $client = static::createClient();

        $client->request('GET', '/api/messages');
        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());

        $responseData = json_decode($response->getContent(), true);

        $this->assertCount(1, $responseData);
        $this->assertArrayHasKey('id', $responseData[0]);
        $this->assertArrayHasKey('message', $responseData[0]);
        $this->assertArrayHasKey('type', $responseData[0]);
        $this->assertEquals('0', $responseData[0]['id']);
        $this->assertEquals('received', $responseData[0]['type']);
    }

    public function testAddMessage()
    {
        $client = static::createClient();

        $client->request('POST', '/api/message', [], [], [], json_encode(['message' => 'Test message']));
        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());

        $client->request('GET', '/api/messages');
        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());

        $responseData = json_decode($response->getContent(), true);

        $this->assertCount(2, $responseData);
        $this->assertArrayHasKey('id', $responseData[1]);
        $this->assertArrayHasKey('message', $responseData[1]);
        $this->assertArrayHasKey('type', $responseData[1]);
        $this->assertEquals('1', $responseData[1]['id']);
        $this->assertEquals('Test message', $responseData[1]['message']);
        $this->assertEquals('sent', $responseData[1]['type']);
    }
}