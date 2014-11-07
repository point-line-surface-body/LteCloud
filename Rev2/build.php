<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=gb2312">
    <title>LteCloud &middot; Build Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LteCloud">
    <meta name="author" content="Yang Sen C, Sen.B.Yang@alcatel-sbell.com.cn">
    <link rel="shortcut icon" href="img/favicon.png">

    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 100px;
            padding-bottom: 60px;
            background-color: #f5f5f5;
            font-family:'verdana';
        }
        .form-ltecloud {
            max-width: 1200px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
    </style>
</head>


<body>
    <div class="container panel panel-success" style="max-width: 90%;padding: 19px 29px 29px;" >

            <?
            include_once("util.php");
            getRealIpAddr();
            $LteCloud_JenkinsUrl="http://172.24.186.185:8081";
            //$LteCloud_JenkinsUrl="http://135.251.244.94:8080";
            $CslString= trim($_POST["csl"]);
            $MailLists=findEmails($_POST["csl"]);
            $LinuxView= trim($_POST["linux_view"]);
            $Extracting_Mode = $_POST["Extracting_Mode"]; //"incremental"
            $ClearCaseViewSite=$_POST["Site"];
            $BuildType=$_POST["build_type_selected"];
            $CodeWarrior=$_POST["CodeWarrior"];
            $Project=$_POST['Project'];
            $MachineType=$_POST['Machine_Type'];
            // Generate JobName and JenkinsJoh Url
            $randomString=randomKey(5);
            $jobName=$LinuxView."_".@date("Y-m-d",time())."_".$randomString;
            if ( $Extracting_Mode == "incremental")
            {
                  $jobName=$LinuxView;
            }
            $jobLink=$LteCloud_JenkinsUrl."/job/".$jobName;

            //<!-- Form -->
            echo "<form class='form-ltecloud'>";
                //<!-- Default panel contents -->
                echo "<div class='panel-heading' align='center'><h2>Build Information</h2>";
                echo "</div>";


                //<!-- Table -->
                echo "<table class='table table-striped table-bordered' >";
                    echo "<thead><tr><th>Item</th><th>Value</th></tr></thead>"; //the Title Row
                    echo "<tbody>";
                        echo "<tr><td>"."CSL"        ."</td><td>". $CslString ."</td></tr>";
                        echo "<tr><td>"."Emails"    ."</td><td><font size='1 em'>". $MailLists . "</font></td></tr>";
                        echo "<tr><td>"."Linux View"."</td><td>". $LinuxView ."</td></tr>";
                        echo "<tr><td>"."Extracting_Mode"."</td><td>".$Extracting_Mode."</td></tr>";
                        echo "<tr><td>"."Site      "."</td><td>". $ClearCaseViewSite ."</td></tr>";
                        echo "<tr><td>"."Build Type"."</td><td>". $BuildType ."</td></tr>";
                        echo "<tr><td>"."Code Warrior"."</td><td>"."CW".$CodeWarrior."</td></tr>";
                        echo "<tr><td>"."Project"."</td><td>".$Project."</td></tr>";
                        echo "<tr><td>"."MachineType"."</td><td>".$MachineType."</td></tr>";
                        /*
                        if ($_POST["l1sst_runflag"] == "yes")
                        {
                            echo "<tr><td>L1SST TestCase</td>";
                            echo "<td>".$_POST["l1sst_testcase_selected"]."</td>";
                            echo "</tr>";
                        }
                        if ($_POST["preint_runflag"] == "yes")
                        {
                            echo "<tr><td>PreInt TestCase</td>";
                            echo "<td>".$_POST["preint_testcase_selected"]."</td>";
                            echo "</tr>";
                        }
                        */
                        echo "<tr><td>"."Job Link"."</td><td><a href=". $jobLink .">". $jobLink ."</a></td></tr>";
                    echo "</tbody>";
                echo "</table>";
                //<!-- Table -->
            echo "</form>";
            //<!-- Form -->

           //Write to MongoDB
           #system("python /local/LteCloud/LteCloud_MongoDB.py --site=$ClearCaseViewSite --view=$LinuxView --project=$Project --jenkinsjoburl=$jobLink --to_csls=$CslString --mails=$MailLists --randomstring=$randomString --warriorversion=$CodeWarrior --target=$BuildType");
            // Trigger JenkinsJob
            if ( $Extracting_Mode === "incremental")
            {
              //echo "bash /local/LteCloud/Util/trigger_jenkinsjob_unison.sh $LteCloud_JenkinsUrl $LinuxView $Project $ClearCaseViewSite $BuildType $CodeWarrior $CslString  $MailLists $randomString";echo "<br>";
              if ( $MachineType === "linux" and $Project === "SoC")
              {
                  system("bash /local/LteCloud/Util/trigger_jenkinsjob_unison_linux.sh $LteCloud_JenkinsUrl $LinuxView $Project $ClearCaseViewSite $BuildType $CodeWarrior $CslString  $MailLists $randomString");
              } else {
                  system("bash /local/LteCloud/Util/trigger_jenkinsjob_unison.sh $LteCloud_JenkinsUrl $LinuxView $Project $ClearCaseViewSite $BuildType $CodeWarrior $CslString  $MailLists $randomString");
              }
            } else {
            // trigger_jenkinsjob_bCEMTDD.sh
            if( $Project === "bCEM_TDD" ){
              system("bash /local/LteCloud/Util/trigger_jenkinsjob_bCEMTDD.sh $LteCloud_JenkinsUrl $jobName $LinuxView $ClearCaseViewSite $BuildType $CodeWarrior $CslString $MailLists $randomString");
            } elseif ($Project === "bCEM_FDD") {
              system("bash /local/LteCloud/Util/trigger_jenkinsjob_bCEMFDD.sh $LteCloud_JenkinsUrl $jobName $LinuxView $ClearCaseViewSite $BuildType $CodeWarrior $CslString $MailLists $randomString");
            } else {
            system("bash /local/LteCloud/Util/trigger_jenkinsjob.sh $LteCloud_JenkinsUrl $jobName $LinuxView $ClearCaseViewSite $BuildType $CodeWarrior $CslString $MailLists $randomString");
            }
            }
 
            
            //Send Email
            $subject = "[JobStart] ".$jobLink;
            $mailbodytext = "Hi, ".$CslString."<br><br>";
            $mailbodytext = $mailbodytext."<table class='table table-striped table-bordered'><thead><tr><th>Item</th><th>Value</th></tr></thead>"."<tbody>";
            $mailbodytext = $mailbodytext."<tr><td>CSL</td><td>".$CslString."</td></tr>";
            $mailbodytext = $mailbodytext."<tr><td>Linux View</td><td>".$LinuxView."</td></tr>";
            $mailbodytext = $mailbodytext."<tr><td>View  Site</td><td>".$ClearCaseViewSite."</td></tr>";
            $mailbodytext = $mailbodytext."<tr><td>Build Type</td><td>".$BuildType."</td></tr>";
            $mailbodytext = $mailbodytext."<tr><td>Code Warrior</td><td>"."CW".$CodeWarrior."</td></tr>";
            $mailbodytext = $mailbodytext."<tr><td>Project</td><td>".$Project."</td></tr>";
            $mailbodytext = $mailbodytext."<tr><td>Job Link</td><td><a href=". $jobLink .">". $jobLink ."</a></td></tr>";
            $mailbodytext = $mailbodytext."</tbody></table><br><br>";
            SendEmail($subject, $MailLists, $mailbodytext);

            ?>

    </div>
</body>
</html>
