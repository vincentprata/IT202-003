<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$user_id = get_user_id();
$stmt = $db->prepare("SELECT total_price, created, address, payment_method from Orders WHERE user_id = $user_id");
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
    <h1>Purchase History</h1>
    <table class="table text-light">
        <thead>
            <th>Order Placed</th>
            <th>Total Price</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php if (count($results) > 0) : ?>
                <?php foreach ($results as $row) : ?>
                    <tr>
                        <td><?php se($row, "created"); ?></td>
                        <td><?php se($row, "total_price"); ?></td>
                        <td>
                            <?php if (se($row, "joined", 0, false)) : ?>
                                <button class="btn btn-primary disabled" onclick="event.preventDefault()" disabled>Already Joined</button>
                            <?php else : ?>
                                <form action="order_details.php" method="POST">
                                    <input type="submit" value="Order Details" />
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="100%">No purchase history</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/footer.php");
?>