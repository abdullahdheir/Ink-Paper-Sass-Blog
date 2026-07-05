<?php

namespace App\Http\Controllers;

use App\Enums\ResponseStatus;
use App\Http\Requests\AIGenerateRequest;
use App\Services\ArticleAiService;
use Illuminate\Http\Request;
use Throwable;

class AiController extends Controller
{
    public function __construct(
        private readonly ArticleAiService $articleAiService,
    ) {}
    public function generateArticle(AIGenerateRequest $request)
    {
        try {
            if ($request->type === 'summary') {
                $summary = $this->articleAiService->generateSummary(
                    title: $request->title,
                    contentPreview: strip_tags(substr($request->content ?? '', 0, 500)),
                );

                return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully generate ai.', [], ['result'=>$summary]);
            }

            // Full article generation
            $result = $this->articleAiService->generateContent($request->title);

            return $this->respondGeneral(ResponseStatus::SUCCESS, 200, 'Successfully generate ai.', [], $result->toArray());
        } catch (Throwable $err) {
            return $this->respondGeneral(ResponseStatus::ERROR, $err->getCode() ?: 400, $err->getMessage());
        }
    }
}
