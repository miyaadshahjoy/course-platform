<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\UserModel;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$fullname = $_ENV['ADMIN_FULLNAME'];
$username = $_ENV['ADMIN_USERNAME'];
$email = $_ENV['ADMIN_EMAIL'] ;
$password = $_ENV['ADMIN_PASSWORD'];
$password_hashed = password_hash($password, PASSWORD_BCRYPT);
$role = 'admin';

$user = new UserModel();
$existingUser = $user->findByEmail($email);
if($existingUser):
    echo "Admin user with email $email already exists. No new user created.";
    return;
endif;


$result = $user->createUser([
    'fullname' => $fullname,
    'username' => $username,
    'email' => $email,
    'password' => $password_hashed,
    'role' => $role,
]);

if(!$result):
    echo "Error creating admin user.";
    return;
endif;
echo "✅ Admin user created successfully with email: $email and password: $password";

?>