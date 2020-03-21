<?php

namespace Prgayman\QRCodeMonkey\Traits;

trait Api
{

  /**
   * Send request post 
   * @param array $params
   * @param string $url
   * @param array $headers
   * 
   * @return \GuzzleHttp\Client $body
   */
  protected function post($params, $url, $headers = [])
  {
    $client = new \GuzzleHttp\Client();
    $res = $client->request('POST', $url, [
      "json" => $params,
      "headers" => array_merge([], $headers)
    ]);
    return $res->getBody();
  }

  /**
   * Send request post 
   * @param mixed $image
   * @param string $url
   * 
   * @return string $imageName
   */
  protected function uploadImage($image, $url)
  {

    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', $url, [
      "multipart" => [
        [
          'name'     => 'file',
          'contents' => fopen($image->getPathname(), 'r'),
          'filename' => $image->getClientOriginalName()
        ]
      ]
    ]);
    return json_decode($response->getBody(), true)["file"];
  }
}
