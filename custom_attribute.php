<?php 
use Magento\Framework\App\Bootstrap;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

require __DIR__ . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$obj = $bootstrap->getObjectManager();
$storeManager = $obj->get('\Magento\Store\Model\StoreManagerInterface');
$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        

$eavSetup = $objectManager->get('Magento\Eav\Setup\EavSetupFactory');
$setup = $objectManager->get('Magento\Framework\Setup\ModuleDataSetupInterface');

$eavSetup1 = $eavSetup->create(['setup' => $setup]);

$attribute = array('Firstattributename','Secondattributename','Thirdattributename','Fourthattributename');

$variable = array(array('Dropdown1','Dropdown12'),array('Dropdown1','Dropdown12'),array('Dropdown1','Dropdown12'),array('Dropdown1','Dropdown12'));

foreach ($variable as  $key=>$value) {
    $eavSetup1->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                $attribute[$key],
                [
                    'type' => 'int',
                    'backend' => '',
                    'frontend' => '',
                    'attribute_set' => 'Default',
                    'label' => $attribute[$key],
                    'input' => 'select',
                    'class' => '',
                    'source' => '',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => true,
                    'default' => null,
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => false,
                    'unique' => false,
                    'apply_to' => '',
                    'system' => 1,
                    'group' => 'General',
                    'option' => ['values' => $value]
                ]
            );
        //add product attribute to existing attribute_sets
        /*$entity_type_id = $eavSetup1->getEntityTypeId(\Magento\Catalog\Model\Product::ENTITY);
        $attribute_set_ids = $eavSetup1->getAllAttributeSetIds($entity_type_id);
        foreach ($attribute_set_ids as $attribute_set_id) {
            $group_id = $eavSetup1->getAttributeGroupId($entity_type_id, $attribute_set_id, "group_name");
            $eavSetup1->addAttributeToGroup(
                $entity_type_id,
                $attribute_set_id,
                $group_id,
                'attribute_name',
                20
            );*/
    }
}
?>