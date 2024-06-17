<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include("db.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    $lastUpdateDate = strtotime($row['last_profile_update']);
    $currentDate = time();
    $daysSinceUpdate = ($currentDate - $lastUpdateDate) / (60 * 60 * 24);

    $user_id = $row['user_id'];
    $email = $row['email'];
    $uname = htmlspecialchars($row['uname']);

    if ($daysSinceUpdate >= 15) {

        $lastEmailSentSql = "SELECT * FROM reminder_logs WHERE user_id = ? AND reminder_sent_at >= NOW() - INTERVAL 15 DAY";
        $stmtLastEmail = $conn->prepare($lastEmailSentSql);
        $stmtLastEmail->bind_param("s", $user_id);
        $stmtLastEmail->execute();
        $resultLastEmail = $stmtLastEmail->get_result();

        if ($resultLastEmail->num_rows == 0) {
            $mail = new PHPMailer(true);

            try {
                
                $mail->SMTPDebug = SMTP::DEBUG_OFF;
                $mail->isSMTP(); 
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true; 
                $mail->Username = 'arunkarthikhtmlcss@gmail.com'; 
                $mail->Password = 'stkn dvhe qqrh igcs';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587; 

                //Recipients
                $mail->setFrom('your-email@example.com', 'BHC');
                $mail->addAddress($email, $uname); 

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Profile Update Reminder';
                $mail->Body = "Hey $uname,Just a friendly reminder to update your profile on <a href='http://localhost/fproject/project/login.php'>bhc</a>. Keeping your information current helps you connect with the right people and stay informed about the latest developments on the platform.";

                $mail->send();
                echo "Reminder email sent to $email for user $user_id<br>";

                $logSql = "INSERT INTO reminder_logs (user_id, reminder_sent_at) VALUES (?, NOW())";
                $stmt = $conn->prepare($logSql);
                $stmt->bind_param("s", $user_id);

                if ($stmt->execute()) {
                    echo "Reminder logged for user $user_id<br>";
                } else {
                    echo "Error logging reminder for user $user_id<br>";
                }

                $stmt->close();
            } catch (Exception $e) {
                echo "Error sending reminder email to $email for user $user_id: {$mail->ErrorInfo}<br>";
            }
        } else {
            echo "Email already sent to $email within the last 15 days for user $user_id<br>";
        }

        $stmtLastEmail->close();
    } else {
        echo "No reminder needed for user $user_id<br>";
    }
}

$conn->close();
?>