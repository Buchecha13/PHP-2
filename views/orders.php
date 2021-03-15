<table class="orders" border="1">
    <tr>
        <td><b>Номер заказа</b></td>
        <td><b>Имя клиента</b></td>
        <td><b>Телефон клиента</b></td>
    </tr>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?= $order->id ?></td>
        <td><?= $order->clientName ?></td>
        <td><?= $order->clientPhone ?></td>
    </tr>
    <?php endforeach; ?>
</table>