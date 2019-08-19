<?php 
namespace service;

interface CustomerService {
    public function getall();
    public function create($customer);
    public function get($id);
    public function delete($id);
    public function update($id, $customer);
}
?>