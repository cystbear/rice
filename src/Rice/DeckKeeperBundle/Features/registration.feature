# language: ru
@insulated
Функционал: Регистрация
  Чтобы пользоваться сайтом
  Как гость сайта
  Я должен иметь возможность зарегистрироваться

  Сценарий: Регистрация
    Если я на странице "/"
    То я должен видеть "Register"
    Если я кликаю по ссылке "Register"
    То я должен видеть "Register"
    И я должен видеть "Username"
    И я должен видеть "Email"
    Если я ввожу "newuser" в поле "Username"
    И я ввожу "newuser@example.com" в поле "Email"
    И я ввожу "q1w2e3" в поле "Password"
    И я ввожу "q1w2e3" в поле "Verification"
    И я нажимаю "Register"
    То я должен видеть "Congrats newuser, your account is now activated."
