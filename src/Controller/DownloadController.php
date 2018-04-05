<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DownloadController
{
    private $baseDir;

    public function __construct($baseDir)
    {
        $this->baseDir = $baseDir;
    }

    public function __invoke()
    {
        return new BinaryFileResponse(
            $this->baseDir . '/too-large-file.txt',
            200,
            [],
            true,
            ResponseHeaderBag::DISPOSITION_ATTACHMENT
        );
    }
}
