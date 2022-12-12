<?php

require_once('../CSV/CSVHelper.php');

class AuthHelper
{
  static function signup($filename, $email, $password)
  {
    if (CSVHelper::getUser($filename, $email) == false) {
      $fh = fopen($filename, 'a+');
      fputs($fh, $email . ';' . password_hash($password, PASSWORD_DEFAULT) . PHP_EOL);
      fclose($fh);
      echo "You created your account. Sign in to continue.";
      return true;
    } else {
      echo "You already have an account. Sign in please or create another account.";
    }
  }

  static function signin($filename, $email, $password)
  {
    // If user is already logged, they'll be taken to the private page
    if (isset($_SESSION['logged']) && $_SESSION['logged' == true]) {
      header('location: index.php');
    }

    $fh = fopen($filename, 'r');
    while ($line = fgets($fh)) {
      $line = trim($line);
      $line = explode(';', $line);
      if ($line[0] == $email) {
        if (password_verify($password, $line[1])) {
          $_SESSION['logged'] = true;
          $_SESSION['email'] = $line[0];
          echo "Signed in!";
        } else die('Not today: You\'re password didn\'t match our records');
      }
    }
    fclose($fh);
    return;
  }

  static function signout()
  {
    unset($_SESSION['logged']);
    session_destroy();
    echo "Signed out";

    // header('location: index.php');
    return;
  }

  static function logged_in()
  {
    // return (isset($_SESSION['logged']) && $_SESSION['logged'] == true);
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
      return true;
    } else {
      return false;
    }
  }
}
