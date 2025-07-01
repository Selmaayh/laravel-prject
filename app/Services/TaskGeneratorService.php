<?php

namespace App\Services;

use OpenAI;

class TaskGeneratorService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client(config('services.openai.key'));
    }

    public function generateTasksFromProjectDescription(string $projectDescription)
    {
        $response = $this->client->chat()->create([
            'model' => 'gpt-4-turbo',
            'response_format' => ['type' => 'json_object'],
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Tu génères des tâches projet au format JSON. Structure: {"tasks": [{"title": "", "duration": "", "category": "", "description": ""}]}'
                ],
                [
                    'role' => 'user',
                    'content' => "Projet: $projectDescription"
                ]
            ],
            'temperature' => 0.7
        ]);

        return json_decode($response->choices[0]->message->content, true);
    }
}