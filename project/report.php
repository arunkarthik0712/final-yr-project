<?php
require 'dompdf/autoload.inc.php';
include('db.php');
use Dompdf\Dompdf;

$user_id=$_GET['user_id'];

$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result2 = $conn->query($query);
$user = $result2->fetch_assoc();

$query = "SELECT * FROM research_phd WHERE user_id = '$user_id'";
$result = $conn->query($query);


$query1 = "SELECT * FROM academic_details WHERE user_id = '$user_id' ORDER BY year_of_passing DESC";
$result1 = $conn->query($query1);

$query3 = "SELECT * FROM course_certificates WHERE user_id = '$user_id'";
$result3 = $conn->query($query3);

$query4 = "SELECT * FROM work_experience WHERE user_id = '$user_id'";
$result4 = $conn->query($query4);

$query5 = "SELECT * FROM teaching_experience WHERE user_id = '$user_id'";
$result5 = $conn->query($query5);

$query6 = "SELECT * FROM research_experience WHERE user_id = '$user_id'";
$result6 = $conn->query($query6);

$query7 = "SELECT * FROM fi_experience WHERE user_id = '$user_id'";
$result7 = $conn->query($query7);



//table of contents logics


$sqlCount = "SELECT COUNT(*) AS totalRows FROM conference_workshop WHERE user_id = $user_id";
$resultCount = $conn->query($sqlCount);

$sqlCount1 = "SELECT COUNT(*) AS totalRows FROM research_paper_presented WHERE user_id = $user_id";
$resultCount1 = $conn->query($sqlCount1);

$sqlCount2 = "SELECT COUNT(*) AS totalRows FROM publication_in_journal WHERE user_id = $user_id";
$resultCount2 = $conn->query($sqlCount2);

$sqlCount3 = "SELECT COUNT(*) AS totalRows FROM publication_in_book WHERE user_id = $user_id";
$resultCount3 = $conn->query($sqlCount3);

$sqlCount4 = "SELECT COUNT(*) AS totalRows FROM books_published WHERE user_id = $user_id";
$resultCount4 = $conn->query($sqlCount4);

$sqlCount5 = "SELECT COUNT(*) AS totalRows FROM conferences_workshops_seminars_organized WHERE user_id = $user_id";
$resultCount5 = $conn->query($sqlCount5);

$sqlCount6 = "SELECT COUNT(*) AS totalRows FROM research_project WHERE user_id = $user_id";
$resultCount6 = $conn->query($sqlCount6);

$sqlCount7 = "SELECT COUNT(*) AS totalRows FROM resource_person WHERE user_id = $user_id";
$resultCount7 = $conn->query($sqlCount7);

$sqlCount8 = "SELECT COUNT(*) AS totalRows FROM awards_received WHERE user_id = $user_id";
$resultCount8 = $conn->query($sqlCount8);


// end of table contents

$query8 = "SELECT * FROM conference_workshop WHERE user_id = '$user_id' ORDER BY date_from DESC, date_to DESC";
$result8 = $conn->query($query8);

$query9 = "SELECT * FROM research_paper_presented WHERE user_id = '$user_id' ORDER BY date_from DESC, date_to DESC";
$result9 = $conn->query($query9);

$query10 = "SELECT * FROM publication_in_journal WHERE user_id = '$user_id' ORDER BY date_of_publish DESC";
$result10 = $conn->query($query10);

$query11 = "SELECT * FROM publication_in_book WHERE user_id = '$user_id' ORDER BY month_and_year DESC";
$result11 = $conn->query($query11);

$query12 = "SELECT * FROM books_published WHERE user_id = '$user_id' ORDER BY month_and_year_of_publication DESC";
$result12 = $conn->query($query12);

$query13 = "SELECT * FROM conferences_workshops_seminars_organized WHERE user_id = '$user_id' ORDER BY date_from DESC, date_to DESC";
$result13= $conn->query($query13);

$query14 = "SELECT * FROM research_project WHERE user_id = '$user_id' ORDER BY date_from DESC, date_to DESC";
$result14 = $conn->query($query14);

$query15 = "SELECT * FROM resource_person WHERE user_id = '$user_id' ORDER BY date_of_event DESC";
$result15 = $conn->query($query15);

$query16 = "SELECT * FROM awards_received WHERE user_id = '$user_id' ORDER BY month_and_year DESC";
$result16 = $conn->query($query16);

ob_start();
include('pdf/pdf.php');
$html=ob_get_contents();
ob_get_clean();

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'potrait');

$dompdf->render();

$dompdf->stream($user['uname'].' report',['Attachment'=>0]);

?>