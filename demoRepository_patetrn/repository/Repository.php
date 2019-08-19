<?php
namespace Repository;
interface Repository
{
    public function getAll();
    public function create($customer);
    public function get($id);
    public function update($id, $customer);
    public function delete($id);
}