<?php
require_once(__DIR__ . "/db.php");
$BASE_PATH = '/Project/'; //This is going to be a helper for redirecting to our base project path since it's nested in another folder
function se($v, $k = null, $default = "", $isEcho = true)
{
    if (is_array($v) && isset($k) && isset($v[$k])) {
        $returnValue = $v[$k];
    } else if (is_object($v) && isset($k) && isset($v->$k)) {
        $returnValue = $v->$k;
    } else {
        $returnValue = $v;
        //added 07-05-2021 to fix case where $k of $v isn't set
        //this is to kep htmlspecialchars happy
        if (is_array($returnValue) || is_object($returnValue)) {
            $returnValue = $default;
        }
    }
    if (!isset($returnValue)) {
        $returnValue = $default;
    }
    if ($isEcho) {
        //https://www.php.net/manual/en/function.htmlspecialchars.php
        echo htmlspecialchars($returnValue, ENT_QUOTES);
    } else {
        //https://www.php.net/manual/en/function.htmlspecialchars.php
        return htmlspecialchars($returnValue, ENT_QUOTES);
    }
}
//TODO 2: filter helpers
function sanitize_email($email = "")
{
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}
function is_valid_email($email = "")
{
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
}
//TODO 3: User Helpers
function is_logged_in($redirect = false, $destination = "login.php")
{
    $isLoggedIn = isset($_SESSION["user"]);
    if ($redirect && !$isLoggedIn) {
        flash("You must be logged in to view this page", "warning");
        die(header("Location: $destination"));
    }
    return $isLoggedIn; //se($_SESSION, "user", false, false);
}
function has_role($role)
{
    if (is_logged_in() && isset($_SESSION["user"]["roles"])) {
        foreach ($_SESSION["user"]["roles"] as $r) {
            if ($r["name"] === $role) {
                return true;
            }
        }
    }
    return false;
}
function get_username()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "username", "", false);
    }
    return "";
}
function get_user_email()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "email", "", false);
    }
    return "";
}
function get_user_id()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "id", false, false);
    }
    return false;
}
//TODO 4: Flash Message Helpers
function flash($msg = "", $color = "info")
{
    $message = ["text" => $msg, "color" => $color];
    if (isset($_SESSION['flash'])) {
        array_push($_SESSION['flash'], $message);
    } else {
        $_SESSION['flash'] = array();
        array_push($_SESSION['flash'], $message);
    }
}

function getMessages()
{
    if (isset($_SESSION['flash'])) {
        $flashes = $_SESSION['flash'];
        $_SESSION['flash'] = array();
        return $flashes;
    }
    return array();
}
//TODO generic helpers
function reset_session()
{
    session_unset();
    session_destroy();
    session_start();
}
function users_check_duplicate($errorInfo)
{
    if ($errorInfo[1] === 1062) {
        //https://www.php.net/manual/en/function.preg-match.php
        preg_match("/Users.(\w+)/", $errorInfo[2], $matches);
        if (isset($matches[1])) {
            flash("The chosen " . $matches[1] . " is not available.", "warning");
        } else {
            //TODO come up with a nice error message
            flash("<pre>" . var_export($errorInfo, true) . "</pre>");
        }
    } else {
        //TODO come up with a nice error message
        flash("<pre>" . var_export($errorInfo, true) . "</pre>");
    }
}
function get_url($dest)
{
    global $BASE_PATH;
    if (str_starts_with($dest, "/")) {
        //handle absolute path
        return $dest;
    }
    //handle relative path
    return $BASE_PATH . $dest;
}


function get_columns($table)
{
    $table = se($table, null, null, false);
    $db = getDB();
    $query = "SHOW COLUMNS from $table"; //be sure you trust $table
    $stmt = $db->prepare($query);
    $results = [];
    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<pre>" . var_export($e, true) . "</pre>";
    }
    return $results;
}

