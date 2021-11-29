<?php

namespace Src\Lib\CategoriesTree\Application;

use Src\Lib\CategoriesTree\Interfaces\Application\IFactory;
use Src\Lib\CategoriesTree\Interfaces\IFactory as ILibFactory;
use Src\Lib\CategoriesTree\Interfaces\Application\IDomain;

class Factory implements IFactory {

    protected ILibFactory $libFactory;

    protected ?IDomain $domain = null;

    public function setLibFactory(ILibFactory $factory):void
    {
        $this->libFactory = $factory;
    }

    public function getDomain()
    {
        if($this->domain === null){
            $this->domain = new Domain();
            $framework = $this->libFactory->getSetting(ILibFactory::FRAMEWORK_NAME);
            $logAdapter = $this->libFactory->getCommonFactory()->getAdaptersFactory($framework)->getLog();
            $this->domain->setLogAdapter($logAdapter);
            $validator = $this->createValidator();
            $this->domain->setValidator($validator);
            $dataBuilder = $this->createDataBuilder();
            $this->domain->setDataBuilder($dataBuilder);
        }
        return $this->domain;
    }

    protected function createValidator()
    {
        return new Validator();
    }

    public function createDataBuilder()
    {
        $dataBuilder = new DataBuilder();
        $storage = $this->libFactory->getInfrastructureFactory()->getStorage();
        $dataBuilder->setStorage($storage);
        return $dataBuilder;
    }

}