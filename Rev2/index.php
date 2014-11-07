<!DOCTYPE html>
<!--
Title      : LteCloud Rev2 with Web Interface
             It aims to integrate Module/Unit Test, L1 Subsystem Test, Pre-Integration Test, Modem Integration Test, as well as SystemModel, Auto Deliver to One Web
             It also will monitor the Status of SHA and BUL stream Daily, the Status will includes Activity/ChangeSet/Various TestResults/Baselines/Delivery ... ...
             It will sends Email to all TeamMembers Automatically.
             It aims to be convenient to Modem Designers tobe more efficient both at Coding/Testing/Verification and preferable Continuous Delivery.

Author     : Yang Sen C 
CreatedDate:   2014-04-08

Note:
#2014-04-08 | Yang Sen C | Create the Init Version of index.php: the Layout of the LteCloud Rev2 Web Portal
#2014-05-23 | Yang Sen C | Add l1sst.php for L1 Sub-System Test
#2014-07-03 | Yang Sen C | Add trigger L1SST by upload dsp.elf.gz
-->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LteCloud &middot; LTE LightRadio Soc Modem </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LteCloud">
    <meta name="author" content="Yang Sen C, Sen.B.Yang@alcatel-sbell.com.cn">
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 60px;
            background-color: #f5f5f5;
        }
        .center {
            width : auto;
            display : table;
            margin-top:150px;
            margin-left: auto;
            margin-right: auto;
        }
        .form-ltecloud {
            max-width: 900px;
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
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">

    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
</head>

<body>

<!--
<h3><font face="verdana" color="purple">LteCloud &middot; Automate All LTE LightRadio Soc Modem's Testing</font></h3><br>
-->
<h3><font face="verdana" color="purple">LteCloud &middot; Speed Up Your Idea, Be Happy in Work</font></h3><br>

<div class="tabbable">        <!--tabs-below-->
    <ul class="nav nav-tabs nav-justified"><!--alert-info-->
        <li>
            <a href="#">DashBoard</a>
        </li>
        <li class="active">
            <a href="#" rel="tooltips" title="Compile DspCode using CodeWarrior" data-content="CodWarrior 10.6.4">
                <span style="color:red">DSP Code Compile</span>
            </a>
        </li>
        <li><a href="#">System Model</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Module/Unit Test
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="http://172.24.186.185/view/L1A/job/LR_L1_DL_MT_FG5_L1/">DownLink Module Test</a></li>
                <li class="divider"></li>
                <li><a href="http://172.24.186.185/view/L1A/job/LR_L1_PRACH_MT_FG4_L1A/">PRACH Module Test</a></li>
                <li class="divider"></li>
                <li><a href="http://172.24.186.185/view/L1A/job/LR_L1_PUC_MT_FG5_L1A/">PUCCH Module Test</a></li>
                <li class="divider"></li>
                <li><a href="http://172.24.186.185/view/dsp/job/LR_L1_MT_ClusterC/">PUSCH Module Test</a></li>
                <li class="divider"></li>
                <li><a href="http://172.24.186.185/view/dsp/job/LR_L1_UT_ClusterC/">PUSCH Unit Test</a></li>
            </ul>
        </li>
        <li><a href="./l1sst.php">L1 SST</a></li>
        <li><a href="#">PreInt</a></li>
        <li><a href="#">MIT</a></li>
        <li><a href="http://135.251.156.152/preci/Build_Link_SOC_PreCI.php">FI Pre-CI</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Delivery<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="https://acos.alcatel-lucent.com/wiki/g/l1-soc-clusterc/FG4%3AL1_misc Stream Delivery queue">Delivery Queue</a></li>
                <li><a href="http://172.24.186.20/index.php/How_to_make_a_delivery_in_Shanghai_for_LigthRadio">How To Deliver</a></li>
                <li><a href="http://wcdma-deliveries.fr.alcatel-lucent.com:8080/.cdiform/forms/cdifsubmit/cdif_ident.php?product=LIGHTRADIO&subsystem=eNodeB&firstpass=1">Submit CDI Form</a></li>
                <li><a href="http://wcdma-deliveries.fr.alcatel-lucent.com:8080/.cdiform/forms/cdifrequest/cdif_select.php?f=a1a2a5a6a7b4&o=a50010app_lr,xx1010&s=&r=html&order=ASC&subsystem=eNodeB&product=LIGHTRADIO">app_lr</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                DataCenter<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="http://135.251.224.94:9000/SocDspCodeDailyBuild/">SocDspCodeDailyBuild</a></li>
                <li class="divider"></li>
                <li><a href="http://135.251.224.94:9000/LteCloud/ClearCaseCode/">Unison_Sync</a></li>
            </ul>
        </li>
        <li><a href="./tools.php">Tools</a></li>
        <li><a href="http://135.251.157.152/wordpress/2014/03/07/whats-the-ltecloud/">About</a></li>
    </ul>
</div>

<div class="container" style="max-width: 1200px;padding: 19px 19px 19px;">
    <!-- Build DSPCode Using LteCloud  -->
    <form class="form-ltecloud" action="build.php" method="post">
        <h2 class="page-header">Build DSPCode Using LteCloud</h2>
        <fieldset>
            <!-- CSL -->
            <div class="control-group">
                <label class="input-group-addon span2" for="csl">CSL</label>
                <input id="csl" name="csl" type="text" class="input-xlarge span5" placeholder="Input Your CSL, eg. Liao Liangfeng and Yang Sen, CSLs is liliao-senya">
            </div>

            <!-- Linux View -->
            <div class="control-group">
                <label class="input-group-addon span2" for="linux_view">Linux View</label>
                <!--
                <input id="linux_view" name="linux_view" type="text" class="input-xlarge span5" placeholder="Input Your Linux View, eg. senya_fg5_l1_misc" data-provide="typeahead" data-items="4" data-source='[]'>
                -->
<?php
$view_list =  file_get_contents("/local/LteCloud/SHANGHAI.txt");
$view_list = str_replace("\n",'","',$view_list);
$view_list = '"'.$view_list.'"';
echo '<input id="linux_view" name="linux_view" type="text" class="input-xlarge span5" placeholder="Input Your Linux View, eg. senya_fg5_l1_misc" data-provide="typeahead" data-items="1399" data-source=\'['.$view_list.']\'>';
echo "<br>";
?>
            </div>



            <!-- Select ClearCaseView Site -->
            <!-- Color:http://www.computerhope.com/htmcolor.htm -->
            <!-- Color:http://www.w3schools.com/cssref/css_colornames.asp -->
            <div class="control-group">
                <label class="input-group-addon span2">Select ClearCase Site</label>
                <div class="controls">
                    <label class="radio inline">
                        <input type="radio" id="Site" name="Site" value="SHANGHAI" checked><font color="red" size=1><b>SHANGHAI</b></font>
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Site" name="Site" value="NANJING"><font color="green" size=1><b>NANJING</b></font>
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Site" name="Site" value="MURRAYHILL"><font color="blue" size=1><b>MURRAYHILL</b></font>
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Site" name="Site" value="NAPERVILLE"><font color=#8C7853 size=1><b>NAPERVILLE</b></font>
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Site" name="Site" value="Villarceaux"><font color="magenta" size=1><b>Villarceaux</b></font>
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Site" name="Site" value="LANNION"><font color="purple" size=1><b>LANNION</b></font>
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Site" name="Site" value="OTTAWA_disable"><font color="grey" size=1><b>OTTAWA</b></font>
                    </label>
                </div>
            </div>

            <!-- Select Project -->
            <div class="control-group">
                <label class="input-group-addon span2">Select Project</label>
                <div class="controls">
                    <label class="radio inline">
                        <input type="radio" id="Project" name="Project" value="BAE">BAE
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Project" name="Project" value="SoC" checked><font color="red">SoC</font>
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Project" name="Project" value="bCEM_TDD">bCEM_TDD
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Project" name="Project" value="bCEM_FDD">bCEM_FDD
                    </label>
                </div>
            </div>

            <!-- Select Build Type -->
            <div class="control-group">
                <label class="input-group-addon span2" for="build_type_selected">Select Build Type</label>
                <select id="build_type_selected" name="build_type_selected" class="span4">
                    <option value="B4860_Macro_SDCAM_Rev2">SoC - B4860_Macro_SDCAM_Rev2</option>
                    <option value="B4860_Macro_QDS_Rev2">SoC - B4860_Macro_QDS_Rev2</option>
                    <option value="B4860_Macro_BAE_Rev2">BAE - B4860_Macro_BAE_Rev2</option>
                    <option value="bCEM_release">bCEM_TDD - bCEM_release</option>
                    <option value="bCEM_release">bCEM_FDD - bCEM_release</option>
                </select>
            </div>

            <!-- Select CodeWarrior Version Tobe Used -->
            <div class="control-group">
                <label class="input-group-addon span2">Select CodeWarrior</label>
                <div class="controls">
                    <!--
                    <label class="radio inline">
                        <input type="radio" id="CodeWarrior" name="CodeWarrior" value="10.6.1">10.6.1
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="CodeWarrior" name="CodeWarrior" value="10.6.2_rev1">10.6.2 Rev1
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="CodeWarrior" name="CodeWarrior" value="10.6.3">10.6.3
                    </label>
                    -->
                    <label class="radio inline">
                        <input type="radio" id="CodeWarrior" name="CodeWarrior" value="10.2.5">10.2.5
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="CodeWarrior" name="CodeWarrior" value="10.5.0">10.5.0 ( bCEM TDD/FDD )
                    </label>
<!--
                    <label class="radio inline">
                        <input type="radio" id="CodeWarrior" name="CodeWarrior" value="10.6.4">10.6.4
                    </label>
-->
                    <label class="radio inline">
                        <input type="radio" id="CodeWarrior" name="CodeWarrior" value="10.6.5" checked>10.6.5 ( SoC )
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="CodeWarrior" name="CodeWarrior" value="10.8.0">10.8.0
                    </label>
                </div>
            </div>


            <!-- Select The Extracting Code Style -->
            <div class="control-group">
                <label class="input-group-addon span2">Select Extracting Mode</label>
                <div class="controls">

                    <label class="radio inline">
                        <input type="radio" id="Extracting_Mode" name="Extracting_Mode" value="full">Full Extracting From CC
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Extracting_Mode" name="Extracting_Mode" value="incremental" checked>Incremental Syncing Using Unison
                    </label>
                </div>
            </div>

            <!-- Select Building Machine Type -->
            <div class="control-group">
                <label class="input-group-addon span2">Select Compile Machine</label>
                <div class="controls">
                    <label class="radio inline">
                        <input type="radio" id="Machine_Type" name="Machine_Type" value="windows" checked>Windows
                    </label>
                    <label class="radio inline">
                        <input type="radio" id="Machine_Type" name="Machine_Type" value="linux">Linux(Only For SoC)
                    </label>
                </div>
            </div>


            <div align="right">
                <button class="btn btn-lg btn-info " type="submit" >Submit</button>
            </div>
            <div align="left">
               <font color="green" size=2>
               <br>
               View must be <b>Linux View</b>, and select the corresponding ClearCaseSite!<br>
               And, Please select the Right Project: <b>SoC</b> or <b>bCEM TDD/FDD</b><br>
               For SoC, CodeWarrior=><b>10.6.5</b>, BuildType=><b>B4860_Macro_SDCAM_Rev2</b><br>
               For bCEM,CodeWarrior=><b>10.5.0</b>, BuildType=><b>bCEM_release</b>, TDD/FDD is the same<br>
               </font>
            </div>

        </fieldset>
    </form> <!-- Build DSPCode Using LteCloud -->

</div> <!-- /container -->


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap-transition.js"></script>
<script src="../assets/js/bootstrap-alert.js"></script>
<script src="../assets/js/bootstrap-modal.js"></script>
<script src="../assets/js/bootstrap-dropdown.js"></script>
<script src="../assets/js/bootstrap-scrollspy.js"></script>
<script src="../assets/js/bootstrap-tab.js"></script>
<script src="../assets/js/bootstrap-tooltip.js"></script>
<script src="../assets/js/bootstrap-popover.js"></script>
<script src="../assets/js/bootstrap-button.js"></script>
<script src="../assets/js/bootstrap-collapse.js"></script>
<script src="../assets/js/bootstrap-carousel.js"></script>
<script src="../assets/js/bootstrap-typeahead.js"></script>

</body>
</html>
