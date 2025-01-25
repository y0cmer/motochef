<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $phone = htmlspecialchars($_POST['phone']);
    $cartData = json_decode($_POST['cartData'], true);

    $to = "lukivorobets@gmail.com";
    $subject = "Нове замовлення";
    $message = "Ім'я: $name\nПрізвище: $surname\nТелефон: $phone\n\nТовари:\n";

    foreach ($cartData as $item) {
        $message .= "{$item['name']} - {$item['price']} грн\n";
    }

    $headers = "From: no-reply@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Замовлення успішно відправлено!";
    } else {
        echo "Помилка при відправці замовлення.";
    }
}
?>
