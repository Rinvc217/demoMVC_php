<?php
namespace Repository;
use Model\Customer;

class CustomerRepositoryImpl extends QueryRepository implements CustomerRepository
{
    public function getModel()
    {
        $this->model = Customer::class;
    }
}