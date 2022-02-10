<?php

namespace Src\Common\Interfaces;

use Src\Common\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Common\Interfaces\Adapters\IAdaptersFactory;
use Src\Common\Interfaces\Dto\IFactory as IDtoFactory;
use Src\Common\Interfaces\Application\IFilesBrowser;

interface IFactory {
    const LARAVEL = 'laravel';
    public function getPagesFactory():IPagesFactory;
    public function getAdaptersFactory(string $name):IAdaptersFactory;
    public function getDtoFactory():IDtoFactory;
    public function getFilesBrowser():IFilesBrowser;
}