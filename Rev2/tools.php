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


<div class="tabbable">        <!--tabs-below-->
    <ul class="nav nav-tabs nav-justified"><!--alert-info-->
        <li>
            <a href="#">DashBoard</a>
        </li>
        <li>
            <a href="#" rel="tooltips" title="Compile DspCode using CodeWarrior" data-content="CodWarrior 10.6.4">DSP Code Compile</a>
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
                <li><a href="http://moss.alcatel-sbell.com.cn/sites/WSPD_LightRadio/Lists/SHA%20delivery%20Queue/AllItems.aspx">Delivery Queue</a></li>
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
        <li  class="active">
           <a href="./tools.php"><span style="color:red">Tools</span></a>
        </li>
        <li><a href="http://135.251.157.152/wordpress/2014/03/07/whats-the-ltecloud/">About</a></li>

    </ul>
</div>

<div class="container" style="max-width: 900px;padding: 19px 29px 29px;">
    <form class="form-ltecloud">
        <h2 class="page-header">SVN</h2>
        <fieldset>
            <div class="control-group">
                <label class="input-group-addon span2" for="linux_view">Account and URL</label>
                UserName:svn, Password:svn
                <li><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools">https://cv0023830v1.ad4.ad.alcatel.com/svn/tools</a></li>
            </div>
        </fieldset>

        <h2 class="page-header">Freescale CodeWarroir</h2>
        <fieldset>
            <div class="control-group">
                <label class="input-group-addon span2" for="linux_view">CW Install Packages</label>
                <li><a href="file://135.251.50.158/td-scdma/LTE-TDD-COMC-L1/DRV/Material/FSL/CW/">file://135.251.50.158/td-scdma/LTE-TDD-COMC-L1/DRV/Material/FSL/CW/</a></li>
            </div>
            <div class="control-group">
                <label class="input-group-addon span2" for="linux_view">CW10.2.5</label>
                <li><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/Freescale/10.2.5">CW10.2.5</a></li>
            </div>
            <div class="control-group">
                <label class="input-group-addon span2" for="linux_view">CW10.5.0</label>
                <li><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/Freescale/10.5.0">CW10.5.0</a></li>
            </div>
            <div class="control-group">
                <label class="input-group-addon span2" for="linux_view">CW10.6.3</label>
                <li><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/Freescale/10.6.3">CW10.6.3</a></li>
            </div>
            <div class="control-group">
                <label class="input-group-addon span2" for="linux_view">CW10.6.4</label>
                <li><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/Freescale/10.6.4">CW10.6.4</a></li>
            </div>
            <div class="control-group">
                <label class="input-group-addon span2" for="linux_view">CW10.6.5</label>
                <li><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/Freescale/10.6.5">CW10.6.5</a></li>
            </div>
            <div class="control-group">
                <label class="input-group-addon span2" for="linux_view">CW10.8.0</label>
                <li><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/Freescale/10.8.0">CW10.8.0</a></li>
            </div>
        </fieldset>


        <h2 class="page-header">TraceShiled</h2>
        <div class="control-group">
             <li><a href="https://wcdma-ll.app.alcatel-lucent.com/livelink/livelink.exe?func=ll&objId=67547983&objAction=browse&viewType=1">LiveLink: https://wcdma-ll.app.alcatel-lucent.com/livelink/livelink.exe?func=ll&objId=67547983&objAction=browse&viewType=1</a></li>
        </div>
        <table class="table table-bordered">
        <thead>
          <tr>
             <th>#</th>
             <th>Component</th>
             <th>Downlink</th>
          </tr>
        </thead>
        <tbody>
          <tr>
             <td rowspan="2">1</td>
             <td>TraceShield_Win32X64.zip</td>
             <td><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/TraceShield/TraceShield_Win32X64.zip">TraceShield_Win32X64.zip</a></td>
          </tr>
          <tr>
             <td>TraceShild User Manual</td>
             <td><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/TraceShield/TraceShield_User_Manual_4860_923.doc">TraceShield_User_Manual_4860_923.doc</a></td>
          </tr>
          <tr>
             <td>2</td>
             <td>dsp_tr_rtr</td>
             <td><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/TraceShield/dsp_tr_rtr">dsp_tr_rtr</a></td>
          </tr>
          <tr>
             <td>3</td>
             <td>DSP_Trace_Introduction.ppt</td>
             <td><a href="https://cv0023830v1.ad4.ad.alcatel.com/svn/tools/TraceShield/DSP_Trace_Introduction.ppt">DSP_Trace_Introduction.ppt</a></td>
          </tr>
        </tbody>
        </table>
        <br>

        <h2 class="page-header">L1SST</h2>
        <fieldset>
            <div class="control-group">
                <label class="input-group-addon span2">L1SST WiKi</label>
                <li><a href="http://172.24.186.20/index.php/LightRadio_SoC_delivery_history_for_L1_SST">http://172.24.186.20/index.php/LightRadio_SoC_delivery_history_for_L1_SST</a></li><br>
                <label class="input-group-addon span2">Sanity TestCase(SM Data)</label>
                <li><a href="http://135.251.224.94:9000/LteCloud/L1SST_SystemModel_DataCenter/">http://135.251.224.94:9000/LteCloud/L1SST_SystemModel_DataCenter/</a></li>
            </div>
        </fieldset>

        <h2 class="page-header">ATT</h2>
        <fieldset>
            <div class="control-group">
                <label class="input-group-addon span2">ATT</label>
                <li><a href="http://135.251.224.94:9000/LteCloud/ATT/">http://135.251.224.94:9000/LteCloud/ATT/</a></li>
                <br>
                <label class="input-group-addon span2">Tracking_table</label>
                <li><a href="http://172.24.186.20/index.php/ATT_delivery_history#ATT_Tracking_table">http://172.24.186.20/index.php/ATT_delivery_history#ATT_Tracking_table</a></li>
            </div>
        </fieldset>

        <h2 class="page-header">MTT</h2>
        <fieldset>
            <div class="control-group">
                <label class="input-group-addon span2">MTT</label>
                <li><a href="http://135.251.224.94:9000/LteCloud/MTT/">http://135.251.224.94:9000/LteCloud/MTT/</a></li>
                <br>
                <label class="input-group-addon span2">Tracking_table</label>
                <li><a href="http://172.24.186.20/index.php/ATT_delivery_history#MTT_Tracking_table">http://172.24.186.20/index.php/ATT_delivery_history#MTT_Tracking_table</a></li>
            </div>
        </fieldset>




    </form>
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
