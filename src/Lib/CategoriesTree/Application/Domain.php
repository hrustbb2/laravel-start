<?php

namespace Src\Lib\CategoriesTree\Application;

use Src\Common\Application\BaseDomain;
use Src\Lib\CategoriesTree\Interfaces\Application\IDomain;
use Src\Common\Interfaces\Adapters\ILog;
use Src\Lib\CategoriesTree\Interfaces\Application\IValidator;
use Src\Lib\CategoriesTree\Interfaces\Application\IDataBuilder;
use \Throwable;

class Domain extends BaseDomain implements IDomain {

    protected ILog $logAdapter;

    protected IValidator $validator;

    protected IDataBuilder $dataBuilder;

    public function setLogAdapter(ILog $adapter):void
    {
        $this->logAdapter = $adapter;
    }

    public function setValidator(IValidator $validator):void
    {
        $this->validator = $validator;
    }

    public function setDataBuilder(IDataBuilder $builder):void
    {
        $this->dataBuilder = $builder;
    }

    public function createDir(array $data):bool
    {
        if($this->validator->createDir($data)){
            try{
                $cleanData = $this->validator->getCleanData();
                $dirData = $this->dataBuilder->buildData($cleanData);
                
                return true;
            }catch(Throwable $e){
                $this->logAdapter->error($e);
                return false;
            }
        }else{
            $this->errors = $this->validator->getErrors();
            $this->responseCode = self::VALIDATION_FAILED_CODE;
            return false;
        }
    }

}