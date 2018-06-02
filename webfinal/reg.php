<?php  
$config = array(); // указываем, что переменная $config это массив  
$config['server'] = "localhost"; //сервер MySQL. Обычно это localhost  
$config['login'] ="root"; //пользователь MySQL  
$config['passw'] = ""; //пароль от пользователя MySQL  
$config['name_db'] = "auth_reg"; //название нашей БД  

$connect = mysql_connect($config['server'], $config['login'], $config['passw']) or die("Error!"); // подключаемся к MySQL или, в случаи  ошибки, прекращаем выполнение кода 
mysql_select_db($config['name_db'], $connect) or die("Error!"); // выбираем БД  или, в случаии ошибки, прекращаем выполнение кода  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Регистрация</title>
</head>

<body>
<div align="center">
<form action="" method="post" enctype="multipart/form-data">
Логин:<br /><input name="login" type="text" size="20"><br />
Пароль:<br /><input name="password" type="password" size="20"><br />
Еще раз пароль:<br /><input name="password2" type="password" size="20"><br />
E-mail:<br /><input name="email" type="text" size="20"><br /><br />
<input name="submit" type="submit" value="Зарегистрироваться"><br />
</form>
</div>
</body>
</html>
<?php  
if(isset($_POST['submit'])){ //выполняем нижеследующий код, только если нажата кнопка 
if(empty($_POST['login'])){ //если переменная логина пуста или не существует  
echo"Вы не ввели логин"; // выводим сообщение об ошибке  
  }elseif(!preg_match("/[-a-zA-Z0-9]{3,15}/", $_POST['login'])){ //если переменная не соответствует шаблону -a-zA-Z0-9  
echo"Вы неправильно ввели логин"; // выводим сообщение об ошибке   
  }elseif(empty($_POST['password'])){ //если переменная логина пуста или не существует  
echo"Вы не ввели пароль"; // выводим сообщение об ошибке  
  }elseif(!preg_match("/[-a-zA-Z0-9]{3,30}/", $_POST['password'])){ //если переменная не соответствует шаблону -a-zA-Z0-9  
echo"Вы неправильно ввели пароль"; // выводим сообщение об ошибке   
  }else{  
  $login = $_POST['login']; //присваеваем переменную  
  $password = md5($_POST['password']);//присваеваем переменную и кодируем её в md5 для безопасности  
  $query = mysql_query("SELECT * FROM `users`  WHERE `login`='$login' AND `password`='$password'"); //отправляем запрос на выборку всего содержимого , где поле логин равно переменной $login, а поле password равно переменной $password  
  $row = mysql_num_rows($query); // считаем количество рядов результата запроса  
  if($row > 0){ //если их больше 0  
  echo "Вы успешно авторизовались!"; // выводим сообщение об удачной авторизации!  
  }else{  
  echo "Неправильный логин или пароль!"; // выводим сообщение об ошибке!  
  }  
   
  }  
}  
?>