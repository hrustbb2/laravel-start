<?php

use Illuminate\Database\Migrations\Migration;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use App\Providers\AppServiceProvider;
use App\Models\JsonObjects\TopMenu\TopMenu;
use App\Models\JsonObjects\Header;
use App\Models\JsonObjects\Info;
use App\Models\JsonObjects\Topic;
use App\Models\JsonObjects\SeoOptions;

class FillObj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var IModuleFactory $factory */
        $factory = app()->get(AppServiceProvider::ADMIN_MODULES)->getJsonObjectsFactory();
        $persist = $factory->getDtoFactory()->getItemFactory()->createPersist(TopMenu::TYPE);
        $persist->load(['key' => 'top_menu', 'name' => 'Top menu', 'disabled' => 1]);
        $persistLayer = $factory->getInfrastructureFactory()->getPersistLayer();
        $persistLayer->create($persist);

        $persist = $factory->getDtoFactory()->getItemFactory()->createPersist(Header::TYPE);
        $persist->load(['key' => 'header', 'name' => 'Header', 'disabled' => 1]);
        $persistLayer = $factory->getInfrastructureFactory()->getPersistLayer();
        $persistLayer->create($persist);

        $persist = $factory->getDtoFactory()->getItemFactory()->createPersist(Info::TYPE);
        $persist->load(['key' => 'info', 'name' => 'Info', 'disabled' => 1]);
        $persistLayer = $factory->getInfrastructureFactory()->getPersistLayer();
        $persistLayer->create($persist);

        $persist = $factory->getDtoFactory()->getItemFactory()->createPersist(Topic::TYPE);
        $persist->load(['key' => 'topic', 'name' => 'Topic', 'disabled' => 1]);
        $persistLayer = $factory->getInfrastructureFactory()->getPersistLayer();
        $persistLayer->create($persist);

        $persist = $factory->getDtoFactory()->getItemFactory()->createPersist(SeoOptions::TYPE);
        $persist->load(['key' => 'seo_options', 'name' => 'Seo options', 'disabled' => 1]);
        $persistLayer = $factory->getInfrastructureFactory()->getPersistLayer();
        $persistLayer->create($persist);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
