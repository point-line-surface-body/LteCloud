<!DOCTYPE html>
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
            max-width: 800px;
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

<h3><font face="verdana" color="purple">LteCloud &middot; Automate All LTE LightRadio Soc Modem's Testing</font></h3><br>

<div class="tabbable">        <!--tabs-below-->
    <ul class="nav nav-tabs nav-justified"><!--alert-info-->
        <li>
            <a href="#">DashBoard</a>
        </li>
        <li>
            <a href="./index.php" rel="tooltips" title="Compile DspCode using CodeWarrior" data-content="CodWarrior 10.6.4">
	       DSP Code Compile
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
        <li class="active">
	    <a href="./l1sst.php" title="Upload dsp.elf.gz to Run L1 Sub-System Test">
	        <span style="color:red">L1 SST</span>
	    </a>
	</li>
        <li><a href="#">PreInt</a></li>
        <li><a href="#">MIT</a></li>
        <li><a href="http://135.251.156.152/preci/Build_Link_SOC_PreCI.php">FI Pre-CI</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Delivery<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="http://moss.alcatel-sbell.com.cn/sites/WSPD_LightRadio/Lists/SHA%20delivery%20Queue/AllItems.aspx">Delivery Queue</a></li>
                <li><a href="http://172.24.186.20/index.php/How_to_make_a_delivery_in_Shanghai_for_LigthRadio">How To Deliver</a></li>
                <li><a href="http://wcdma-deliveries.fr.alcatel-lucent.com:8080/.cdiform/forms/cdifsubmit/cdif_ident.php?product=LIGHTRADIO&subsystem=eNodeB&firstpass=1">Submit CDI Form</a></li>
                <li><a href="http://wcdma-deliveries.fr.alcatel-lucent.com:8080/.cdiform/forms/cdifrequest/cdif_select.php?f=a1a2a5a6a7b4&o=a50010app_lr,xx1010&s=&r=html&order=ASC&subsystem=eNodeB&product=LIGHTRADIO">app_lr</a></li>
            </ul>
        </li>
        <li><a href="http://135.251.224.94:9000/SocDspCodeDailyBuild/">DataCenter</a></li>
        <li><a href="http://135.251.157.152/wordpress/2014/03/07/whats-the-ltecloud/">About</a></li>
    </ul>
</div>

