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
    <form action="api/clear_cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php se($item, 'product_id'); ?>" />
        <input type="hidden" name="unit_cost" value="<?php se($item, 'unit_cost'); ?>" />
        <input type="hidden" name="desired_quantity" value="<?php se($item, 'desired_quantity'); ?>" />
        <input type="submit" value="Clear Cart" />
    </form>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach ($results as $item) : ?>
            <div class="col">
                <div class="card bg-dark">

                    <div class="card-body">
                        <h5 class="card-title">Product ID: <?php se($item, "name"); ?></h5>
                        <p class="card-text">Quantity: <?php se($item, "desired_quantity"); ?></p>
                        <p class="card-text">Unit Price: <?php se($item, "unit_cost"); ?></p>

                    </div>
                    <div class="card-footer">
                        Sub Total: <?php ?>
                        <!-- example form submit-->
                        <form action="product_details.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php se($item, 'id'); ?>" />
                            <input type="hidden" name="unit_cost" value="<?php se($item, 'unit_price'); ?>" />
                            <input type="hidden" name="desired_quantity" value="1" />
                            <input type="submit" value="Product Details" />
                        </form>
                        <form action="api/update_cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php se($item, 'product_id'); ?>" />
                            <input type="hidden" name="unit_cost" value="<?php se($item, 'unit_cost'); ?>" />
                            <input type="hidden" name="desired_quantity" value="<?php se($item, 'desired_quantity'); ?>" />
                            <input type="text" placeholder="Quantity" name="desired_quantity" />
                            <input type="submit" value="Update Quantity" />
                        </form>
                        <form action="api/remove_item.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php se($item, 'product_id'); ?>" />
                            <input type="hidden" name="unit_cost" value="<?php se($item, 'unit_cost'); ?>" />
                            <input type="hidden" name="desired_quantity" value="<?php se($item, 'desired_quantity', 0); ?>" />
                            <input type="submit" value="Remove Item" />
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