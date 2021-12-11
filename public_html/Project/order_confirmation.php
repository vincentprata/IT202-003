<?php
//require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT created, total_price, address, payment_method from Orders INNER JOIN OrderItems ON Orders.id = OrderItems.order_id");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}
?>
<div class="container-fluid">
    <h1>Thank You For Your Purchase!</h1>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach ($results as $item) : ?>
            <div class="col">
                <div class="card bg-dark">

                    <div class="card-body">
                        <h5 class="card-title">Order Placed: <?php se($item, "created"); ?></h5>
                        <p class="card-text">Total: <?php se($item, "total_price"); ?></p>
                        <p class="card-text">Method of Payment: <?php se($item, "payment_method"); ?></p>

                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>