<?php
namespace Model;

class CustomerDB{
    public $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public function create($customer)
    {
        $sql = " INSERT INTO `customer`( `name`, `email`, `address`) VALUES (?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $customer->name);
        $statement->bindParam(2, $customer->email);
        $statement->bindParam(3, $customer->address);
        return $statement->execute();
        // var_dump($statement->execute());
    }

    public function getAll()
    {
        $sql = "select * FROM customer";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $customers = [];
        foreach ($result as $row){
            $customer = new Customer($row['name'], $row['email'], $row['address']);
            $customer->id = $row['id'];
            $customers[] = $customer;
        }
        return $customers;
    }
    
    public function get($id){
        $sql = "SELECT * FROM customer WHERE id = ?";
        $statement =  $this->connection->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        $row = $statement->fetch();
        $customer = new Customer($row['name'], $row['email'], $row['address']);
        $customer->id = $row['id'];
        return $customer;
    }

    public function delete($id){
        $sql = "DELETE FROM customer where id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindparam(1, $id);
        return $statement->execute();

    }
   // Bind params: Gắn giá trị thực vào các 
    //placeholder (tương tự như khi bạn truyền giá trị vào các tham số của phương thức)
    //Execute: Thực thi câu lệnh.
    public function update($id, $customer){
        $sql = "UPDATE customer SET name = ?, email = ?, address = ? WHERE id = ? ";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $customer->name);
        $statement->bindParam(2, $customer->email);
        $statement->bindParam(3, $customer->address);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }
}
?>