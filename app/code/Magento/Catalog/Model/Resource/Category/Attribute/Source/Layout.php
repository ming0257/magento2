<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Catalog
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Catalog category landing page attribute source
 *
 * @category    Magento
 * @package     Magento_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Catalog\Model\Resource\Category\Attribute\Source;

class Layout
    extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * @var \Magento\Core\Model\Config
     */
    protected $_coreConfig;

    /**
     * Constructor
     *
     * @param \Magento\Core\Model\Config $coreConfig
     */
    public function __construct(
        \Magento\Core\Model\Config $coreConfig
    ) {
        $this->_coreConfig = $coreConfig;
    }

    /**
     * Return cms layout update options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $layouts = array();
            foreach ($this->_coreConfig->getNode('global/cms/layouts')->children() as $layoutName=>$layoutConfig) {
                $this->_options[] = array(
                   'value'=>$layoutName,
                   'label'=>(string)$layoutConfig->label
                );
            }
            array_unshift($this->_options, array('value'=>'', 'label' => __('No layout updates')));
        }
        return $this->_options;
    }
}
