<?php
require(__DIR__ . "/../../partials/nav.php");

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
    <table class="table text-light">
        <thead>
            <th>Order Placed</th>
            <th>Total Price</th>
            <th>Address</th>
            <th>Payment Method</th>
        </thead>
        <tbody>
            <?php if (count($results) > 0) : ?>
                <?php foreach ($results as $row) : ?>
                    <tr>
                        <td><?php se($row, "created"); ?></td>
                        <td><?php se($row, "total_price"); ?></td>
                        <td><?php se($row, "address"); ?></td>
                        <td><?php se($row, "payment_method"); ?></td>
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
                    <td colspan="100%">Nothing to show</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>