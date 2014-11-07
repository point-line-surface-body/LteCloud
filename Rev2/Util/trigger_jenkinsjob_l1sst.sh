#!/bin/bash
#
# Yang Sen C
# 2014-08-19
# bash /local/LteCloud/Util/trigger_jenkinsjob_l1sst.sh $LteCloud_JenkinsUrl $CslString $MailLists $back_dsp_elf_gz $SDCAM_Board_IpAddr $ATT_Ver $MTT_Ver $SM_Ver $TestCase_Selected $jobName $randomString $jobLink

#JenkinsServerUrl="http://172.24.186.185:8081"
JenkinsServerUrl=$1
CslString=$2
MailLists=$3
Back_DSP_ELF_GZ=$4
SDCAM_Board_IpAddr=$5
ATT_Ver=$6
MTT_Ver=$7
SM_Ver=$8
TestCase_Selected=$9
JenkinsJobName=${10}
randomString=${11}

echo "JenkinsServerUrl=$JenkinsServerUrl";echo "<br>";
echo "CslString=$CslString";echo "<br>";
echo "MailLists=$MailLists";echo "<br>";
echo "Back_DSP_ELF_GZ=$Back_DSP_ELF_GZ";echo "<br>";
echo "SDCAM_Board_IpAddr=$SDCAM_Board_IpAddr";echo "<br>";
echo "ATT_Ver=$ATT_Ver";echo "<br>";
echo "MTT_Ver=$MTT_Ver";echo "<br>";
echo "SM_Ver=$SM_Ver";echo "<br>";
echo "TestCase_Selected=$TestCase_Selected";echo "<br>";
echo "jobName=$JenkinsJobName";echo "<br>";
echo "randomString=$randomString";echo "<br>";


#Config_Xml_Template
Config_Xml_Template="/local/LteCloud/Util/config_l1sst.xml"
#Config_Customer
config_xml="/tmp/config_"`cat /proc/sys/kernel/random/uuid | cut -b-5`".xml"
cp -f ${Config_Xml_Template} ${config_xml}

#Sed
sed -i "s/_EMAIL_/${MailLists}/g" ${config_xml}
sed -i "s/_TestCaseName_KeyWord_/$TestCase_Selected/g" ${config_xml}
sed -i "s/_Random_DSP_ELF_/${Back_DSP_ELF_GZ}/g" ${config_xml}
sed -i "s/_SM_/${SM_Ver}/g" ${config_xml}
sed -i "s/_ATT_Ver_/${ATT_Ver}/g" ${config_xml}
sed -i "s/_MTT_Ver_/${MTT_Ver}/g" ${config_xml}
#sed -i "s///g" ${config_xml}

/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null --data "" "${JenkinsServerUrl}/createItem\?name=${JenkinsJobName}&mode=copy&from=CodeWarrior_Build_Test" 
/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null --data-binary @${config_xml} ${JenkinsServerUrl}/job/${JenkinsJobName}/config.xml
/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null --data disable "${JenkinsServerUrl}/job/${JenkinsJobName}/disable"
/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null --data enable "${JenkinsServerUrl}/job/${JenkinsJobName}/enable"
/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null "${JenkinsServerUrl}/job/${JenkinsJobName}/build?delay=0sec" -F json='{"parameter":[{"name":"JobName", "value": "${JOB_NAME}" }]}'

