#!/usr/bin/env python
# -*- coding: utf-8 -*-
# Author: Yang Sen C
# Date  : 2014/09/15
# Usage : 


#http://www.cnblogs.com/northx2/archive/2012/01/05/2313226.html
#http://www.cnblogs.com/2010Freeze/archive/2012/06/25/2560863.html
#http://www.oschina.net/code/piece_full?code=6138

import os, sys, string, time, datetime, hashlib
import pymongo
import optparse
import json
import pprint



class LteCloud_MongoDB(object):
	def __init__(self, mongodb_host='135.251.224.97', mongodb_port=27017):
		self.conn   = pymongo.Connection(host=mongodb_host,port=mongodb_port)
		self.dbname = "ltecloud"
		self.db     = self.conn[self.dbname]
		self.collect= self.db.normal

	def show(self):
		recs = self.collect.find()
		for item in recs:
			print item
			#print item['Time_Used']
			#pprint.pprint(item)
		return recs

	def showByCsl(self, csls='senya'):
		recs = self.collect.find({"CSL":csls})
		for item in recs:
			print item
		return recs

	def showByDate(self, date='2014-09-15'):
		recs = self.collect.find({"Job_SubmitDate":date})
		for item in recs:
			print item
		return recs

	def showByViewname(self, view='senya_fg5_l1a_l1_misc'):
		recs = self.collect.find({"Viewname":view})
		for item in recs:
			print item
		return recs

	def showBySite(self, site='SHANGHAI'):
		recs = self.collect.find({"ClearCaseSite":site})
		for item in recs:
			print item
		return recs

	def showByProject(self, prj='SoC'):
		recs = self.collect.find({"Project":prj})
		for item in recs:
			print item
		return recs

	def showByCompilingNode(self, nodeip='135.251.224.96'):
		recs = self.collect.find({"BuildMachineIP":nodeip})
		for item in recs:
			print item
		return recs

	def showByJobStatus(self, status='Success'):
		recs = self.collect.find({"Job_Status":status})
		for item in recs:
			print item
		return recs


	def init(self, viewname, csls, randomstring):
		self.viewname = viewname
		self.csls     = csls
		self.randomstr= randomstring
		self.rec_finded = self.collect.find_one({"Viewname": self.viewname, "CSL":self.csls, "Job_RandomStr":self.randomstr})
		if self.rec_finded == None:
			print "[MongDB ERROR] Cannot Find One Record Of View:%s,CSL:%s,RandomStr:%s" % (self.viewname, self.csls, self.randomstr)
		else:
			self.rec_finded_id = self.rec_finded["_id"]
			print "[MongDB INFO ] MongoDB Record Of View:%s,CSL:%s,RandomStr:%s" % (self.viewname, self.csls, self.randomstr)
			print "[MongDB INFO ] MongoDB Record ID: %s" % self.rec_finded_id

	def insert(self, data):
		#assert( type(data) == "<type 'dict'>")
		print "[MongDB Operation ] MongoDB Insert Operation\n"
		self.collect.insert(post_data)
		pprint.pprint(item)

	def update(self, tag="Time_ToRun", value=""):
		print "[MongDB Operation ] MongoDB Update Operation: %s=%s" % (tag,value)
		self.rec_finded[tag] = value
		self.collect.update( {"_id":self.rec_finded_id}, self.rec_finded )

	def computeUsedTime(self):
		submittime = time.mktime(time.strptime(self.rec_finded["Time_Submit"],'%Y-%m-%d %H:%M:%S'))
		startime   = time.mktime(time.strptime(self.rec_finded["Time_ToRun"],'%Y-%m-%d %H:%M:%S'))
		end_time   = time.mktime(time.strptime(self.rec_finded["Time_End"]  ,'%Y-%m-%d %H:%M:%S'))

		pendingtime = startime - submittime
		self.update("Time_Pending",pendingtime)
		usedtime    = end_time - startime
		self.update("Time_Used",usedtime)

		print "[MongDB InFO ] MongoDB Time_Pending: %d" % pendingtime
		print "[MongDB InFO ] MongoDB Time_Used   : %d" % usedtime


	def test(self):
		post_data = {
		     "CSL"    : "senya",
             "Emails"         : "Sen.B.Yang@alcatel-sbell.com.cn",   
             "Viewname"       : "yancl_enb_lr143_integration_Server",
             "Extracting_Mode": "incremental",
             "ClearCaseSite"  : "SHANGHAI",   
             "CodeWarriorVer" : "10.6.5",
             "Project"        : "SoC",
             "Job_Link"       : "http://172.24.186.185:8081/job/yancl_enb_lr143_integration_Server",
             "Job_Status"     : "Submitted", # Submitted, Pedding, Running, Successful, Failed
             "Job_SubmitDate" : time.strftime("%Y-%m-%d",time.localtime()),
             "Time_Submit"    : time.strftime("%Y-%m-%d %H:%M:%S",time.localtime()), #datetime.datetime.utcnow(),
             "Time_End"       : "",
             "Time_ToRun"     : ""
            }
		print type(post_data)
		print self.db.collection_names()
		print time.strftime("%Y-%m-%d %H:%M:%S",time.localtime())
		#self.collect.insert(post_data)

	def test_query(self):
		self.show()
		print "-----"
		self.showByCsl(csls='senya')
		print "-----"
		self.showByCompilingNode('135.251.157.77')
		print "-----"
		self.showByProject('bCEM_TDD')
		print "-----"
		self.showBySite('SHANGHAI')
		print "-----"
		self.showByDate('2014-09-15')
		print "-----"
		self.showByJobStatus('Failed')


	def __exit__(self):
		self.conn = None


