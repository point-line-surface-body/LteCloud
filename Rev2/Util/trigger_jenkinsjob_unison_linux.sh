#!/bin/bash
#
# Yang Sen C
# 2014-04-09
# bash /local/LteCloud/Util/trigger_jenkinsjob.sh $LteCloud_JenkinsUrl $jobName $LinuxView $BuildType $CodeWarrior $CslString $MailLists


#JenkinsServerUrl="http://172.24.186.185:8081"
JenkinsServerUrl=$1
JenkinsJobName=$2
LinuxView=$2
Project=$3
ClearCaseViewSite=$4
BuildType=$5
CodeWarrior=$6
CslString=$7
MailLists=$8
RadomString=$9

echo "JenkinsServerUrl=$JenkinsServerUrl";echo "<br>";
echo "JenkinsJobName=$JenkinsJobName";echo "<br>";
echo "LinuxView=$LinuxView";echo "<br>";
echo "Project=$Project";echo "<br>";
echo "View Site=$ClearCaseViewSite";echo "<br>";
echo "BuildType=$BuildType";echo "<br>";
echo "CodeWarrior=$CodeWarrior";echo "<br>";
echo "CslString=$CslString";echo "<br>";
echo "MailLists=$MailLists";echo "<br>";
echo "RadomString=$RadomString";echo "<br>";

#Config_Xml_Template
Config_Xml_Template="/local/LteCloud/Util/unison_linux.xml"
#Config_Customer
config_xml="/tmp/config_"`cat /proc/sys/kernel/random/uuid | cut -b-5`".xml"
echo "$config_xml";echo "<br>";
cp -f ${Config_Xml_Template} ${config_xml}

#Sed
sed -i "s/_VIEWNAME_/$LinuxView/g" ${config_xml}
sed -i "s/_SITE_/$ClearCaseViewSite/g" ${config_xml}
sed -i "s/_PROJECT_/$Project/g" ${config_xml}
sed -i "s/_RANDOMSTRING_/$RadomString/g" ${config_xml}
sed -i "s/_MAILS_/$MailLists/g" ${config_xml}
sed -i "s/_TARGET_/$BuildType/g" ${config_xml}
sed -i "s/_CSLS_/$CslString/g" ${config_xml}
sed -i "s/_CodeWarriorVersion_/$CodeWarrior/g" ${config_xml}

#sed -i "s///g" ${config_xml}
/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null --data "" "${JenkinsServerUrl}/createItem\?name=${JenkinsJobName}&mode=copy&from=CodeWarrior_Build_Test" 

/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null --data-binary @${config_xml} ${JenkinsServerUrl}/job/${JenkinsJobName}/config.xml
/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null --data disable "${JenkinsServerUrl}/job/${JenkinsJobName}/disable"
/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null --data enable "${JenkinsServerUrl}/job/${JenkinsJobName}/enable"
/usr/bin/curl --user ltecloud:ltecloud -s -o /dev/null "${JenkinsServerUrl}/job/${JenkinsJobName}/build?delay=0sec" -F json='{"parameter":[{"name":"JobName", "value": "${JOB_NAME}" }]}'

