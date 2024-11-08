<?php
class Product {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($name, $description, $price) {
        $stmt = $this->conn->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $name, $description, $price);
        if ($stmt->execute()) {
            return ["message" => "Produto cadastrado com sucesso"];
        } else {
            return ["error" => "Erro ao cadastrar produto"];
        }
    }

    public function readAll() {
        $result = $this->conn->query("SELECT * FROM products");
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }

    public function read($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $name, $description, $price) {
        $stmt = $this->conn->prepare("UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?");
        $stmt->bind_param("ssdi", $name, $description, $price, $id);
        if ($stmt->execute()) {
            return ["message" => "Produto atualizado com sucesso"];
        } else {
            return ["error" => "Erro ao atualizar produto"];
        }
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return ["message" => "Produto excluído com sucesso"];
        } else {
            return ["error" => "Erro ao excluir produto"];
        }
    }
}
?>
