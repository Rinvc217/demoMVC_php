<?php
namespace Controller;
use Model\customer;
use Service\CustomersService;
use Service\CustomerServiceImpl;

class CustomerController
{
  public $customerServiceImpl;
  public function __construct()
  {
    $this->customerServiceImpl = new CustomerServiceImpl();
  }
  public function add()
  {
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          include 'view/add.php';
      } else {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $address = $_POST['address'];
          $customers = new Customer($name, $email, $address);
          $this->customerServiceImpl->create($customers);
          $message = 'Customer created';
          include 'view/add.php';
          var_dump($customers);
      }
  }
  public function index(){
    $customers = $this->customerServiceImpl->getAll();
    include 'view/list.php';
  }
  public function delete(){
    if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
      $id = $_GET['id'];
      $customer = $this->customerServiceImpl->get($id);
      include 'view/delete.php';
    }else {
    $id = $_POST['id'];
    $this->customerServiceImpl->delete($id);
    header('Location: index.php');
    // hàm header dùng để chuyển hướng trang hoặc thay đổi kiểu dl trả về.
  }
}
public function edit()
{
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $id = $_GET['id'];
      $customer = $this->customerServiceImpl->get($id);
      include 'view/edit.php';
  } else {
      $id = $_POST['id'];
      $customer = new Customer($_POST['name'], $_POST['email'], $_POST['address']);
      $this->customerServiceImpl->update($id, $customer);
      header('Location: index.php');
  }
}
}
?>