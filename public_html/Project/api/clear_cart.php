<?php
require_once(__DIR__ . "/../../../lib/functions.php");
session_start();
//$response = ["message" => "There was a problem completing your purchase"];
http_response_code(400);
error_log(var_export($_POST, true));
if (isset($_POST["product_id"])) {
    $product_id = se($_POST, "product_id", 0, false);
    $user_id = get_user_id();
    $isValid = true;
    $db = getDB();
    //deduct item
    $stmt = $db->prepare("DELETE Cart set desired_quantity = 0 WHERE product_id > 0");
    try {
        $stmt->execute([":id" => $product_id]);
        //TODO check if "check" constraint failed (quantity < 0)
        //TODO check affected rows (0 means they didn't own the item)
    } catch (PDOException $e) {
        error_log("Use Item Error: " . var_export($e->errorInfo, true));
        if ($e->errorInfo[1] === 3819) {
            http_response_code(404);
            $response["message"] = "You don't have any of this item remaining";
            $response["delete"] = $item_id; //tell the UI to remove the item from the grid
        }
        $db->rollback();
    }

    if ($isValid) {
        http_response_code(200);
        $response["message"] = "Purchased $desired_quantity of $name";
        die(header("Location: $BASE_PATH" . "cart.php"));
        //success
        
    }

}
echo json_encode($response);
