<?php
session_start();

// Генеруємо CSRF токен, якщо його немає у сесії
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

/**
 * Функція для обчислення факторіалу числа
 *
 * @param integer $n Невід'ємне ціле число
 * @return integer Факторіал числа $n
 * @throws InvalidArgumentException Якщо $n не є невід'ємним цілим числом
 */
function factorial($n) {
    // Перевіряємо, чи є вхідне значення невід'ємним цілим числом
    if (!is_int($n) || $n < 0) {
        throw new InvalidArgumentException("Вхідне значення має бути невід'ємним цілим числом");
    }
    
    $result = 1;
    for ($i = 2; $i <= $n; $i++) { 
        $result *= $i;
    }
    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Перевіряємо CSRF токен
    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die('Invalid CSRF token');
    }

    // отримуємо дані з форми
    $number = filter_input(INPUT_POST, "number", FILTER_VALIDATE_INT, ["options" => ["min_range" => 0, "max_range" => 20]]);
    
    if ($number === false) {
        echo "Вхідне значення має бути невід'ємним цілим числом від 0 до 20";
    } else {
        try {
            echo factorial($number);
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }
}
