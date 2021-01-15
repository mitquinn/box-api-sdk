<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Psr\Http\Message\RequestInterface;

/**
 * Class UploadFileRequest
 * @package Mitquinn\BoxApiSdk\Requests\Files
 */
class UploadFileRequest extends BaseRequest
{

    /** @var string $method */
    protected string $method = 'POST';

    /**
     * @return RequestInterface
     */
    public function generateRequestInterface(): RequestInterface
    {
        $body = $this->getBody();
        $formattedBody = [];
        //We need to loop through the array body and organize into a [name, content] pairs.
        foreach ($body as $key => $value) {
            //Todo: Is there a better way to do this? It seems hella sloppy.
            if ($key === 'file') {
                $formattedBody[] = [
                    'name' => 'file',
                    'contents' => $value['contents'],
                    'filename' => $value['filename']
                ];
                continue;
            }

            $formattedBody[] = [
                'name' => $key,
                'contents' => json_encode($value)
            ];
        }

        $stream = new MultipartStream($formattedBody);

        return new Request(
            'POST',
            $this->getUri(),
            [],
            $stream
        );
    }


    /**
     * @return string
     */
    public function getUri(): string
    {
        $query = '';
        if (!empty($this->getQuery())) {
            $query = '?'.http_build_query($this->getQuery());
        }

        return 'https://upload.box.com/api/'.$this->getVersion().'files/content'.$query;
    }
}


