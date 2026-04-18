<?php

namespace TrimMiddleware;

if (!function_exists('trim_array')) {
    /**
     * Обрезает пробелы во всех строковых значениях массива
     *
     * @param array $data
     * @return array
     */
    function trim_array(array $data): array
    {
        return TrimMiddleware::trimArray($data);
    }
}

if (!function_exists('trim_request')) {
    /**
     * Обрезает пробелы в данных запроса
     *
     * @param object $request
     * @return object
     */
    function trim_request($request)
    {
        return (new TrimMiddleware())->handle($request);
    }
}