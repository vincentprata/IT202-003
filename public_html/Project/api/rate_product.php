<?php
//remember, API endpoints should only echo/output precisely what you want returned
//any other unexpected characters can break the handling of the response
$response = ["message" => "There was a problem completing your purchase"];
http_response_code(400);
error_log("req: " . var_export($_POST, true));
if (isset($_POST["product_id"]) && isset($_POST["rating"]) && isset($_POST["comment"]) ) {
    require_once(__DIR__ . "/../../../lib/functions.php");
    session_start();
    $user_id = get_user_id();
    $product_id = (int)se($_POST, "product_id", 0, false);
    $rating = (int)se($_POST, "rating", 0, false);
    $comment = se($_POST, "comment", 0, false);
    $isValid = true;
    $errors = [];
    if ($user_id <= 0) {
        //invald user
        array_push($errors, "Invalid user");
        $isValid = false;
    }

    if ($isValid) {
        //purchase_item($user_id, $total_price, $address, $payment_method);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Ratings (product_id, user_id, rating, comment) VALUES(:pid, :uid, :rtg, :cmt)");
        try {
            $stmt->execute([":pid" => $product_id, ":uid" => $user_id, ":rtg" => $rating, ":cmt" => $comment]);
            flash("Feedback received");
            redirect("product_details.php");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
        http_response_code(200);
        //success
        
    }
}
echo json_encode($response);