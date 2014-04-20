#!/bin/bash

JenkinsUrl='http://172.24.186.185'
Jenkins_User='senya'
Jenkins_Passwd='XX'

JobName=$1

#1.Create a job copied form "TP_ALL"
/usr/bin/curl --user ${Jenkins_User}:${Jenkins_Passwd} -s -o /dev/null --data "" "${JenkinsUrl}/createItem\?name=${JobName}&mode=copy&from=TP_ALL"

#2.Upload config.xml
/usr/bin/curl --user ${Jenkins_User}:${Jenkins_Passwd} -s -o /dev/null --data-binary @/tmp/config.xml  ${JenkinsUrl}/job/${JobName}/config.xml

#3.Disable/Enable Job
/usr/bin/curl --user ${Jenkins_User}:${Jenkins_Passwd} --data disable ${JenkinsUrl}/job/${JobName}/disable
/usr/bin/curl --user ${Jenkins_User}:${Jenkins_Passwd} --data enable  ${JenkinsUrl}/job/${JobName}/enable

#4.Trigger Job to be Launched
/usr/bin/curl --user ${Jenkins_User}:${Jenkins_Passwd} -s -o /dev/null "${JenkinsUrl}/job/${JobName}/build?delay=0sec" -F json='{"parameter":[{"name":"JobName", "value": "${JOB_NAME}" }]}'
