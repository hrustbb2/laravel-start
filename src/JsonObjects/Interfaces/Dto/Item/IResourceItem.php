<?php

namespace Src\JsonObjects\Interfaces\Dto\Item;

use Src\Lib\CategoriesTree\Interfaces\Dto\IResource as IDirResource;
use Src\JsonObjects\Dto\Object\ExampleComposit;

interface IResourceItem extends IAbstractItem {
    public function setDir(IDirResource $dir):void;
    public function toArray(array $fields = []):array;
    public function getDir():IDirResource;
    public function getObject():ExampleComposit;
}