</php 
  use PHPMailer\PHPMailer\PHPMailer;
  <!-- use PHPMailer\PHPMailer\SMTP; -->
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/PHPMailer.php';
  <!-- require 'phpmailer/src/SMTP.php'; -->
  require 'phpmailer/src/Exception.php';

  $mail = new PHPMailer(true);
  
  <!-- $mail->isSMTP();

  $mail->Host   = 'smtp.yandex.ru';  // Адрес SMTP сервера
  $mail->SMTPAuth   = true;          // Enable SMTP authentication
  $mail->Username   = 'zholu.vlad2010';       // ваше имя пользователя (без домена и @)
  $mail->Password   = 'Yheo372YD';    // ваш пароль
  $mail->SMTPSecure = 'ssl';         // шифрование ssl
  $mail->Port   = 465;               // порт подключения

  $mail->setFrom('zholu.vlad2010@yandex.ru', 'Иван Иванов');    // от кого
  $mail->addAddress('zholu,.vlad2010@gmail.com', 'Вася Петров'); // кому
  
  $mail->Subject = 'Тест';
  $mail->msgHTML("<html><body>
                  <h1>Здравствуйте!</h1>
                  <p>Это тестовое письмо.</p>
                  </html></body>");
  // Отправляем
  if ($mail->send()) {
    echo 'Письмо отправлено!';
  } else {
    echo 'Ошибка: ' . $mail->ErrorInfo;
  } -->
 

  //От кого письмо
  $mail->setFrom('zholu.vlad2010@yandex.ru', 'От клиента');
  //Кому отправить
  $mail>addAddress('zholu.vlad2010@yandex.ru');
  $mail->Subject = 'Новая заявка с сайта';

  //тело письма
  $body = '<h1>С сайта упала новая заявка!</h1>';

  if(trim(!empty($_POST['tel']))){
    $body.='<p><strong>Номер:</strong> '.$_POST['tel'].'</p>';
  }

  if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Номер:</strong> '.$_POST['email'].'</p>';
  }

  if(trim(!empty($_POST['company']))){
    $body.='<p><strong>Номер:</strong> '.$_POST['company'].'</p>';
  }

  $mail->Body = $body;

  if(!$mail->send()){
    $message = 'Ошибка';
  } else{
    $message = 'Данные отправлены!';
  }

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
  
?>
