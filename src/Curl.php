<?php

namespace Firework\Http;

class Curl
{
    public array $headers = [];
    public array $curlSettings = [];

    public function __construct()
    {
        $this->curlSettings = [
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true
            ];
    }

    /**
     * @param string $method
     * @param array $query
     * @param bool $isNeedBody
     * @return bool|string
     */
    public function curlRequest(string $method, array $query, bool $isNeedBody): bool | string
    {
        $curl = curl_init();

        $this->curlSettings = $this->curlSettings + [
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => http_build_query($query),
            CURLOPT_NOBODY => $isNeedBody
        ];

        curl_setopt_array($curl, $this->curlSettings);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): Curl
    {
        $this->curlSettings = $this->curlSettings + [
            CURLOPT_URL => $url
        ];

        return $this;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders(array $headers): Curl
    {
        $this->headers = $this->headers + $headers;
        $this->curlSettings = $this->curlSettings + [
            CURLOPT_HTTPHEADER => $this->headers
            ];

        return $this;
    }

    /**
     * @param array $settings
     * @return $this
     */
    public function setCurlSettings(array $settings): Curl
    {
        $this->curlSettings = $this->curlSettings + $settings;

        return $this;
    }

    /**
     * @param array $settingsArr
     * @param bool $noBody
     * @return bool|string
     */
    public function get(array $settingsArr, bool $noBody): bool|string
    {
        return $this->curlRequest("GET", $settingsArr, $noBody);
    }

    /**
     * @param array $settingsArr
     * @param bool $noBody
     * @return bool|string
     */
    public function post(array $settingsArr, bool $noBody): bool|string
    {
        return $this->curlRequest("POST", $settingsArr, $noBody);
    }

    /**
     * @param array $settingsArr
     * @param bool $noBody
     * @return string|bool
     */
    public function put(array $settingsArr, bool $noBody): string|bool
    {
        return $this->curlRequest("PUT", $settingsArr, $noBody);
    }

    /**
     * @param array $settingsArr
     * @param bool $noBody
     * @return string|bool
     */
    public function delete(array $settingsArr, bool $noBody): string|bool
    {
        return $this->curlRequest("DELETE", $settingsArr, $noBody);
    }

    /**
     * @param array $settingsArr
     * @param bool $noBody
     * @return string|bool
     */
    public function patch(array $settingsArr, bool $noBody): string|bool
    {
        return $this->curlRequest("PATCH", $settingsArr, $noBody);
    }
}