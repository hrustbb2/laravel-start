<?php

namespace Src\Lib\CategoriesTree\Interfaces\Application;

use Src\Common\Interfaces\Adapters\ILog;

interface IDomain {
    public function setLogAdapter(ILog $adapter):void;
    public function setValidator(IValidator $validator):void;
    public function setDataBuilder(IDataBuilder $builder):void;
}