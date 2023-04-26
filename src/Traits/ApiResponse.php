<?php

namespace Setebit\Package\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    protected function success(string $message, mixed $data, int $code = Response::HTTP_OK): JsonResponse
    {
        if (
            $data instanceof \stdClass &&
            property_exists($data, 'data') &&
            property_exists($data, 'links') &&
            property_exists($data, 'meta')
        ) {
            return response()->json([
                ...(array)$data,
                'message' => $message,
            ], $code);
        }

        if ($data instanceof LengthAwarePaginator) {
            return response()->json([
                ...$this->normalizePagination($data),
                'message' => $message,
            ], $code);
        }

        return response()->json([
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    protected function error(string $message, int $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $code);
    }

    private function normalizePagination(LengthAwarePaginator $paginator): array
    {
        return [
            'data' => $paginator->items(),
            'links' => [
                'first' => $paginator->url(1),
                'last' => $paginator->url($paginator->lastPage()),
                'prev' => $paginator->previousPageUrl(),
                'next' => $paginator->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'from' => $paginator->firstItem(),
                'last_page' => $paginator->lastPage(),
                'links' => $paginator->linkCollection(),
                'path' => $paginator->path(),
                'per_page' => $paginator->perPage(),
                'to' => $paginator->lastItem(),
                'total' => $paginator->total(),
            ],
        ];
    }
}
