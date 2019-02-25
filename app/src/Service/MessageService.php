<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class MessageService
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * Get all messages from the session storage
     * @return array
     */
    public function getMessages(): array
    {
        // Get messages from the session.
        // If key is not found in the session (or is NULL), then populate with default message.
        return $this->session->get('messages', $this->defaultMessage());
    }

    /**
     * Add message to the session storage
     * @param string $message
     */
    public function addMessage(string $message): void
    {
        $messages = $this->session->get('messages', $this->defaultMessage());

        $messages[] = [
            'id' => count($messages),
            'message' => $message,
            'type' => 'sent'
        ];

        $this->session->set('messages', $messages);
    }

    /**
     * Give a default first message
     * @return array
     */
    private function defaultMessage(): array
    {
        return [
            [
                'id' => 0,
                'message' => "Hi there!\nHow are you?",
                'type' => 'received'
            ]
        ];
    }
}