if __name__ == '__main__':
	# Optparse
	startTimeStamp = time.time()
	option_parser = optparse.OptionParser()
	option_parser.add_option('-s','--site'           ,  dest="clearcase_site"  , default=False, help="")
	option_parser.add_option('-v','--view'           ,  dest="viewname"        , default=False, help="")
	option_parser.add_option('-p','--project'        ,  dest="project"         , default=False, help="")
	option_parser.add_option('-j','--jenkinsjoburl'  ,  dest="jenkinsjoburl"   , default=False, help="")
	option_parser.add_option('-t','--to_csls'        ,  dest="csls"            , default=False, help="")
	option_parser.add_option('-m','--mails'          ,  dest="emails"          , default='', help="")
	option_parser.add_option('-r','--randomstring'   ,  dest="randomstring"    , default=False, help="")
	option_parser.add_option('-w','--warriorversion' ,  dest="codewarrior_ver" , default=False, help="")
	option_parser.add_option('-T','--target'         ,  dest="target_build"    , default=False, help="")
	options, args = option_parser.parse_args()


	post_data = {
             "CSL"            : options.csls,
             "Emails"         : options.emails.split("="),   
             "Viewname"       : options.viewname,
             "Extracting_Mode": "incremental",
             "ClearCaseSite"  : options.clearcase_site,   
             "CodeWarriorVer" : options.codewarrior_ver,
             "Build_Target"   : options.target_build,
             "Project"        : options.project,
             "Job_Link"       : options.jenkinsjoburl,
             "Job_RandomStr"  : options.randomstring,
             "Job_Status"     : "Submitted",  # Submitted, Pedding, Running, Successful, Failed
             "Job_SubmitDate" : time.strftime("%Y-%m-%d",time.localtime()),
             "Time_Submit"    : time.strftime("%Y-%m-%d %H:%M:%S",time.localtime()), #datetime.datetime.utcnow(),
             "Time_End"       : "",
             "Time_ToRun"     : "",
             "Time_Pending"   : "",
             "Time_Used"      : "",
             "BuildMachineIP" : ""
             }

	t = LteCloud_MongoDB()
	t.insert(post_data)
	#t.test_query()


	#find_rec = t.collect.find_one({"Job_RandomStr":"vswtr1"})
	#print find_rec
	#print "------"
	#print find_rec["_id"]
	#print find_rec["Time_ToRun"]
	#find_rec["Time_End"] = time.strftime("%Y-%m-%d %H:%M:%S",time.localtime())
	#print find_rec["Time_ToRun"]
	#t.collect.update( {"_id":find_rec["_id"]}, find_rec )
	#print t.collect.find_one({"Job_RandomStr":"vswtr", "CSL":"senya"})
	#print time.time()
	#print time.strftime("%Y-%m-%d %H:%M:%S",time.localtime())
	#print time.mktime(time.strptime(time.strftime("%Y-%m-%d %H:%M:%S",time.localtime()),'%Y-%m-%d %H:%M:%S'))

	#t.collect.remove({'id':'5416fb88f0650730018fbbf5'})
	#find_rec = t.collect.find_one({"Job_Status":"Success"})
	#print find_rec["_id"]
	#t.collect.remove({'_id':find_rec["_id"]})
	#print "-----"
	#t.show()
