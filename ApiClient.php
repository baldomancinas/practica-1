<?php
class ApiClient
{
    private $url = "https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items";

    public function getItems()
    {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}
