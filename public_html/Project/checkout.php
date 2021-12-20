<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        
        return true;
    }
</script>

<div class="container-fluid">
    <h1>Payment Information</h1>
    <p>Please select your method of payment:</p>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <input type="radio" id="Cash" id="Cash" name="payment_method" value="Cash">
            <label for="Cash">Cash</label>
            <input type="radio" id="Visa" id="Visa" name="payment_method" value="Visa">
            <label for="Visa">Visa</label>
            <input type="radio" id="MasterCard" id="MasterCard" name="payment_method" value="MasterCard">
            <label for="Visa">MasterCard</label>
            <input type="radio" id="Amex" id="Amex" name="payment_method" value="Amex">
            <label for="Visa">Amex</label>
        </div>
        <div class="mb-3">
            <label class="form-label" for="payment">Payment</label>
            <input class="form-control" type="payment" id="payment" name="payment" />
        </div>
        <h1>Shipping Information</h1>
        <div class="mb-3">
            <label class="form-label" for="streetaddress">Street Address</label>
            <input class="form-control" type="address" id="address" name="address" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="apt">Apartment, suite, etc.</label>
            <input class="form-control" type="address" id="address" name="address" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="apt">City</label>
            <input class="form-control" type="address" id="address" name="address" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="apt">State/Province</label>
            <input class="form-control" type="address" id="address" name="address" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="apt">Country</label>
            <input class="form-control" type="address" id="address" name="address" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="apt">Zip/Postal Code</label>
            <input class="form-control" type="address" id="address" name="address" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Complete Purchase" />
    </form>
</div>
<?php
//remember, API endpoints should only echo/output precisely what you want returned
//any other unexpected characters can break the handling of the response
$response = ["message" => "There was a problem completing your purchase"];
http_response_code(400);
error_log("req: " . var_export($_POST, true));
if (isset($_POST["address"]) && isset($_POST["payment_method"]) && isset($_POST["payment"])) {
    require_once(__DIR__ . "/../../lib/functions.php");
    $user_id = get_user_id();
    $order_id = get_order_id();
    //$desired_quantity = (int)se($_POST, "desired_quantity", 0, false);
    $total_price = get_total();
    //$unit_price = get_unit_price();
    $product_id = get_product_id();
    $desired_quantity = get_desired_quantity();
    $stock = get_stock();
    $payment = (int)se($_POST, "payment", 0, false);
    $address = se($_POST, "address", "", false);
    $payment_method = se($_POST, "payment_method", "", false);
    $isValid = true;

    if ($user_id <= 0) {
        //invald user
        array_push($errors, "Invalid user");
        $isValid = false;
    }
    if ($total_price <= 0) {
        //not enough funds
        array_push($errors, "Invalid cost");
        $isValid = false;
    }

    if ($payment < 0 || $payment != $total_price) {
        flash("Invalid payment amount");
        redirect("cart.php");
        $isValid = false;
    }

    //I'll have predefined items loaded in at negative values
    //so I don't need/want this check
    /*if ($item_id <= 0) {
        //invalid item
        array_push($errors, "Invalid item");
        $isValid = false;
    }*/
    //get true price from DB, don't trust the client
    $db = getDB();
    $stmt = $db->prepare("SELECT name,unit_price FROM Products where id = :id");
    $stmtZ = $db->prepare("SELECT product_id,desired_quantity,unit_cost FROM Cart");
    $name = "";
    try {
        $stmt->execute([":id" => $product_id]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            $unit_price = (int)se($r, "unit_cost", 0, false);
            $name = se($r, "name", "", false);
        }
    } catch (PDOException $e) {
        error_log("Error with checkout process " . var_export($e->errorInfo, true));
        $isValid = false;
    }
    if ($isValid) {
        //purchase_item($user_id, $total_price, $address, $payment_method);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Orders (address, payment_method, total_price, user_id) VALUES(:address, :pm, :tp, :uid)");
        $stmtA = $db->prepare("INSERT INTO OrderItems (order_id, product_id, quantity, unit_price) VALUES(:oid, :pid, :q, :up)");
        $stmtB = $db->prepare("UPDATE Products set stock = stock - $desired_quantity WHERE id = $product_id");
        $stmtC = $db->prepare("DELETE FROM Cart");
        try {
            $stmt->execute([":address" => $address, ":pm" => $payment_method, ":tp" => $total_price, ":uid" => $user_id]);
            $stmtA->execute([":oid" => get_order_id(), ":pid" => $product_id, ":q" => $desired_quantity, ":up" => get_unit_price()]);
            $stmtB->execute();
            $stmtC->execute();
            redirect("order_confirmation.php");
            flash("Successful Purchase");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
        http_response_code(200);
        //$response["message"] = "Checkout successful";
        //success
        
    }




  



}

//echo json_encode($response);
