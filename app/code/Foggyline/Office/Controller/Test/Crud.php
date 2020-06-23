<?php
namespace Foggyline\Office\Controller\Test;

use Magento\Framework\App\Action\Context;

class Crud extends \Foggyline\Office\Controller\Test
{
    protected $employeeFactory;
    protected $departmentFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Foggyline\Office\Model\EmployeeFactory $employeeFactory,
        \Foggyline\Office\Model\DepartmentFactory $departmentFactory
    )
    {
        $this->employeeFactory = $employeeFactory;
        $this->departmentFactory = $departmentFactory;
        return parent::__construct($context);
    }
    public function execute()
    {
        $department1 = $this->departmentFactory->create();
        $department1->setName('Finance');
        $department1->save();
        $department2 = $this->departmentFactory->create();
        $department2->setData('name', 'Research');
        $department2->save();
        $department3 = $this->departmentFactory->create();
        $department3->setData(['name' => 'Support']);
        $department3->save();
        //EAV model, creating new entities, flavour #1
        $employee1 = $this->employeeFactory->create();
        $employee1->setDepartment_id($department1->getId());
        $employee1->setEmail('goran@mail.loc');
        $employee1->setFirstName('Goran');
        $employee1->setLastName('Gorvat');
        $employee1->setServiceYears(3);
        $employee1->setDob('1984-04-18');
        $employee1->setSalary(3800.00);
        $employee1->setVatNumber('GB123451234');
        $employee1->setNote('Note #1');
        $employee1->save();
        //EAV model, creating new entities, flavour #2
        $employee2 = $this->employeeFactory->create();
        $employee2->setData('department_id', $department2->getId());
        $employee2->setData('email', 'marko@mail.loc');
        $employee2->setData('first_name', 'Marko');
        $employee2->setData('last_name', 'Tunukovic');
        $employee2->setData('service_years', 3);
        $employee2->setData('dob', '1984-04-18');
        $employee2->setData('salary', 3800.00);
        $employee2->setData('vat_number', 'GB123451234');
        $employee2->setData('note', 'Note #2');
        $employee2->save();
        //EAV model, creating new entities, flavour #3
        $employee3 = $this->employeeFactory->create();
        $employee3->setData([
            'department_id' => $department3->getId(),
            'email' => 'ivan@mail.loc',
            'first_name' => 'Ivan',
            'last_name' => 'Telebar',
            'service_years' => 2,
            'dob' => '1986-08-22',
            'salary' => 2400.00,
            'vat_number' => 'GB123454321',
            'note' => 'Note #3'
        ]);
        $employee3->save();
        $department = $this->departmentFactory->create();
        $department->load(28);
        $department->setName('Finance #2');
        $department->save();
        $employee = $this->employeeFactory->create();
        $employee->load(25);
        $employee->delete();
        /*
         * get collection normal
         */
        // Collection
        //$collection = $this->employeeFactory->create()->getCollection();
        /*
         * get collection via _objectManager
         */
//        $collection = $this->_objectManager->create(
//            'Foggyline\Office\Model\ResourceModel\Employee\Collection'
//        );
//        foreach ($collection as $employee) {
//            \Zend_Debug::dump($employee->toArray(), '$employee');
//        }
        /*
         * get collection as specify via individual attribute
         */
//        $collection->addAttributeToSelect('salary')
//            ->addAttributeToSelect('vat_number');
        /*
         * collection for all attribute
         */
//          $collection->addAttributeToSelect('*');
        /*
         * SetPageSize and setCurPage
         * $collection->addAttributeToSelect('*')
            ->setPageSize(25)
            ->setCurPage(5);
         *
         */
        /* ///////////////////////////////////////////
         * Filter with collections
         * $collection = $this->_objectManager->create(
             'Foggyline\Office\Model\ResourceModel\Employee\Collection'
            );
            $collection->addAttributeToSelect('*')
             ->setPageSize(25)
             ->setCurPage(1);
            $collection->addAttributeToFilter('email',
             array('like'=>'%mail.loc%'))
             ->addAttributeToFilter('vat_number',
             array('like'=>'GB%'))
             ->addAttributeToFilter('salary', array('gt'=>2400))
             ->addAttributeToFilter('service_years',
             array('lt'=>10));
         */
        /*
         * Query background
         */
        /*
         * SELECT COUNT(*) FROM 'foggyline_office_employee_entity' AS 'e'
            SELECT 'e'.* FROM 'foggyline_office_employee_entity' AS 'e'
            SELECT
             'foggyline_office_employee_entity_datetime'.'entity_id',
             'foggyline_office_employee_entity_datetime'.'attribute_id',
             'foggyline_office_employee_entity_datetime'.'value'
            FROM 'foggyline_office_employee_entity_datetime'
            WHERE (entity_id IN (24, 25, 26)) AND (attribute_id IN ('349'))
            UNION ALL SELECT
             'foggyline_office_employee_entity_text'.'entity_id',
             'foggyline_office_employee_entity_text'.'
             attribute_id',
             'foggyline_office_employee_entity_text'.'value'
             FROM 'foggyline_office_employee_entity_text'
             WHERE (entity_id IN (24, 25, 26)) AND (attribute_id IN
             ('352'))
            UNION ALL SELECT
             'foggyline_office_employee_entity_decimal'.'
             entity_id',
             'foggyline_office_employee_entity_decimal'.'
             attribute_id',
             'foggyline_office_employee_entity_decimal'.'value'
             FROM 'foggyline_office_employee_entity_decimal'
           WHERE (entity_id IN (24, 25, 26)) AND (attribute_id IN
             ('350'))
            UNION ALL SELECT
             'foggyline_office_employee_entity_int'.'entity_id',
             'foggyline_office_employee_entity_int'.'attribute_id',
             'foggyline_office_employee_entity_int'.'value'
             FROM 'foggyline_office_employee_entity_int'
             WHERE (entity_id IN (24, 25, 26)) AND (attribute_id IN
             ('348'))
            UNION ALL SELECT
             'foggyline_office_employee_entity_varchar'.'
             entity_id',
             'foggyline_office_employee_entity_varchar'.'
             attribute_id',
             'foggyline_office_employee_entity_varchar'.'value'
             FROM 'foggyline_office_employee_entity_varchar'
             WHERE (entity_id IN (24, 25, 26)) AND (attribute_id IN
             ('351'))
         */
    }
}
