<?php

namespace TrimMiddleware;

class TrimMiddleware
{
    /**
     * Обрезает пробелы во всех строковых значениях массива
     *
     * @param array 
     * @return array 
     */
    public static function trimArray(array $data): array
    {
        $result = [];
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $result[$key] = trim($value);
            } elseif (is_array($value)) {
                $result[$key] = self::trimArray($value);
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    /**
     * Обработчик запроса для совместимости с вашим фреймворком
     *
     * @param object $request Объект запроса (должен иметь методы all() и set())
     * @return object 
     */
    public function handle($request)
    {
        $data = $request->all();
        $trimmedData = self::trimArray($data);
        
        foreach ($trimmedData as $key => $value) {
            $request->set($key, $value);
        }
        
        return $request;
    }
}