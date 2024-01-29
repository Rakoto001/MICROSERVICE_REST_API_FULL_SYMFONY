<?php


namespace App\Services\Http;


use Symfony\Component\HttpFoundation\JsonResponse;

class ApiJsonResponse extends JsonResponse
{
    /**
     * ApiResponse constructor.
     *
     * @param string $message
     * @param mixed  $data
     * @param array  $errors
     * @param int    $status
     * @param array  $headers
     * @param bool   $json
     */
    public function __construct(string $message, $data = null, array $errors = [], int $status = 200, array $headers = [], bool $json = false)
    {
        parent::__construct($this->format($message, $data, $errors, $status), $status, $headers, $json);
    }

    /**
     * Format the API response.
     *
     * @param string $message
     * @param mixed  $data
     * @param array  $errors
     *
     * @return array
     */
    private function format(string $message, $data = null, array $errors = [], $status)
    {
        if ($data === null) {
            $data = new \ArrayObject();
        }

        $response = [
            'message' => $message,
            'data'    => $data,
            'status' => $status,
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        return $response;
    }


    public function updateSuccessJsonResponse()
    {

        return new JsonResponse('sdfsd', 200);
    }
}