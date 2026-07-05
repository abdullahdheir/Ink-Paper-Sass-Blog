<?php


namespace App\Traits;

use App\Enums\ResponseStatus;
use Illuminate\Http\JsonResponse;
use stdClass;

trait Response
{
    /**
     * This response for dashboard
     * @param ResponseStatus $status
     * @param int $code
     * @param string $title
     * @param string $message
     * @param ?mixed $data
     * @return JsonResponse
     */
    public function generalResponse(ResponseStatus $status, int $code, string $title, string $message, mixed $data = null): JsonResponse
    {
        $data = is_null($data) ? new stdClass() : $data;
        return response()->json(['status' => $status->value, 'code' => $code, 'title' => $title, 'message' => $message, 'data' => $data], $code);
    }

    /**
     * This response for api
     * @param ResponseStatus $status
     * @param int $code
     * @param string $message
     * @param ?array $errors
     * @param ?mixed $data
     * @return JsonResponse
     */
    public function respondGeneral(ResponseStatus $status, int $code, string $message, array|null $errors = null, mixed $data = null): JsonResponse
    {
        $data = is_null($data) ? new stdClass() : $data;
        return response()->json(['status' => $status->value, 'code' => $code, 'message' => $message, 'errors' => $errors, 'data' => $data], $code);
    }
}
