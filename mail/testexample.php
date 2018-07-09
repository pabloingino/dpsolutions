<?php
//EXAMPLE

$mailout = new mailer;
$mailout->from('sender@example.com', 'Sender');
$mailout->add_recipient('person1@example.com');//add a recipient in the to: field
$mailout->add_cc('person2@example.com');//carbon copy
$mailout->add_bcc('person3@example.com');//blind carbon copy
$mailout->subject('Test');//set subject
$mailout->message('Hi,

FILLER
---------------------------------------------
The quick brown fox jumped over the lazy dog. 
The quick brown fox jumped over the lazy dog.
The quick brown fox jumped over the lazy dog.
The quick brown fox jumped over the lazy dog.
The quick brown fox jumped over the lazy dog.
The quick brown fox jumped over the lazy dog.
The quick brown fox jumped over the lazy dog.
---------------------------------------------

Thank You!
');//set message body
$mailout->send();//send email(s)
?>