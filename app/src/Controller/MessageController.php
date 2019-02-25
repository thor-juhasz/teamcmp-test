<?php

namespace App\Controller;

use App\Service\MessageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class MessageController extends AbstractController
{
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Get all messages
     * @Route("/api/messages", name="getMessages")
     * @return JsonResponse
     * @throws \Exception
     */
    public function getMessages(): JsonResponse
    {
        $messages = $this->messageService->getMessages();

        return new JsonResponse(json_encode($messages), 200, [], true);
    }

    /**
     * Send a message
     * @Route("/api/message", name="sendMessage")
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function sendMessage(Request $request): JsonResponse
    {
        $data = $request->getContent();
        $data = json_decode($data, true);

        $this->messageService->addMessage($data['message']);

        return new JsonResponse(json_encode([]), 200, [], true);
    }
}
