<?php 

 // Устанавливаем email для получателя
 $to = "deniskaz_80@mail.ru"; // Замените на свой email

 // Заголовки письма
 $headers = "From: prokirtoha@gmail.com" . "\r\n" .
            "Reply-To: prokirtoha@gmail.com"."\r\n" .
            "Content-Type: text/plain; charset=UTF-8" . "\r\n";

 // Тело письма
 $email_message = "Имя: Олег\n";
 $email_message .= "Email: prokirtoha@gmail.com\n\n";
 $email_message .= "Сообщение:\n123\n";

 // Отправка письма
 if (mail($to, "asdasd", $email_message, $headers)) {
     echo "Письмо успешно отправлено!";
 } else {
     echo "Ошибка при отправке письма.";
 }

?>