<div class="container" style="max-width: 900px;padding: 19px 29px 29px;">
    <!-- Run L1 Sub-System Test -->
    <form class="form-l1sst" action="launch_l1sst.php" method="post" enctype="multipart/form-data">
        <h2 class="page-header">Upload dsp.elf.gz to Run L1SST</h2>
        <fieldset>
            <!-- CSL -->
            <div class="control-group">
                <label class="input-group-addon span2" for="csl">CSL</label>
                <input id="csl" name="csl" type="text" class="input-xlarge span4" placeholder="Input Your CSL, eg. Jiang Lin A's CSL is lajiang">
            </div>

	    <!-- dsp.elf.gz uploaded -->
            <div class="control-group">
                <label class="input-group-addon span2" for="dsp_elf_gz">dsp.elf.gz</label>
                <input type="file" name="file" placeholder="Select Your dsp.elf.gz To Upload">
            </div>

            <!-- SDCAM Board-->
            <div class="control-group">
                <label class="input-group-addon span2" for="sdcam_board_ipaddr">Select SDCAM</label>
                <select id="sdcam_board_ipaddr" name="sdcam_board_ipaddr" class="span4">
                    <option value="LteCloud_L1SST">Auto Assign to Available SDCAM Board</option>
                    <option value="135.251.156.187">135.251.156.163</option>
                    <option value="135.251.156.188">135.251.156.164</option>
                </select>
            </div>

            <!-- ATT Version-->
            <div class="control-group">
                <label class="input-group-addon span2" for="att_version">Select ATT</label>
                <select id="att_version" name="att_version" class="span4">
                    <option value="att_726e_mim46.2step8_fg4_140830.1">att_726e_mim46.2step8_fg4_140830.1</option>
                    <option value="726c_mim462_e101">726c_MIM462_E101</option>
                    <option value="726b_MIM462">726b_MIM462</option>
                </select>
            </div>

            <!-- MTT Version-->
            <div class="control-group">
                <label class="input-group-addon span2" for="mtt_version">Select MTT</label>
                <select id="mtt_version" name="mtt_version" class="span4">
                    <option value="E13.5">E13.5</option>
                    <option value="E13.4">E13.4</option>
                    <option value="E13.3">E13.3</option>
                </select>
            </div>
            <div class="control-group">
                <label class="input-group-addon span2" for="sm_version">Select SystemModel</label>
                <select id="sm_version" name="sm_version" class="span5">
                    <option value="B_SYSMDL_DEV_LR01_140902.E2054.OLC.FG4_DL">B_SYSMDL_DEV_LR01_140902.E2054.OLC.FG4_DL</option>
                    <option value="B_SYSMDL_DEV_LR01_140902.E2054.OLC.FG4">B_SYSMDL_DEV_LR01_140902.E2054.OLC.FG4</option>
                    <option value="B_SYSMDL_DEV_LR01_140826.E2053.OLC">MIM46.2STEP8 - B_SYSMDL_DEV_LR01_140826.E2053.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140819.E2052.OLC">MIM46.2STEP8 - B_SYSMDL_DEV_LR01_140819.E2052.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140812.E2051.OLC">MIM46.2STEP8 - B_SYSMDL_DEV_LR01_140812.E2051.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140805.E2050.OLC">MIM46.2STEP8 - B_SYSMDL_DEV_LR01_140805.E2050.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140729.E2049.OLC">MIM46.2STEP8 - B_SYSMDL_DEV_LR01_140729.E2049.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140722.E2048.OLC">MIM46.2STEP8 - B_SYSMDL_DEV_LR01_140722.E2048.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140715.E2047.OLC">MIM46.2STEP2 - B_SYSMDL_DEV_LR01_140715.E2047.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140708.E2046.OLC">MIM46.2STEP2 - B_SYSMDL_DEV_LR01_140708.E2046.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140701.E2045.OLC">MIM46.2STEP2 - B_SYSMDL_DEV_LR01_140701.E2045.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140624.E2044.OLC">MIM46.2STEP2 - B_SYSMDL_DEV_LR01_140624.E2044.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140617.E2043.OLC">MIM46.2STEP2 - B_SYSMDL_DEV_LR01_140617.E2043.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140610.E2042.OLC">MIM46.1STEP2 - B_SYSMDL_DEV_LR01_140610.E2042.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140603.E2041.OLC">MIM46.1STEP2 - B_SYSMDL_DEV_LR01_140603.E2041.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140527.E2040.OLC">MIM46.1STEP2 - B_SYSMDL_DEV_LR01_140527.E2040.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140521.E2039.OLC">MIM46.1STEP2 - B_SYSMDL_DEV_LR01_140521.E2039.OLC</option>
                    <option value="B_SYSMDL_DEV_LR01_140513.E2038.OLC">MIM46.1STEP2 - B_SYSMDL_DEV_LR01_140513.E2038.OLC</option>
                </select>
            </div>


            <div class="control-group">
                <!--
                <label class="input-group-addon span2" for="l1sst_testcase_selected">L1 SubSystem TestCase</label>
                -->
                <label class="input-group-addon span2" for="l1sst_testcase_selected">Select L1SST TestCase</label>
                <select id="l1sst_testcase_selected" name="l1sst_testcase_selected" class="span5">
                    <!-- All TestCase -->
                    <option value=""></option>
                    <!--
                    <option value="ALL">ALL L1SST Sanity TestCases(25)</option>
                    -->
                    <option value="pdsch">PDSCH Sanity TestCases(8)</option>
                    <option value="pdcch">PDCCH Sanity TestCases(1)</option>
                    <option value="phich">PHICH Sanity TestCases(1)</option>
                    <option value="pusch">PUSCH Sanity TestCases(4)</option>
                    <option value="pucch">PUCCH Sanity TestCases(5)</option>
                    <option value="prach">PRACH Sanity TestCases(2)</option>
                    <option value="srs"  > SRS  Sanity TestCases(2)</option>
                    <option value="uci"  > UCI  Sanity TestCases(2)</option>

                    <!-- PDSCH 8TC-->
                    <option value=""></option>
                    <option value="pdsch_003_20m_17_2a">pdsch_003_20m_17_2a</option>
                    <option value="pdsch_003_20m_17_8a">pdsch_003_20m_17_8a</option>
                    <option value="pdsch_008_10m_17_2a">pdsch_008_10m_17_2a</option>
                    <option value="pdsch_016_10m_17_8a">pdsch_016_10m_17_8a</option>
                    <option value="pdsch_021_20m_29_2a">pdsch_021_20m_29_2a</option>
                    <option value="pdsch_206_20m_17_8a">pdsch_206_20m_17_8a</option>
                    <option value="pdsch_213_20m_27_8a">pdsch_213_20m_27_8a</option>
                    <option value="pdsch_703_20m_17_8a">pdsch_703_20m_17_8a</option>

                    <!-- PUSCH 4TC-->
                    <option value=""></option>
                    <option value="pusch_002_20m_17_2a">pusch_002_20m_17_2a</option>
                    <option value="pusch_006_20m_17_8a">pusch_006_20m_17_8a</option>
                    <option value="pusch_409_20m_17_8a">pusch_409_20m_17_8a</option>
                    <option value="pusch_412_20m_17_8a">pusch_412_20m_17_8a</option>

                    <!-- PUCCH 5TC-->
                    <option value=""></option>
                    <option value="pucch_001_20m_17_8a">pucch_001_20m_17_8a</option>
                    <option value="pucch_407_20m_17_2a">pucch_407_20m_17_2a</option>
                    <option value="pucch_407_20m_17_8a">pucch_407_20m_17_8a</option>
                    <option value="pucch_412_20m_25_8a">pucch_412_20m_25_8a</option>
                    <option value="pucch_412_20m_25_2a">pucch_412_20m_25_2a</option>

                    <!-- UCI 2TC-->
                    <option value=""></option>
                    <option value="uci_101_20m_17_8a">uci_101_20m_17_8a</option>
                    <option value="uci_416_20m_17_8a">uci_416_20m_17_8a</option>

                    <!-- SRS 2TC-->
                    <option value=""></option>
                    <option value="srs_001_20m_17_2a">srs_001_20m_17_2a</option>
                    <option value="srs_001_20m_17_8a">srs_001_20m_17_8a</option>

                    <!-- PRACH 2TC-->
                    <option value=""></option>
                    <option value="prach_201_20m_17_2A">prach_201_20m_17_2a</option>
                    <option value="prach_001_20m_17_8A">prach_001_20m_17_8a</option>

                    <!-- PHICH 1TC-->
                    <option value=""></option>
                    <option value="phich_001_20m_17_8a">phich_001_20m_17_8a</option>

                    <!-- PCFICH 1TC
                    <option value="pcfich_001_20m_17_8a">pcfich_001_20m_17_8a</option>
                    -->

                    <!-- PDCCH 1TC-->
                    <option value=""></option>
                    <option value="pdcch_002_20m_17_8a">pdcch_002_20m_17_8a</option>
                    <!-- ALL TCs-->
                    <option value=""></option>
                    <option value="ALL">ALL L1SST Sanity TestCases(25)</option>
                </select>
            </div>
            <div align="right">
                <button class="btn btn-lg btn-info " type="submit" >Submit</button>
            </div>

        </fieldset>
    </form> <!-- Run L1 Sub-System Test -->



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
