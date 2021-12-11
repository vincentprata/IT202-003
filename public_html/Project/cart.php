<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT unit_cost, desired_quantity,product_id, name, unit_cost*desired_quantity as sub_total from Cart INNER JOIN Products  ON Cart.product_id = Products.id  WHERE desired_quantity > 0");
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
<script>
    function checkout(payment_method, total_price) {
        console.log("TODO purchase item", item);
        let example = 1;
        if (example === 1) {
            let http = new XMLHttpRequest();
            http.onreadystatechange = () => {
                if (http.readyState == 4) {
                    if (http.status === 200) {
                        let data = JSON.parse(http.responseText);
                        console.log("received data", data);
                        flash(data.message, "success")
                    }
                    console.log(http);
                }
            }
            http.open("POST", "checkout.php", true);
            let data = {
                total_price: total_price,
                payment_method: payment_method
                //cost: cost
            }
            let q = Object.keys(data).map(key => key + '=' + data[key]).join('&');
            console.log(q)
            http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            http.send(q);
        } else if (example === 2) {
            let data = new FormData();
            data.append("total_price", total_price);
            data.append("payment_method", payment_method);
            //data.append("cost", cost);
            fetch("checkout.php", {
                    method: "POST",
                    headers: {
                        "Content-type": "application/x-www-form-urlencoded",
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    body: data
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    flash(data.message, "success");
                    refreshBalance();
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        } else if (example === 3) {
            $.post("checkout.php", {
                    total_price: total_price,
                    payment_method: payment_method
                    //cost: cost
                }, (resp, status, xhr) => {
                    console.log(resp, status, xhr);
                    let data = JSON.parse(resp);
                    flash(data.message, "success");
                },
                (xhr, status, error) => {
                    console.log(xhr, status, error);
                });
        }
        //TODO create JS helper to update all show-balance elements
    }
</script>
<div class="container-fluid">
    <h1>Cart</h1>
    Total: <?php echo(get_total()); ?>
    <form action="api/clear_cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php se($item, 'product_id'); ?>" />
        <input type="hidden" name="unit_cost" value="<?php se($item, 'unit_cost'); ?>" />
        <input type="hidden" name="desired_quantity" value="<?php se($item, 'desired_quantity'); ?>" />
        <input type="submit" value="Clear Cart" />
    </form>
    <form action= "checkout.php" method="POST">
        <input type="hidden" name="product_id" value="<?php se($item, 'product_id'); ?>" />
        <input type="hidden" name="unit_cost" value="<?php se($item, 'unit_cost'); ?>" />
        <input type="hidden" name="desired_quantity" value="<?php se($item, 'desired_quantity'); ?>" />
        <input type="submit" value="Checkout" />
    </form>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach ($results as $item) : ?>
            <div class="col">
                <div class="card bg-dark">

                    <div class="card-body">
                        <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                        <p class="card-text">Quantity: <?php se($item, "desired_quantity"); ?></p>
                        <p class="card-text">Cost: <?php se($item, "unit_cost"); ?></p>

                    </div>
                    <div class="card-footer">
                        Sub Total: <?php se($item, 'sub_total'); ?>
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