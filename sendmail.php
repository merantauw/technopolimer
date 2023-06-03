</php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';

  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->setLanguage('ru', 'phpmailer/language/');
  $mail->isHTML(true);

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