function save_data($table, $data, $ignore = ["submit"])
{
    $table = se($table, null, null, false);
    $db = getDB();
    $query = "INSERT INTO $table "; //be sure you trust $table
    //https://www.php.net/manual/en/functions.anonymous.php Example#3
    $columns = array_filter(array_keys($data), function ($x) use ($ignore) {
        return !in_array($x, $ignore); // $x !== "submit";
    });
    //arrow function uses fn and doesn't have return or { }
    //https://www.php.net/manual/en/functions.arrow.php
    $placeholders = array_map(fn ($x) => ":$x", $columns);
    $query .= "(" . join(",", $columns) . ") VALUES (" . join(",", $placeholders) . ")";

    $params = [];
    foreach ($columns as $col) {
        $params[":$col"] = $data[$col];
    }
    $stmt = $db->prepare($query);
    try {
        $stmt->execute($params);
        //https://www.php.net/manual/en/pdo.lastinsertid.php
        //echo "Successfully added new record with id " . $db->lastInsertId();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        flash("<pre>" . var_export($e->errorInfo, true) . "</pre>");
        return -1;
    }
}
function update_data($table, $id,  $data, $ignore = ["id", "submit"])
{
    $columns = array_keys($data);
    foreach ($columns as $index => $value) {
        //Note: normally it's bad practice to remove array elements during iteration

        //remove id, we'll use this for the WHERE not for the SET
        //remove submit, it's likely not in your table
        if (in_array($value, $ignore)) {
            unset($columns[$index]);
        }
    }
    $query = "UPDATE $table SET "; //be sure you trust $table
    $cols = [];
    foreach ($columns as $index => $col) {
        array_push($cols, "$col = :$col");
    }
    $query .= join(",", $cols);
    $query .= " WHERE id = :id";

    $params = [":id" => $id];
    foreach ($columns as $col) {
        $params[":$col"] = se($data, $col, "", false);
    }
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute($params);
        return true;
    } catch (PDOException $e) {
        flash("<pre>" . var_export($e->errorInfo, true) . "</pre>");
        return false;
    }
}
function inputMap($fieldType)
{
    if (str_contains($fieldType, "varchar")) {
        return "text";
    } else if ($fieldType === "text") {
        return "textarea";
    } else if (in_array($fieldType, ["int", "decimal"])) { //TODO fill in as needed
        return "number";
    }
    return "text"; //default
}

