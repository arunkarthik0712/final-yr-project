<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Report</title>
<link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin-top: 0;
    }
    span{
        color: darkred;
    }
    h3 {
        color: darkred;
        margin-top: 0;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 12px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .tbody {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .box{
        padding: 10px;
        border: 1.5px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    p {
        color: #333;
        text-align: left;
        font-size: 16px;
    }

    .head {
        padding: 0;
        color: #333;
        font-size: 14px;
    }
</style>
</head>
<body>
		<h3><?= isset($user['sname']) ? $user['sname'] : 'Username Not Available' ?></h3>
		<p class="head"><?= isset($user['designation']) ? $user['designation'] : 'Designation Not Available' ?>,</p>
        <p class="head"><label>Department Of </label><?= isset($user['department']) ? $user['department'] : 'Department Not Available' ?>,</p>
        <p class="head">Bishop Heber College,</p>
        <p class="head">Tiruchirappalli - 17.</p>
        <p class="head"><label>Email : </label><span><?= isset($user['email']) ? $user['email'] : 'Email Not Available' ?></span>,</p>
        <p class="head"><label>Phone : </label><span><?= isset($user['mobile_number']) ? $user['mobile_number'] : 'Mobile Number Not Available' ?></span></p>
                    
<hr>

<?php
if (mysqli_num_rows($result1) > 0): ?>
    <p>Qualification</p>
    <table>
        <tr>
            <th class="tbody">Degree</th>
            <th class="tbody">Branch</th>
            <th class="tbody">University</th>
            <th class="tbody">Year</th>
        </tr>
        <?php while ($aca = mysqli_fetch_assoc($result1)): ?>
            <tr>
                <td class="tbody"><?= isset($aca['degree_name']) ? $aca['degree_name'] : 'Degree Not Available' ?></td>
                <td class="tbody"><?= isset($aca['branch']) ? $aca['branch'] : 'Branch Not Available' ?></td>
                <td class="tbody"><?= isset($aca['university_institution']) ? $aca['university_institution'] : 'University Not Available' ?></td>
                <td class="tbody"><?= isset($aca['year_of_passing']) ? $aca['year_of_passing'] : 'Year Not Available' ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

<br>
<?php endif; ?>



<?php
if (mysqli_num_rows($result) > 0): ?>
    <p>Ph.D. Details</p>
    <table>
        <tr>
            <th class="tbody">Title of Thesis</th>
            <th class="tbody">Area of Specialization</th>
            <th class="tbody">Research Supervisor</th>
            <th class="tbody">Research Centre</th>
            <th class="tbody">Year of Award</th>
        </tr>
        <?php while ($phd = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td class="tbody"><?= isset($phd['title_of_thesis']) ? $phd['title_of_thesis'] : 'title_of_thesis Not Available' ?></td>
                <td class="tbody"><?= isset($phd['area_of_specialization']) ? $phd['area_of_specialization'] : 'area_of_specialization Not Available' ?></td>
                <td class="tbody"><?= isset($phd['research_supervisor']) ? $phd['research_supervisor'] : 'research_supervisor Not Available' ?></td>
                <td class="tbody"><?= isset($phd['research_center']) ? $phd['research_center'] : 'research_center Not Available' ?></td>
                <td class="tbody"><?= isset($phd['month_year_reward']) ? $phd['month_year_reward'] : 'month_year_reward Not Available' ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

<br>
<?php endif; ?>


<?php
if (mysqli_num_rows($result3) > 0): ?>
    <p>Additional Qualification</p>
    <table>
        <tr>
            <th class="tbody">Name of course</th>
            <th class="tbody">Place of study</th>
            <th class="tbody">Date</th>
            <th class="tbody">Duration</th>
        </tr>
        <?php while ($cou = mysqli_fetch_assoc($result3)): ?>
            <tr>
                <td class="tbody"><?= isset($cou['course_name']) ? $cou['course_name'] : 'course_name Not Available' ?></td>
                <td class="tbody"><?= isset($cou['place_of_study']) ? $cou['place_of_study'] : 'place_of_study Not Available' ?></td>
                <td class="tbody"><?= isset($cou['month_and_year_of_completion']) ? $cou['month_and_year_of_completion'] : 'month_and_year_of_completion Not Available' ?></td>
                <td class="tbody"><?= isset($cou['duration']) ? $cou['duration'] : 'duration Not Available' ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

<br>
<?php endif; ?>

<?php
if (mysqli_num_rows($result4) > 0): ?>
    <p>Work Experience</p>
    <table>
        <tr>
            <th class="tbody">Name of institution</th>
            <th class="tbody">Address of institution</th>
            <th class="tbody">Designation</th>
            <th class="tbody">From</th>
            <th class="tbody">To</th>
        </tr>
        <?php while ($wrk = mysqli_fetch_assoc($result4)): ?>
            <tr>
                <td class="tbody"><?= isset($wrk['institution_name']) ? $wrk['institution_name'] : 'institution_name Not Available' ?></td>
                <td class="tbody"><?= isset($wrk['address_of_institution']) ? $wrk['address_of_institution'] : 'address_of_institution Not Available' ?></td>
                <td class="tbody"><?= isset($wrk['designation']) ? $wrk['designation'] : 'designation Not Available' ?></td>
                <td class="tbody"><?= isset($wrk['period_of_service_from']) ? $wrk['period_of_service_from'] : 'period_of_service_from Not Available' ?></td>
                <td class="tbody"><?= isset($wrk['period_of_service_to']) ? $wrk['period_of_service_to'] : 'period_of_service_to Not Available' ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>

<?php
if (mysqli_num_rows($result5) > 0): ?>
    <p>Teaching Experience</p>
    <table>
        <?php while ($tea = mysqli_fetch_assoc($result5)): ?>
            <tr>
                <td class="tbody"><label>U.G : </label><?= isset($tea['teaching_ug']) ? $tea['teaching_ug'] : 'teaching_ug Not Available' ?></td>
                <td class="tbody"><label>P.G : </label><?= isset($tea['teaching_pg']) ? $tea['teaching_pg'] : 'teaching_pg Not Available' ?></td>
                <td class="tbody"><label>M.Phil : </label><?= isset($tea['teaching_mphil']) ? $tea['teaching_mphil'] : 'teaching_mphil Not Available' ?></td>
                <td class="tbody"><label>Ph.D : </label><?= isset($tea['teaching_phd']) ? $tea['teaching_phd'] : 'teaching_phd Not Available' ?></td>
            </tr>
        <?php endwhile; ?>
    </table>


<br>
<?php endif; ?>


<?php
if (mysqli_num_rows($result6) > 0): ?>
 <p>Research Experience</p>
    <table>
        <?php while ($res = mysqli_fetch_assoc($result6)): ?>
            <tr>
                <td class="tbody"><label>U.G : </label><?= isset($res['research_ug']) ? $res['research_ug'] : 'research_ug Not Available' ?></td>
                <td class="tbody"><label>P.G : </label><?= isset($res['research_pg']) ? $res['research_pg'] : 'research_pg Not Available' ?></td>
                <td class="tbody"><label>M.Phil : </label><?= isset($res['research_mphil']) ? $res['research_mphil'] : 'research_mphil Not Available' ?></td>
                <td class="tbody"><label>Ph.D : </label><?= isset($res['research_phd']) ? $res['research_phd'] : 'research_phd Not Available' ?></td>
            </tr>
        <?php endwhile; ?>
    </table>


<br>
<?php endif; ?>

<?php
if (mysqli_num_rows($result7) > 0): ?>
<p>Field Experience</p>
    <table>
         <tr>
            <th class="tbody">Type</th>
            <th class="tbody">Name of the sector</th>
            <th class="tbody">Designation</th>
            <th class="tbody">From</th>
            <th class="tbody">To</th>
        </tr>
        <?php while ($fi = mysqli_fetch_assoc($result7)): ?>
            <tr>
                <td class="tbody"><?= isset($fi['field_industrial']) ? $fi['field_industrial'] : 'field_industrial Not Available' ?></td>
                <td class="tbody"><?= isset($fi['name_of_organisation']) ? $fi['name_of_organisation'] : 'name_of_organisation Not Available' ?></td>
                <td class="tbody"><?= isset($fi['desgination']) ? $fi['desgination'] : 'desgination Not Available' ?></td>
                <td class="tbody"><?= isset($fi['duration_From']) ? $fi['duration_From'] : 'duration_From Not Available' ?></td>
                <td class="tbody"><?= isset($fi['duration_to']) ? $fi['duration_to'] : 'duration_to Not Available' ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<br>
<?php endif; ?>


<p>Table of contents</p>
    <table>
         {
    
        <?php if ($resultCount->num_rows > 0): ?>
            <?php $rowCount = $resultCount->fetch_assoc()['totalRows'];?>
            <tr>
                <td class="tbody">1</td>
                <td class="tbody">Conferences / Workshops / Seminars Attended</td>
                <td class="tbody"><?= isset($rowCount) ?  $rowCount: 0 ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($resultCount1->num_rows > 0): ?>
            <?php $rowCount = $resultCount1->fetch_assoc()['totalRows'];?>
            <tr>
                <td class="tbody">2</td>
                <td class="tbody">Research Papers Presented</td>
                <td class="tbody"><?= isset($rowCount) ?  $rowCount: 0 ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($resultCount2->num_rows > 0): ?>
            <?php $rowCount = $resultCount2->fetch_assoc()['totalRows'];?>
            <tr>
                <td class="tbody">3</td>
                <td class="tbody">Publication in Journals</td>
                <td class="tbody"><?= isset($rowCount) ?  $rowCount: 0 ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($resultCount3->num_rows > 0): ?>
            <?php $rowCount = $resultCount3->fetch_assoc()['totalRows'];?>
            <tr>
                <td class="tbody">4</td>
                <td class="tbody">Publication in Books</td>
                <td class="tbody"><?= isset($rowCount) ?  $rowCount: 0 ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($resultCount4->num_rows > 0): ?>
            <?php $rowCount = $resultCount4->fetch_assoc()['totalRows'];?>
            <tr>
                <td class="tbody">5</td>
                <td class="tbody">Books Published / Edited</td>
                <td class="tbody"><?= isset($rowCount) ?  $rowCount: 0 ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($resultCount5->num_rows > 0): ?>
            <?php $rowCount = $resultCount5->fetch_assoc()['totalRows'];?>
            <tr>
                <td class="tbody">6</td>
                <td class="tbody">Conferences / Workshops / Seminars Organized</td>
                <td class="tbody"><?= isset($rowCount) ?  $rowCount: 0 ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($resultCount6->num_rows > 0): ?>
            <?php $rowCount = $resultCount6->fetch_assoc()['totalRows'];?>
            <tr>
                <td class="tbody">7</td>
                <td class="tbody">Research Projects</td>
                <td class="tbody"><?= isset($rowCount) ?  $rowCount: 0 ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($resultCount7->num_rows > 0): ?>
            <?php $rowCount = $resultCount7->fetch_assoc()['totalRows'];?>
            <tr>
                <td class="tbody">8</td>
                <td class="tbody">Resource Person</td>
                <td class="tbody"><?= isset($rowCount) ?  $rowCount: 0 ?></td>
            </tr>
        <?php endif; ?>
        <?php if ($resultCount8->num_rows > 0): ?>
            <?php $rowCount = $resultCount8->fetch_assoc()['totalRows'];?>
            <tr>
                <td class="tbody">9</td>
                <td class="tbody">Awards Recieved</td>
                <td class="tbody"><?= isset($rowCount) ?  $rowCount: 0 ?></td>
            </tr>
        <?php endif; ?>
    </table>

<br>



<?php
if (mysqli_num_rows($result8) > 0): ?>
<p>Conferences / Workshops / Seminars Attended</p>
<div class="box">
    <table>
            <?php
            $i = 1;
            while ($con = mysqli_fetch_assoc($result8)): ?>
            <tr>
                <td><?= $i++."."?>
                    <?= isset($con['level']) && $con['level'] !== null ? $con['level'].' level' : '' ?>
                    <?= isset($con['conf_workshop_type']) && $con['conf_workshop_type'] !== null ? $con['conf_workshop_type'].' on' : '' ?>
                    <?= isset($con['conf_workshop_name']) && $con['conf_workshop_name'] !== null ? '<span>"'.$con['conf_workshop_name'].'"</span>' : '' ?>
                    <?= isset($con['sponsored_by']) && $con['sponsored_by'] !== null ? " sponsored by " .$con['sponsored_by'] : '' ?>
                    <?= isset($con['organized_by']) && $con['organized_by'] !== null ? " organized by " .$con['organized_by'] : '' ?>
                    <?= isset($con['place']) && $con['place'] !== null ? " at " .$con['place'] : '' ?>
                    <?= isset($con['date_from']) && $con['date_from'] !== null ? " , during " .$con['date_from'] : '' ?>
                    <?= isset($con['date_to']) && $con['date_to'] !== null ? " to " .$con['date_to'] : '' ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
<br>
<?php endif; ?>

<?php
if (mysqli_num_rows($result9) > 0): ?>
<p>Research Papers Presented</p>
<div class="box">
    <table>
            <?php
            $i = 1;
            while ($pap = mysqli_fetch_assoc($result9)): ?>
            <tr>
                <td><?= $i++."."?>
                    <?= isset($pap['title_of_paper']) && $pap['title_of_paper'] !== null ? '<span>"'.$pap['title_of_paper'].'"</span>'.' in the ' : '' ?>
                    <?= isset($pap['conference_level']) && $pap['conference_level'] !== null ? $pap['conference_level'].' conference on ' : '' ?>
                    <?= isset($pap['name_of_conf']) && $pap['name_of_conf'] !== null ? $pap['name_of_conf'] : '' ?>
                    
                    <?= isset($pap['sponsored_by']) && $pap['sponsored_by'] !== null ? " sponsored by " .$pap['sponsored_by'].',' : '' ?>
                    <?= isset($pap['organized_by']) && $pap['organized_by'] !== null ? " organized by " .$pap['organized_by'] : '' ?>
                    <?= isset($pap['place']) && $pap['place'] !== null ? " at " .$pap['place'] : '' ?>
                    <?= isset($pap['date_from']) && $pap['date_from'] !== null ? " , during " .$pap['date_from'] : '' ?>
                    <?= isset($pap['date_to']) && $pap['date_to'] !== null ? " to " .$pap['date_to'] : '' ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
<br>
<?php endif; ?>


<?php
if (mysqli_num_rows($result10) > 0): ?>
    <p>Publication in Journals</p>
    <div class="box">
        <table>
            <?php
            $i = 1;
            while ($jou = mysqli_fetch_assoc($result10)): ?>
                <tr>
                    <td><?= $i++."."?>
                        <?= isset($jou['title_of_article']) && $jou['title_of_article'] !== null ? '<span>"'.$jou['title_of_article'].'"</span>'.' published in the ' : '' ?>
                        <?= isset($jou['level']) && $jou['level'] !== null ? $jou['level'].' journal of ' : '' ?>
                        <?= isset($jou['journal_name']) && $jou['journal_name'] !== null ? $jou['journal_name'] : '' ?>
                        <?= isset($jou['type']) && $jou['type'] !== null ? " (" .$jou['type'].')' : '' ?>
                        <?= isset($jou['volume']) && $jou['volume'] !== null ? " vol." .$jou['volume'].',' : '' ?>
                        <?= isset($jou['issue_no']) && $jou['issue_no'] !== null ? " issue No. " .$jou['issue_no'].',' : '' ?>
                        <?= isset($jou['date_of_publish']) && $jou['date_of_publish'] !== null ?  $jou['date_of_publish'] : '' ?>
                        <?= isset($jou['issn']) && $jou['issn'] !== null ? " ISSN " .$jou['issn'].'.' : '' ?>
                        <?= isset($jou['impact_factor']) && $jou['impact_factor'] !== "" ? " impact factor ". $jou['impact_factor'].',' : '' ?>
                        <?= isset($jou['scopus_index']) && $jou['scopus_index'] !== "" ? " Scopus index ". $jou['scopus_index'].',' : '' ?>
                        <?= isset($jou['h_index']) && $jou['h_index'] !== "" ? " h-index ". $jou['h_index'].',' : '' ?>
                        <?= isset($jou['citation_index']) && $jou['citation_index'] !== "" ? " citation index ". $jou['citation_index'] : '' ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <br>
<?php endif; ?>


<?php
if (mysqli_num_rows($result11) > 0): ?>
    <p>Publication in Books</p>
    <div class="box">
        <table>
            <?php
            $i = 1;
            while ($bok = mysqli_fetch_assoc($result11)): ?>
                <tr>
                    <td><?= $i++."."?>
                        <?= isset($bok['title_of_article']) && $bok['title_of_article'] !== null ? '<span>"'.$bok['title_of_article'].'"</span>'.'. ' : '' ?>
                        <?= isset($bok['book_name']) && $bok['book_name'] !== null ? $bok['book_name'].'.' : '' ?>
                        <?= isset($bok['place_of_publication']) && $bok['place_of_publication'] !== null ?  $bok['place_of_publication'].':' : '' ?>
                        <?= isset($bok['publishers_name']) && $bok['publishers_name'] !== null ?  $bok['publishers_name'].',' : '' ?>
                        <?= isset($bok['month_and_year']) && $bok['month_and_year'] !== null ?  $bok['month_and_year'] : '' ?>
                        <?= isset($bok['volume']) && $bok['volume'] !== "" ? " vol." .$bok['volume'].',' : '' ?>
                        <?= isset($bok['issue_no']) && $bok['issue_no'] !== "" ? " issue No. " .$bok['issue_no'].',' : '' ?>
                        <?= isset($bok['isbn']) && $bok['isbn'] !== "" ? " ISBN " .$bok['isbn'].'.' : '' ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <br>
<?php endif; ?> 

<?php
if (mysqli_num_rows($result12) > 0): ?>
    <p>Books Published / Edited</p>
    <div class="box">
        <table>
            <?php
            $i = 1;
            while ($pub = mysqli_fetch_assoc($result12)): ?>
                <tr>
                    <td><?= $i++."."?>
                        <?= isset($user['sname']) ? $user['sname'].'.' : 'Username Not Available' ?>
                        <?= isset($pub['title_of_book']) && $pub['title_of_book'] !== null ? '<span>"'.$pub['title_of_book'].'"</span>'.'. ' : '' ?>
                        <?= isset($pub['place_of_publication']) && $pub['place_of_publication'] !== null ?  $pub['place_of_publication'].':' : '' ?>
                        <?= isset($pub['published_name']) && $pub['published_name'] !== null ?  $pub['published_name'].',' : '' ?>
                        <?= isset($pub['month_and_year_of_publication']) && $pub['month_and_year_of_publication'] !== null ?  $pub['month_and_year_of_publication'] : '' ?>
                        <?= isset($pub['isbn']) && $pub['isbn'] !== "" ? " ISBN " .$pub['isbn'].'.' : '' ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <br>
<?php endif; ?> 

<?php
if (mysqli_num_rows($result13) > 0): ?>
<p>Conferences / Workshops / Seminars Organized</p>
<div class="box">
    <table>
            <?php
            $i = 1;
            while ($org = mysqli_fetch_assoc($result13)): ?>
            <tr>
                <td><?= $i++."."?>
                    <?= isset($org['level']) && $org['level'] !== null ? $org['level'].' level' : '' ?>
                    <?= isset($org['conf_workshop_seminar_type']) && $org['conf_workshop_seminar_type'] !== null ? $org['conf_workshop_seminar_type'].' Entitled ' : '' ?>
                    <?= isset($org['title']) && $org['title'] !== null ? '<span>"'.$org['title'].'"</span>' : '' ?>
                    <?= isset($org['place']) && $org['place'] !== null ? " at " .$org['place'] : '' ?>
                    <?= isset($org['sponsors_name']) && $org['sponsors_name'] !== "" ? " sponsored by " .$org['sponsors_name'] : '' ?>
                    <?= isset($org['date_from']) && $org['date_from'] !== null ? " , during " .$org['date_from'] : '' ?>
                    <?= isset($org['date_to']) && $org['date_to'] !== null ? " to " .$org['date_to'] : '' ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
<br>
<?php endif; ?> 

<?php
if (mysqli_num_rows($result14) > 0): ?>
<p>Research Projects</p>
<div class="box">
    <table>
            <?php
            $i = 1;
            while ($pro = mysqli_fetch_assoc($result14)): ?>
            <tr>
                <td><?= $i++."."?>
                    <?= isset($pro['project_type']) && $pro['project_type'] !== null ? $pro['project_type'].' Project Entitled ' : '' ?>
                    <?= isset($pro['title_of_project']) && $pro['title_of_project'] !== null ? '<span>"'.$pro['title_of_project'].'"</span>' : '' ?>
                    <?= isset($pro['sponsoring_agency']) && $pro['sponsoring_agency'] !== "" ? " sponsored by " .$pro['sponsoring_agency'] : '' ?>
                    <?= isset($pro['date_from']) && $pro['date_from'] !== null ? " , during " .$pro['date_from'] : '' ?>
                    <?= isset($pro['date_to']) && $pro['date_to'] !== null ? " to " .$pro['date_to'] : '' ?>
                    <?= isset($pro['status']) && $pro['status'] !== null ? " [ " .$pro['status'].' ] ' : '' ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
<br>
<?php endif; ?>

<?php
if (mysqli_num_rows($result16) > 0): ?>
<p>Awards Recieved</p>
    <table>
         <tr>
            <th class="tbody">Award Name</th>
            <th class="tbody">Presented By</th>
            <th class="tbody">Year</th>
            <th class="tbody">Level</th>
            <th class="tbody">Instituted by / Place</th>
            <th class="tbody">Amount</th>
        </tr>
        <?php while ($awa = mysqli_fetch_assoc($result16)): ?>
            <tr>
                <td class="tbody"><?= isset($awa['award_name']) ? $awa['award_name'] : 'award_name Not Available' ?></td>
                <td class="tbody"><?= isset($awa['presented_by']) ? $awa['presented_by'] : 'presented_by Not Available' ?></td>
                <td class="tbody"><?= isset($awa['month_and_year']) ? $awa['month_and_year'] : 'month_and_year Not Available' ?></td>
                <td class="tbody"><?= isset($awa['level']) ? $awa['level'] : 'level Not Available' ?></td>
                <td class="tbody"><?= isset($awa['instituted_by']) ? $awa['instituted_by'] : 'instituted_by Not Available' ?></td>
                <td class="tbody"><?= isset($awa['amount_received']) && $awa['amount_received'] !=="" ? $awa['amount_received'] : 'NIL' ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<br>
<?php endif; ?>


<?php
if (mysqli_num_rows($result15) > 0): ?>
<p>Resource Person</p>
<div class="box">
    <table>
            <?php
            $i = 1;
            while ($per = mysqli_fetch_assoc($result15)): ?>
            <tr>
                <td><?= $i++."."?>
                    <?= isset($per['level']) && $per['level'] !== null ? $per['level'].' level ' : '' ?>
                    <?= isset($per['type']) && $per['type'] !== "" ? $per['type'].' on ' : '' ?>
                    <?= isset($per['topic']) && $per['topic'] !== null ? '<span>"'.$per['topic'].'"</span>' : '' ?>
                    <?= isset($per['place']) && $per['place'] !== null ? " at " .$per['place'] : '' ?>
                    <?= isset($per['date_of_event']) && $per['date_of_event'] !== null ? " , " .$per['date_of_event'] : '' ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
<br>
<?php endif; ?>  
</body>
</html>
