<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT id, name, description, category, stock, unit_price from Products WHERE stock > 0");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}

$resultsA = [];
$db = getDB();

$base_query = "SELECT product_id,rating,comment FROM Ratings";
$total_query = "SELECT count(1) as total FROM Ratings";
//dynamic query
$query = " WHERE 1=1"; //1=1 shortcut to conditionally build AND clauses
$params = []; //define default params, add keys as needed and pass to execute

//paginate function
$per_page = 10;
paginate($total_query . $query, $params, $per_page);

$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
//get the records
$stmtA = $db->prepare($base_query . $query); //dynamically generated query
//we'll want to convert this to use bindValue so ensure they're integers so lets map our array
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmtA->bindValue($key, $value, $type);
}
$params = null; //set it to null to avoid issues
//$stmtA = $db->prepare("SELECT product_id, rating, comment from Ratings");
try {
    $stmtA->execute($params); //dynamically populated params to bind
    $z = $stmtA->fetchAll(PDO::FETCH_ASSOC);
    if ($z) {
        $resultsA = $z;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}

?>
<div class="container-fluid">
    <h1>Product Details</h1>
    <table class="table text-light">
        <thead>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Unit Price</th>
            <th>Rate Product</th>
        </thead>
        <tbody>
            <?php if (count($results) > 0) : ?>
                <?php foreach ($results as $row) : ?>
                    <tr>
                        <td><?php se($row, "id"); ?></td>
                        <td><?php se($row, "name"); ?></td>
                        <td><?php se($row, "description"); ?></td>
                        <td><?php se($row, "category"); ?></td>
                        <td><?php se($row, "stock"); ?></td>
                        <td><?php se($row, "unit_price"); ?></td>
                        <td>
                            <?php if (se($row, "joined", 0, false)) : ?>
                                <button class="btn btn-primary disabled" onclick="event.preventDefault()" disabled>Already Joined</button>
                            <?php else : ?>
                                <form action="api/rate_product.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?php se($row, 'id'); ?>" />
                                    <input type="hidden" name="unit_cost" value="<?php se($row, 'unit_cost'); ?>" />
                                    <input type="hidden" name="desired_quantity" value="<?php se($row, 'desired_quantity'); ?>" />
                                    <input type="text" placeholder="Rating(1-5)" name="rating" />
                                    <input type="text" placeholder="Comment" name="comment" />
                                    <input type="submit" value="Rate Product" />
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="100%">Cart is empty</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h1>Product Ratings</h1>
    //Avg
    Average Rating: <?php echo(get_average_rating()); ?>
    <form class="row row-cols-auto g-3 align-items-center">
        <div class="col">
        </div>
        <div class="col">
            <div class="input-group">
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].col.value = "<?php se($col); ?>";
                </script>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].order.value = "<?php se($order); ?>";
                </script>
            </div>
        </div>
        <div class="col">
        </div>
    </form>
    <table class="table text-light">
        <thead>
            <th>Product ID</th>
            <th>Rating</th>
            <th>Comment</th>
        </thead>
        <tbody>
            <?php if (count($resultsA) > 0) : ?>
                <?php foreach ($resultsA as $row) : ?>
                    <tr>
                        <td><?php se($row, "product_id"); ?></td>
                        <td><?php se($row, "rating"); ?></td>
                        <td><?php se($row, "comment"); ?></td>
                        <td>
                            <?php if (se($row, "joined", 0, false)) : ?>
                                <button class="btn btn-primary disabled" onclick="event.preventDefault()" disabled>Already Joined</button>
                            <?php else : ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="100%">Cart is empty</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php include(__DIR__ . "/../../partials/pagination.php"); ?>
</div>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/footer.php");
?>