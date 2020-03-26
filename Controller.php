<?php
/**
 * Class Controller.
 *
 * @author: Biplob Hossain <biplob.ice@gmail.com>
 *
 * @license MIT
 */
namespace Concrete\Package\MyPackage;

use Concrete\Core\Backup\ContentImporter;
use Concrete\Core\Error\UserMessageException;
use Concrete\Core\Package\Package;
use Concrete\Core\Routing\Router;
use MyPackage\RouteList;

class Controller extends Package
{
    /**
     * @var string Package handle.
     */
    protected $pkgHandle = 'my_package';

    /**
     * @var string Required concrete5 version.
     */
    protected $appVersionRequired = '8.1.0';

    /**
     * @var string Package version.
     */
    protected $pkgVersion = '0.0.1';

    /**
     * @var array Autoload custom classes
     */
    protected $pkgAutoloaderRegistries = [
        'src/Concrete' => '\MyPackage',
    ];

    /**
     * @return string Package name
     */
    public function getPackageName()
    {
        return t('My Package Name');
    }

    /**
     * @return string Package description
     */
    public function getPackageDescription()
    {
        return t('My package description');
    }

    /**
     * Package install process.
     */
    public function install()
    {
        parent::install();
        $this->installXml();
    }

    /**
     * Package upgrade process.
     */
    public function upgrade()
    {
        parent::upgrade();
        $this->installXml();
    }

    /**
     *
     */
    private function installXml()
    {
        $ci = new ContentImporter();
        $ci->importContentFile($this->getPackagePath() . '/config/install.xml');
    }

    /**
     * @throws \Concrete\Core\Error\UserMessageException
     */
    public function on_start()
    {
        // Load 3rd party libraries
//        $this->registerAutoload();

        // Register routes
//        $this->registerRoutes();
    }

    /**
     * Register autoloader.
     * @link https://documentation.concrete5.org/developers/packages/advanced-including-third-party-libraries-in-a-package
     *
     * @throws \Concrete\Core\Error\UserMessageException
     */
    protected function registerAutoload()
    {
        $autoloader = $this->getPackagePath() . '/vendor/autoload.php';
        if (!file_exists($autoloader)) {
            throw new UserMessageException(t('Required libraries not found. Please run composer install from this package directory to install vendor files.'));
        }

        require $autoloader;
    }

    /**
     * Register routes.
     * @link https://documentation.concrete5.org/developers/framework/routing/including-routes-in-packages
     */
    protected function registerRoutes()
    {
        $router = $this->app->make(Router::class);
        $list = new RouteList();
        $list->loadRoutes($router);
    }
}