function add_item($product_id, $user_id, $unit_cost, $desired_quantity = 1)
{
    error_log("add_item() Product ID: $product_id, User_id: $user_id, Unit Cost: $unit_cost, Desired Quantity: $desired_quantity");
    //I'm using negative values for predefined items so I can't validate >= 0 for item_id
    if (/*$item_id <= 0 ||*/$user_id <= 0 || $desired_quantity === 0) {
        
        return;
    }
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO Cart (product_id, user_id, desired_quantity, unit_cost) VALUES (:iid, :uid, :q, :uc) ON DUPLICATE KEY UPDATE desired_quantity = desired_quantity + :q");
    try {
        //if using bindValue, all must be bind value, can't split between this an execute assoc array
        $stmt->bindValue(":q", $unit_cost, PDO::PARAM_INT);
        $stmt->bindValue(":uc", $desired_quantity, PDO::PARAM_INT);
        $stmt->bindValue(":iid", $product_id, PDO::PARAM_INT);
        $stmt->bindValue(":uid", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error adding $desired_quantity of $product_id to user $user_id: " . var_export($e->errorInfo, true));
    }
    return false;
}

function purchase_item($user_id, $total_price, $address, $payment_method)
{
    error_log("add_item() User_id: $user_id, Total Price: $total_price, Payment Method: $payment_method");
    //I'm using negative values for predefined items so I can't validate >= 0 for item_id
    if (/*$item_id <= 0 ||*/$user_id <= 0 || $payment_method === 0) {
        
        return;
    }
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO Orders (user_id, total_price, address, payment_method) VALUES (:uid, :tp, :ad, :pm)");
    try {
        //if using bindValue, all must be bind value, can't split between this an execute assoc array
        $stmt->bindValue(":uid", $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":tp", $total_price, PDO::PARAM_INT);
        $stmt->bindValue(":ad", $address, PDO::PARAM_INT);
        $stmt->bindValue(":pm", $payment_method, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error with checkout process" . var_export($e->errorInfo, true));
    }
    return false;
}

function paginate($query, $params = [], $per_page = 10)
{
    global $page; //will be available after function is called
    try {
        $page = (int)se($_GET, "page", 1, false);
    } catch (Exception $e) {
        //safety for if page is received as not a number
        $page = 1;
    }
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("paginate error: " . var_export($e, true));
    }
    $total = 0;
    if (isset($result)) {
        $total = (int)se($result, "total", 0, false);
    }
    global $total_pages; //will be available after function is called
    $total_pages = ceil($total / $per_page);
    global $offset; //will be available after function is called
    $offset = ($page - 1) * $per_page;
}
//updates or inserts page into query string while persisting anything already present
function persistQueryString($page)
{
    $_GET["page"] = $page;
    return http_build_query($_GET);
}

function get_total()
{
    $query = "SELECT SUM(unit_cost*desired_quantity) as total from Cart WHERE desired_quantity > 0";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return (int)se($r, "total", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error calculating total for cart" . var_export($e->errorInfo, true));
    }
    return 0;
}

function get_stock()
{
    $query = "SELECT stock from Products WHERE visibility = 1";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return (int)se($r, "stock", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error getting stock from cart" . var_export($e->errorInfo, true));
    }
    return 0;
}

function get_product_id()
{
    $query = "SELECT product_id from Cart";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return (int)se($r, "product_id", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error getting Product ID" . var_export($e->errorInfo, true));
    }
    return 0;
}

function get_desired_quantity()
{
    $query = "SELECT desired_quantity from Cart";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return (int)se($r, "desired_quantity", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error getting desired_quantity" . var_export($e->errorInfo, true));
    }
    return 0;
}

function get_order_id()
{
    $query = "SELECT id from Orders";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return (int)se($r, "id", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error getting Order ID" . var_export($e->errorInfo, true));
    }
    return 0;
}

function get_unit_price()
{
    $query = "SELECT unit_cost from Cart";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return (int)se($r, "unit_cost", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error getting unit price" . var_export($e->errorInfo, true));
    }
    return 0;
}

function add_order_item($order_id, $product_id, $quantity, $unit_price)
{
    error_log("add_order_item() Order ID: $order_id, Product ID: $product_id, Quantity: $quantity Unit Price: $unit_price");
    //I'm using negative values for predefined items so I can't validate >= 0 for item_id
    if (/*$item_id <= 0 ||*/$order_id <= 0 || $quantity === 0) {
        
        return;
    }
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO OrderItems (order_id, product_id, quantity, unit_price) VALUES (:oid, :pid, :q, :up)");
    try {
        //if using bindValue, all must be bind value, can't split between this an execute assoc array
        $stmt->bindValue(":oid", $order_id, PDO::PARAM_INT);
        $stmt->bindValue(":pid", $product_id, PDO::PARAM_INT);
        $stmt->bindValue(":q", $quantity, PDO::PARAM_INT);
        $stmt->bindValue(":up", $unit_price, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error adding $quantity of $product_id" . var_export($e->errorInfo, true));
    }
    return false;
}

function redirect($path)
{ //header headache
    //https://www.php.net/manual/en/function.headers-sent.php#90160
    /*headers are sent at the end of script execution otherwise they are sent when the buffer reaches it's limit and emptied */
    if (!headers_sent()) {
        //php redirect
        die(header("Location: " . get_url($path)));
    }
    //javascript redirect
    echo "<script>window.location.href='" . get_url($path) . "';</script>";
    //metadata redirect (runs if javascript is disabled)
    echo "<noscript><meta http-equiv=\"refresh\" content=\"0;url=" . get_url($path) . "\"/></noscript>";
    die();
}

function rate_item($product_id, $user_id, $rating, $comment)
{
    error_log("add_order_item() Product ID: $product_id, User ID: $user_id, Rating: $rating Comment: $comment");
    //I'm using negative values for predefined items so I can't validate >= 0 for item_id
    if (/*$item_id <= 0 ||*/$rating < 1 || $rating > 5) {
        
        return;
    }
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO Ratings (product_id, user_id, rating, comment) VALUES (:pid, :uid, :rtg, :cmt)");
    try {
        //if using bindValue, all must be bind value, can't split between this an execute assoc array
        $stmt->bindValue(":pid", $product_id, PDO::PARAM_INT);
        $stmt->bindValue(":uid", $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":rtg", $rating, PDO::PARAM_INT);
        $stmt->bindValue(":cmt", $comment, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error rating $product_id" . var_export($e->errorInfo, true));
    }
    return false;
}

function get_average_rating()
{
    $query = "SELECT AVG(rating) as avg from Ratings";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($r) {
            return (float)se($r, "avg", 0, false);
        }
    } catch (PDOException $e) {
        error_log("Error calculating average" . var_export($e->errorInfo, true));
    }
    return 0;
}