<?php 

function getAllProductsInfo(){
    require "../utility/connection.php";
    $sql = "SELECT * FROM product";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt->execute() > 0){
        $stmt->bind_result($id, $name, $price, $pic, $details);
        $rows = array();
        while ($stmt->fetch()) {
            $rows[] = array('id' => $id, 'name' => $name, 'price' => $price, 'pic' => $pic, 'details' => $details);
        }
        $_SESSION['allProductsInfo'] = $rows;
        $stmt->close(); 
        $conn->close();
        return true;
    }else{
        return false;
    }
}

//---------------------------------------------------------
//---------------------------------------------------------

function getProductInfo($id){
    require "../utility/connection.php";
    $sql = "SELECT name, price, pic, details FROM product WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->bind_result($name, $price, $pic, $details);
    $stmt->fetch();
    $productInfo = array('name' => $name, 'price' => $price, 'pic' => $pic, 'details' => $details);
    $_SESSION['productInfo'] = $productInfo;
    $stmt->close(); 
    $conn->close();
}

//---------------------------------------------------------
//---------------------------------------------------------

function searchProduct($searchQuery) {
    require "../utility/connection.php";
    $sql = "SELECT id, name, price, pic FROM product WHERE name LIKE ?";
    $stmt = mysqli_prepare($conn, $sql);
    $searchQuery = "%" . $searchQuery . "%";
    $stmt->bind_param("s", $searchQuery);
    if($stmt->execute()) {
        $stmt->bind_result($id, $name, $price, $pic);
        $rows = array();
        while ($stmt->fetch()) {
            $rows[] = array('id' => $id, 'name' => $name, 'price' => $price, 'pic' => $pic);
        }
        $_SESSION['searchProduct'] = $rows;
        $stmt->close(); 
        return true;
    } else {
        return false;
    }
}

//---------------------------------------------------------
//---------------------------------------------------------

function getUserInfo(){
    require "../utility/connection.php";
    $sql = "SELECT firstname,lastname,gender,email,phone,address,dob,password FROM userinfo where username=?";
    $stmt = $conn -> prepare($sql);
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name, $gender, $email, $phone, $address, $dob, $password);
    $stmt->fetch();
    $userinfo = array('firstname' => $first_name, 'lastname' => $last_name, 'gender' => $gender, 'email' => $email, 'phone' => $phone, 'address' => $address, 'dob' => $dob, 'username' => $_SESSION['username'], 'password' => $password);
    $_SESSION['userinfo'] = $userinfo;
    $stmt->close();
    $conn->close();
}

//---------------------------------------------------------
//---------------------------------------------------------

function getOrdersInfo($email) {
    require "../utility/connection.php";
    $sql = "SELECT id, details, totalPrice, shippingAddress, orderDate, deliveryDate FROM `order` WHERE email = \"$email\"";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt->execute() > 0){
        $stmt->bind_result($id, $details, $total_price, $shipping_address, $order_date, $delivery_date);
        $rows = array();
        while ($stmt->fetch()) {
            $rows[] = array('id' => $id, 'details' => $details, 'totalPrice' => $total_price, 'shippingAddress' => $shipping_address, 'orderDate' => $order_date, 'deliveryDate' => $delivery_date);
        }
        $_SESSION['ordersInfo'] = $rows;
        $stmt->close(); 
        $conn->close();
        return true;
    }else{
        return false;
    }
}
?>