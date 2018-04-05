<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DownloadController
{
    private $baseDir;

    public function __construct($baseDir)
    {
        $this->baseDir = $baseDir;
    }

    public function __invoke()
    {
        $content = file_get_contents($this->baseDir.'/too-large-file.txt');
        $response = new Response($content);
        $headers = $response->headers;
        $headers->add([
            'Content-Type' => 'application/octet-stream',
            'Content-Length' => strlen($content),
            'Content-Disposition' => $headers->makeDisposition($headers::DISPOSITION_ATTACHMENT,'too-large-file.txt')
        ]);

        return $response;
    }
}
