<?php
namespace hpromero\ApiEjercicio1;
include 'order.php';
header('Content-Type: application/json');

$date = $_GET['date'];
$company = $_GET['company'];

class ApiOrders{
    function getOrders($date, $company){
        $order = new order();
        $orders = array();
        $orders['register'] = array();

        if (is_null($date)){
            if(is_null($company)){
                $result = $order->getAll();
            }else{
                $result = $order->getCompany($company);
            }
        }else{
            if(is_null($company)){
                $result = $order->getDate($date);
            }else{
                $result = $order->getDateCompany($date,$company);
            }

        }

        if($result->rowCount()){
            while($row = $result->fetch()){
                $register = array(
                    'id_order' => $row['id_order'],
                    'date' => $row['date'],
                    'company' => $row['company'],
                    'qty' => $row['qty'],
                );
                array_push($orders['register'], $register);
            }
            http_response_code(200);
            echo json_encode($orders, JSON_PRETTY_PRINT);
        }else{
            http_response_code(404);
            echo json_encode(array('error' => 'Data not found'));
        }
    }
    
}

$api =new ApiOrders();
$api->getOrders($date, $company);

?>