#!/usr/bin/env python
# -*- coding: ISO-8859-1 -*-
# gb2312, utf-8
# Author: Yang Sen C
# Date  : 2013/07/05
# Usage : python SendEmail.py ${csl} ${email} ${SDCxmBld}


import os, sys, smtplib, base64, StringIO, string, time
import socket
from email.MIMEMultipart import MIMEMultipart
from email.MIMEBase import MIMEBase
from email.MIMEText import MIMEText
from email.header import Header
from email.mime.image import MIMEImage
from email.Utils import COMMASPACE, formatdate
from email import Encoders


def getIpAddres():
    #machineName = socket.getfqdn( socket.gethostname() )
    localIP = socket.gethostbyname( socket.gethostname() )
    return localIP


def send_mail(send_from, send_to, subject, text, files=[],
              server="135.251.50.68", user = None, password = None):
    #assert type(send_to) == list
    #assert type(files)   == list

    msg = MIMEMultipart('alternative')
    msg['From'] = send_from
    msg['To']   = COMMASPACE.join(send_to)
    msg['Date'] = formatdate(localtime=True)
    msg['Subject'] = Header( subject, charset='gb2312') # For Chinese Subject
    #msg['Subject'] = subject
    
    # Form HTML MAIL Body
    msg.attach( MIMEText(text, 'html') )

    # For Attachment
    for file in files:
    	part = MIMEBase('application','octet-stream')
    	part.set_payload( open(file, 'rb').read() )
    	Encoders.encode_base64(part)
    	part.add_header( 'Content-Disposition', 'attachment; filename="%s"' % os.path.basename(file) )
    	msg.attach(part)

    # Setting SMTP
    smtp = smtplib.SMTP(server, 25)
    if( user != None ):
    	smtp.ehlo()
    	smtp_userid64 = base64.encodestring(user)
    	smtp.docmd("auth", "login " + smtp_userid64[:-1])
    	if password != None:
    		smtp_pass64 = base64.encodestring( base64.b64decode(base64.b64decode(password)) ) 
    		smtp.docmd(smtp_pass64[:-1])
    
    # SendEmail
    smtp.sendmail(send_from, send_to, msg.as_string())
    # Close SMTP
    smtp.close()


if __name__ == "__main__":
    '''
	send_mail( send_from='nuaays@gmail.com',
		       send_to=['nuaays@gmail.com'],
		       subject=u'Testing',
		       text = u'This is an automatical email sended by LteCloud',
		       files=[r'D:\tmp_cw_SOC\xxx\B4860 Macro SDCAM\build-LTE_LR_SoC-B4860 Macro SDCAM\dsp.elf.gz'],
		       server="135.251.50.68",
		       user='senya',
		       password='...'
		       )
    '''

    # Information
    CSL      = sys.argv[1]
    receiver = ['LteCloud@dl.alcatel.com']
    receiver.append( sys.argv[2] )
    SDCxmBld = sys.argv[3]
    
    print "Receiver="+receiver
    
    # Setting
    sender   = 'nuaays@gmail.com'
    Xstring  = "PASSWORD"

    # Mail Server
    MailServer='135.251.50.68'

    # Job Link
    jobLink = "http://135.251.157.187:8080/job/" + CSL

    # Resource Link
    RestultFolderLink = "\\\\" + getIpAddres() + "\\tmp_cw_SOC\\" + SDCxmBld

    # Email Data
    MailSubject = '[LteCloud] ' + RestultFolderLink
    MailBody    = '''
                     <font face="arial">      
                     Hi, %s<br><br>
                     </font>
                     <font face="verdana" size="4" color="red">
                     The Generated Files Build by LteCluster is here: <a href="%s">%s</a>
                     </font>
                     <br>
                     <font face="verdana" size="2">                     
                     Please Copy them to your own Computer, Thanks.
                     </font>
                     <br>
                     <font face="verdana" size="2" color="blue">                      
                     Job OnLine: %s
                     </font>                     
                     <br><br><br><br>
                     <font face="verdana" size="3" color="green">
                     Best Regards
                     </font>
                     <br>
                     <font face="tahoma" size="1">                     
                     Any Problem/Requirement, Please send email to LteCloud@dl.alcatel.com
                     </font>                     
                ''' % (CSL, RestultFolderLink, RestultFolderLink, jobLink)
    MailAttach  = []

    # SendEmail
    send_mail(sender, receiver, MailSubject, MailBody, MailAttach, MailServer, 'senya', Xstring)
