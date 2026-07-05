<?php

namespace App\Services;

use App\Ai\Agents\General;
use Laravel\Ai\Ai;
use Laravel\Ai\Enums\Lab;

class AiService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function generate(string $prompt, string|null $model = null, Lab $provider = Lab::Groq)
    {
        return (new General)->prompt($prompt, provider: $provider, model: $model);
    }
}
