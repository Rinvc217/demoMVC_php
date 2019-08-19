<?php
namespace Service;
use Model\DBConnection;
use Repository\CustomerRepositoryImpl;

class CustomerServiceImpl implements CustomerService
{
    public $customerRepositoryImpl;
    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=demomvc", "root", "");
        $this->customerRepositoryImpl = new CustomerRepositoryImpl($connection->connect());
    }
    public function getAll()
    {
        try {
            return $this->customerRepositoryImpl->getAll();
        } catch (Exception $e) {
            self::disconnect();
            throw $e;
        }
    }
    public function create($customer)
    {
        try {
            return $this->customerRepositoryImpl->create($customer);
        } catch (Exception $e) {
            self::disconnect();
            throw $e;
        }
    }
    public function get($id)
    {
        try {
            return $this->customerRepositoryImpl->get($id);
        } catch (Exception $e) {
            self::disconnect();
            throw $e;
        }
    }
    public function update($id, $customer)
    {
        try {
            return $this->customerRepositoryImpl->update($id, $customer);
        } catch (Exception $e) {
            self::disconnect();
            throw $e;
        }
    }
    public function delete($id)
    {
        try {
            return $this->customerRepositoryImpl->delete($id);;
        } catch (Exception $e) {
            self::disconnect();
            throw $e;
        }
    }
}
?>