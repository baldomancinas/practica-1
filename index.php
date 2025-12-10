<?php
require_once "ApiClient.php";

$resultado = [];

if (isset($_POST['consumir'])) {
    $api = new ApiClient();
    $data = $api->getItems();
    $resultado = array_values(array_filter($data, function ($item) {
        return isset($item['color']) && $item['color'] === 'green';
    }));
    file_put_contents(
        "Respuesta1.json",
        json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consumo REST - PHP</title>
</head>
<body>

<h2>Consumir Servicio REST (PHP)</h2>

<form method="POST">
    <button name="consumir">Consumir Servicio</button>
</form>

<?php if (!empty($resultado)): ?>
<script>
    console.log(<?= json_encode($resultado); ?>);
</script>

<pre><?= json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); ?></pre>
<?php endif; ?>

</body>
</html>
