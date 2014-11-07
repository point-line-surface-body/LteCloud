#!/bin/bash

MailBook="/local/LteCloud/MailBook.csv"
WGET="/usr/bin/wget -q"
CSL=$1
RadomTempFile="/dev/shm/"`cat /proc/sys/kernel/random/uuid | cut -b-5`".txt"

EmailAddr=`grep ^${CSL} ${MailBook} | head -1 | awk -F'=' '{print $NF}'`
if [ -n "$EmailAddr" ]
then
   echo ${EmailAddr}
else
   ${WGET} http://directory.app.alcatel-lucent.com/en/index.php\?list2%5B%5D=mail\&do=do_static_search\&csl=${CSL} -O ${RadomTempFile}
   EmailAddrQuery=`sed -n '/Email:/,+1p' ${RadomTempFile} | tail -1 | sed 's/^.*mailto://g' | sed 's/".*$//g'`
   if [ -n "$EmailAddrQuery" ]
   then
      echo $EmailAddrQuery
      echo "${CSL}=${EmailAddrQuery}" >> ${MailBook}
   else
      echo "NONE"
   fi
fi


#Method1
#email_Line=`sed -n '/Email/=' ${RadomTempFile}` #email_LineNum=`expr ${email_Line} + 1` #sed -n "${$email_LineNum}p"
#Method2

#Email:

#UPI:
#UPI=`sed -n '/UPI:/,+1p' ${RadomTempFile} | tail -1 | sed 's/^.*">//g' | sed 's/<.*$//g' `
#echo ${UPI}

#Business title:
#Title=`sed -n '/Business title:/,+1p' ${RadomTempFile} | tail -1 | sed 's/^.*">//g' | sed 's/<.*$//g' `
#echo ${Title}

#OnNET:
#OnNET=`sed -n '/OnNET:/,+2p' ${RadomTempFile} | tail -1`
#echo ${OnNET}
#Phone:
#Phone=`sed -n '/Phone:/,+2p' ${RadomTempFile} | tail -1 | sed 's/^.*">//g' | sed 's/<.*$//g' `
#echo ${Phone}


#Mobile:
#Mobile=`sed -n '/Mobile:/,+2p' ${RadomTempFile} | tail -1 | sed 's/^.*">//g' | sed 's/<.*$//g' `
#echo ${Mobile}

#Organization: 
#Organization=`sed -n '/Organization:/,+1p' ${RadomTempFile} | tail -1 | sed 's/^.*">//g' | sed 's/<.*$//g' `
#echo ${Organization}

#JobFamily:
#JobFamily=`sed -n '/Job family:/,+1p' ${RadomTempFile} | tail -1 | sed 's/^.*">//g' | sed 's/<.*$//g' `
#echo ${JobFamily}

#Administrator Approval:
#Manager=`sed -n '/Administrator Approval:/,+2p' ${RadomTempFile} | tail -1 | sed 's/^.*">//g' | sed 's/<.*$//g' `
#echo ${Manager}

rm -rf ${RadomTempFile}
