<?php

require 'test_login.php';
require 'test_register.php';
require 'test_show.php';
require 'test_update.php';
require 'test_search.php';
require 'utils.php';

$baseurl =  $_GET['baseurl'];

echo "[+] Testing Registration - Login - Show Profile\n";

echo "[*] Generating random user\n";

echo "---\n";
$email = generate_random_email();
$pass = generate_random_password();
$first_name = generate_random_name();
$last_name = generate_random_name();
$search = 'Teoria dei circuiti';
echo "Email: $email\n";
echo "Pass: $pass\n";
echo "First name: $first_name\n";
echo "Last name: $last_name\n";
echo "Search: $search\n";
echo "---\n";



echo "[-] Calling register.php\n";

register($email, $pass, $first_name, $last_name, $baseurl);

echo "[-] Calling login.php\n";
login($email, $pass, $baseurl);

echo "[-] Calling show_profile.php\n";

echo check_correct_user($email, $first_name, $last_name, show_logged_user($baseurl))
    ? "[*] Success!\n"
    : "[*] Failed\n";

echo "------------------------\n";

echo "[+] Testing Update - Show Profile\n";

echo "[*] Generating new random user\n";
$first_name = generate_random_name();
$last_name = generate_random_name();

echo "---\n";
echo "First name: $first_name\n";
echo "Last name: $last_name\n";
echo "---\n";

echo "[-] Calling update_profile.php\n";
update($first_name, $last_name, $baseurl);

echo "[-] Calling show_profile.php\n";

echo check_correct_user($email, $first_name, $last_name, show_logged_user($baseurl))
    ? "[*] Success!\n"
    : "[*] Failed\n";


echo "------------------------\n";
echo "[+] Testing Search\n";

echo "Calling tutor.php\n";

echo check_search_found($search, search($search, $baseurl))
     ? "[*] Success!\n"
	 : "[*] Failed\n";

