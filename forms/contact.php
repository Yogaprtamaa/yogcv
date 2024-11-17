<?php
  // Menampilkan semua error untuk debugging
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'prtmyog17@gmail.com';
  
  // Cek apakah file PHP Email Form ada
  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
      include($php_email_form);
  } else {
      die('Unable to load the "PHP Email Form" Library!');
  }
  
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  // Konfigurasi email tujuan
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'] ?? '';
  $contact->from_email = $_POST['email'] ?? '';
  $contact->subject = $_POST['subject'] ?? '';
  
  // Konfigurasi SMTP
  $contact->smtp = array(
      'host' => 'smtp.gmail.com',
      'username' => 'yoga18',
      'password' => 'rflf mdhe ihvi prhds',
      'port' => '587'
  );
  
  // Tambahkan pesan
  $contact->add_message($_POST['name'] ?? '', 'From');
  $contact->add_message($_POST['email'] ?? '', 'Email');
  $contact->add_message($_POST['message'] ?? '', 'Message', 10);
  
  // Kirim email
  echo $contact->send();
  ?>
  