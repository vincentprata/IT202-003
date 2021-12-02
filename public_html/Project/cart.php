<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT product_id, unit_cost, desired_quantity from Cart WHERE desired_quantity > 0");
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
    <h1>Cart</h1>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach ($results as $item) : ?>
            <div class="col">
                <div class="card bg-dark">

                    <div class="card-body">
                        <h5 class="card-title">Product ID: <?php se($item, "product_id"); ?></h5>
                        <p class="card-text">Quantity: <?php se($item, "desired_quantity"); ?></p>
                        <p class="card-text">Unit Price: <?php se($item, "unit_cost"); ?></p>

                    </div>
                    <div class="card-footer">
                        Total Cost: <?php se($item, "unit_cost")?>
                        <!-- example form submit-->
                        <form action="product_details.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php se($item, 'id'); ?>" />
                            <input type="hidden" name="unit_cost" value="<?php se($item, 'unit_price'); ?>" />
                            <input type="hidden" name="desired_quantity" value="1" />
                            <input type="submit" value="Product Details" />
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>