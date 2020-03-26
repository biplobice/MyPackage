<?php
/**
 * Class Controller.
 *
 * @author: Biplob Hossain <biplob.ice@gmail.com>
 *
 * @license MIT
 */
namespace Concrete\Package\MyPackage\Block\MyBlock;

use Concrete\Core\Block\BlockController;

class Controller extends BlockController
{
    protected $btTable = 'btMyBlock';

    public function getBlockTypeName()
    {
        return t('My Block Name');
    }

    public function getBlockTypeDescription()
    {
        return t('My Block Description');
    }

    public function add()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function view()
    {
        //
    }
}
