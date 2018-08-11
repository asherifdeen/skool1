DROP TABLE assessment;

CREATE TABLE `assessment` (
  `studentid` varchar(15) NOT NULL default '',
  `class` varchar(50) default NULL,
  `term` varchar(50) NOT NULL default '',
  `academicyear` varchar(50) NOT NULL default '',
  `subject` varchar(20) NOT NULL default '',
  `category` varchar(15) default NULL,
  `score` int(3) default NULL,
  PRIMARY KEY  (`studentid`,`term`,`academicyear`,`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO assessment VALUES("0020163602","JHS 1","First Term","2016/2017","English Language","JHS","78");
INSERT INTO assessment VALUES("0020163602","JHS 1","First Term","2016/2017","Integrated Science","JHS","50");
INSERT INTO assessment VALUES("0020163602","JHS 1","First Term","2016/2017","Mathematics","JHS","87");
INSERT INTO assessment VALUES("0020168298","JHS 1","First Term","2016/2017","English Language","JHS","85");
INSERT INTO assessment VALUES("0020168298","JHS 1","First Term","2016/2017","Integrated Science","JHS","63");
INSERT INTO assessment VALUES("0020168298","JHS 1","First Term","2016/2017","Mathematics","JHS","78");



DROP TABLE assessmentaverage;

CREATE TABLE `assessmentaverage` (
  `studentid` varchar(15) default NULL,
  `subject` varchar(30) default NULL,
  `averagescore` int(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE bills;

CREATE TABLE `bills` (
  `billid` int(10) NOT NULL auto_increment,
  `studentid` varchar(10) default NULL,
  `studentname` varchar(50) default NULL,
  `academicyear` varchar(10) default NULL,
  `term` varchar(15) default NULL,
  `feedescription` varchar(20) default NULL,
  `feeamount` varchar(15) default NULL,
  PRIMARY KEY  (`billid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE checker;

CREATE TABLE `checker` (
  `expire_date` varchar(20) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO checker VALUES("1489674009");



DROP TABLE classaverage;

CREATE TABLE `classaverage` (
  `studentid` varchar(15) default NULL,
  `averagescore` int(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO classaverage VALUES("0020163602","82");
INSERT INTO classaverage VALUES("0020168298","78");



DROP TABLE classes;

CREATE TABLE `classes` (
  `classid` int(2) NOT NULL auto_increment,
  `classname` varchar(5) default NULL,
  PRIMARY KEY  (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO classes VALUES("1","JHS 1");
INSERT INTO classes VALUES("2","JHS 2");
INSERT INTO classes VALUES("3","P1");
INSERT INTO classes VALUES("4","P2");
INSERT INTO classes VALUES("5","P5");
INSERT INTO classes VALUES("6","P6");



DROP TABLE classposition;

CREATE TABLE `classposition` (
  `studentid` varchar(15) default NULL,
  `position` varchar(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO classposition VALUES("0020163602","1st");
INSERT INTO classposition VALUES("0020168298","2nd");



DROP TABLE exams;

CREATE TABLE `exams` (
  `studentid` varchar(15) NOT NULL default '',
  `class` varchar(50) default NULL,
  `term` varchar(50) NOT NULL default '',
  `academicyear` varchar(50) NOT NULL default '',
  `subject` varchar(20) NOT NULL default '',
  `category` varchar(15) default NULL,
  `score` int(3) default NULL,
  PRIMARY KEY  (`studentid`,`term`,`academicyear`,`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO exams VALUES("0020163602","JHS 1","First Term","2016/2017","English Language","JHS","96");
INSERT INTO exams VALUES("0020163602","JHS 1","First Term","2016/2017","Integrated Science","JHS","75");
INSERT INTO exams VALUES("0020163602","JHS 1","First Term","2016/2017","Mathematics","JHS","96");
INSERT INTO exams VALUES("0020168298","JHS 1","First Term","2016/2017","English Language","JHS","85");
INSERT INTO exams VALUES("0020168298","JHS 1","First Term","2016/2017","Integrated Science","JHS","68");
INSERT INTO exams VALUES("0020168298","JHS 1","First Term","2016/2017","Mathematics","JHS","85");



DROP TABLE fees;

CREATE TABLE `fees` (
  `feeid` int(2) NOT NULL auto_increment,
  `feedescription` varchar(20) default NULL,
  `feeamount` varchar(5) default NULL,
  `feeduration` varchar(10) default NULL,
  PRIMARY KEY  (`feeid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO fees VALUES("1","School Fees","230.6","Termly");



DROP TABLE generalscore;

CREATE TABLE `generalscore` (
  `studentid` varchar(15) default NULL,
  `class` varchar(15) default NULL,
  `term` varchar(12) default NULL,
  `academicyear` varchar(15) default NULL,
  `subject` varchar(50) default NULL,
  `category` varchar(15) default NULL,
  `totalscore` int(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO generalscore VALUES("0020163602","JHS 1","First Term","2016/2017","English Language","JHS","89");
INSERT INTO generalscore VALUES("0020163602","JHS 1","First Term","2016/2017","Integrated Science","JHS","65");
INSERT INTO generalscore VALUES("0020163602","JHS 1","First Term","2016/2017","Mathematics","JHS","92");
INSERT INTO generalscore VALUES("0020168298","JHS 1","First Term","2016/2017","English Language","JHS","85");
INSERT INTO generalscore VALUES("0020168298","JHS 1","First Term","2016/2017","Integrated Science","JHS","66");
INSERT INTO generalscore VALUES("0020168298","JHS 1","First Term","2016/2017","Mathematics","JHS","82");



DROP TABLE graduate;

CREATE TABLE `graduate` (
  `studentid` varchar(15) NOT NULL default '',
  `surname` varchar(30) default NULL,
  `studentname` varchar(30) default NULL,
  `birthdate` varchar(10) default NULL,
  `gender` varchar(10) default NULL,
  `birthplace` varchar(30) default NULL,
  `religion` varchar(10) default NULL,
  `languagespoken` varchar(30) default NULL,
  `admissiondate` varchar(20) default NULL,
  `percularhabit` varchar(20) default NULL,
  `class` varchar(5) default NULL,
  `residentialaddress` varchar(50) default NULL,
  `previousschool` varchar(50) default NULL,
  `reason` varchar(50) default NULL,
  `guardianname` varchar(50) default NULL,
  `guardiancontact` varchar(25) default NULL,
  `guardianwork` varchar(50) default NULL,
  `guardianaddress` varchar(50) default NULL,
  `scholarship` varchar(5) default NULL,
  `batch` varchar(10) default NULL,
  `passport` varchar(50) default NULL,
  PRIMARY KEY  (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE payment;

CREATE TABLE `payment` (
  `studentid` varchar(10) default NULL,
  `recieptnumber` varchar(20) default NULL,
  `class` varchar(10) default NULL,
  `term` varchar(15) default NULL,
  `description` varchar(20) default NULL,
  `feeamount` varchar(4) default NULL,
  `paymentdate` varchar(15) default NULL,
  `balance` varchar(4) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE position;

CREATE TABLE `position` (
  `studentid` varchar(15) default NULL,
  `subject` varchar(50) default NULL,
  `position` varchar(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE register;

CREATE TABLE `register` (
  `studentid` varchar(15) NOT NULL default '',
  `surname` varchar(30) default NULL,
  `studentname` varchar(30) default NULL,
  `birthdate` varchar(10) default NULL,
  `gender` varchar(10) default NULL,
  `birthplace` varchar(30) default NULL,
  `religion` varchar(10) default NULL,
  `languagespoken` varchar(30) default NULL,
  `admissiondate` varchar(20) default NULL,
  `percularhabit` varchar(20) default NULL,
  `class` varchar(5) default NULL,
  `residentialaddress` varchar(50) default NULL,
  `previousschool` varchar(50) default NULL,
  `reason` varchar(50) default NULL,
  `guardianname` varchar(50) default NULL,
  `guardiancontact` varchar(25) default NULL,
  `guardianwork` varchar(50) default NULL,
  `guardianaddress` varchar(50) default NULL,
  `scholarship` varchar(5) default NULL,
  `batch` varchar(10) default NULL,
  `passport` varchar(50) default NULL,
  PRIMARY KEY  (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO register VALUES("0020160752","Eric","African","10/03/2016","Female","Tamale","Christain","English","21-Oct-2016","Nil","P1","Sognaayili Blk 546B Teacher House","Nil","Nil","Dery Micheal Dabuo","0202411201","Dangote Cement Company Limited","Box 45 TL Tamale.","No","2016/2017","passports/0020160752.JPG");
INSERT INTO register VALUES("0020163602","Tayil","Sarah","11/15/2016","Female","Tamale","Christain","English","05-Nov-2016","Nil","JHS 1","Sognaayili Techers House","Nil","Nil","Isaac Tayil","0202469710","GN Bank Tamale","GN Bank Tamale, \nBox 456","No","2016/2017","passports/0020163602.jpg");
INSERT INTO register VALUES("0020164087","Alhassan","Karima","10/13/2016","Female","Tamale","Muslim","English","21-Oct-2016","Nil","P5","Vitting Ext","Nil","Nil","Ibrahim seidu","0202469710","Wa Municapal Assembly","Box 56 Upper West Region","No","2016/2017","passports/0020164087.jpg");
INSERT INTO register VALUES("0020168298","Franklin","Sampson","10/24/2016","Male","Nandom","Christain","English/Wale","21-Oct-2016","Nil","JHS 1","Nil","Nil","Nil","Dongle Banabars","0202469752","GN Bank Tamale","Box 847 Tamale","No","2016/2017","passports/0020168298.JPG");



DROP TABLE school;

CREATE TABLE `school` (
  `schoolcode` varchar(5) default NULL,
  `schoolname` varchar(150) default NULL,
  `address` varchar(150) default NULL,
  `location` varchar(20) default NULL,
  `logo` varchar(20) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO school VALUES("4001","IDDRISIYAT ISLAMIC INTERNATIONAL","P. O BOX 4521 WA UPPER WEST REGION","WA ZONGO","passports/4001.jpg");



DROP TABLE staff;

CREATE TABLE `staff` (
  `staffid` varchar(7) NOT NULL default '',
  `lastname` varchar(50) default NULL,
  `firstname` varchar(50) default NULL,
  `initial` varchar(5) default NULL,
  `contact` varchar(25) default NULL,
  `system` varchar(30) default NULL,
  `username` varchar(40) default NULL,
  `password` varchar(40) default NULL,
  PRIMARY KEY  (`staffid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO staff VALUES("201607","Tayil","Sarah","TS","0544150436","staff","tayil","password");
INSERT INTO staff VALUES("201612","Ibrahim","Hamdan","","0202469710","administrator","system","password");
INSERT INTO staff VALUES("201653","Ibrahim","Knuhu Bigiguo","IKB","0202469710","staff","ibrahim","password");
INSERT INTO staff VALUES("201685","Johnson","Lawrance","JL","0245698745","staff","johnson","password");



DROP TABLE studentaccount;

CREATE TABLE `studentaccount` (
  `studentid` varchar(10) default NULL,
  `studentname` varchar(50) default NULL,
  `debt` varchar(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO studentaccount VALUES("0020160752","Eric African","0");
INSERT INTO studentaccount VALUES("0020164087","Alhassan Karima","0");
INSERT INTO studentaccount VALUES("0020168298","Franklin Sampson","0");
INSERT INTO studentaccount VALUES("0020163602","Tayil Sarah","0");



DROP TABLE subjectassign;

CREATE TABLE `subjectassign` (
  `assignedid` varchar(5) default NULL,
  `staffid` varchar(15) NOT NULL default '',
  `subject` varchar(50) NOT NULL default '',
  `category` varchar(15) default NULL,
  `class` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`staffid`,`subject`,`class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO subjectassign VALUES("0576","201607","English Language","JHS","JHS 1");
INSERT INTO subjectassign VALUES("7069","201653","All Subjects","Primary","P1");
INSERT INTO subjectassign VALUES("9921","201685","Mathematics","JHS","JHS 1");



DROP TABLE subjectposition;

CREATE TABLE `subjectposition` (
  `studentid` varchar(15) default NULL,
  `subject` varchar(50) default NULL,
  `position` varchar(5) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO subjectposition VALUES("0020163602","English Language","1st");
INSERT INTO subjectposition VALUES("0020168298","English Language","2nd");
INSERT INTO subjectposition VALUES("0020168298","Integrated Science","1st");
INSERT INTO subjectposition VALUES("0020163602","Integrated Science","2nd");
INSERT INTO subjectposition VALUES("0020163602","Mathematics","1st");
INSERT INTO subjectposition VALUES("0020168298","Mathematics","2nd");



DROP TABLE subjects;

CREATE TABLE `subjects` (
  `subjectid` int(2) NOT NULL auto_increment,
  `subjecttitle` varchar(50) default NULL,
  `level` varchar(10) default NULL,
  PRIMARY KEY  (`subjectid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO subjects VALUES("1","English Language","JHS");
INSERT INTO subjects VALUES("2","Mathematics","JHS");
INSERT INTO subjects VALUES("3","Social Studies","JHS");
INSERT INTO subjects VALUES("4","Integrated Science","JHS");
INSERT INTO subjects VALUES("5","BDT","JHS");
INSERT INTO subjects VALUES("6","RME","JHS");
INSERT INTO subjects VALUES("7","ICT","JHS");
INSERT INTO subjects VALUES("8","Ghanaian Language","JHS");
INSERT INTO subjects VALUES("9","English Language","Primary");
INSERT INTO subjects VALUES("10","Mathematics","Primary");
INSERT INTO subjects VALUES("11","Natural Science","Primary");
INSERT INTO subjects VALUES("12","Citizenship Edu.","Primary");
INSERT INTO subjects VALUES("13","Creative Arts","Primary");
INSERT INTO subjects VALUES("14","RME","Primary");
INSERT INTO subjects VALUES("15","ICT","Primary");
INSERT INTO subjects VALUES("16","Ghanaian Language","Primary");



DROP TABLE term;

CREATE TABLE `term` (
  `academicyear` varchar(10) default NULL,
  `term` varchar(20) default NULL,
  `begindate` varchar(15) default NULL,
  `enddate` varchar(15) default NULL,
  `nexttermbegin` varchar(15) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO term VALUES("2016/2017","First Term","11/25/2016","11/28/2016","11/30/2016");



DROP TABLE transfer;

CREATE TABLE `transfer` (
  `studentid` varchar(15) NOT NULL default '',
  `surname` varchar(30) default NULL,
  `studentname` varchar(30) default NULL,
  `birthdate` varchar(10) default NULL,
  `gender` varchar(10) default NULL,
  `birthplace` varchar(30) default NULL,
  `religion` varchar(10) default NULL,
  `languagespoken` varchar(30) default NULL,
  `admissiondate` varchar(20) default NULL,
  `percularhabit` varchar(20) default NULL,
  `class` varchar(5) default NULL,
  `residentialaddress` varchar(50) default NULL,
  `previousschool` varchar(50) default NULL,
  `reason` varchar(50) default NULL,
  `guardianname` varchar(50) default NULL,
  `guardiancontact` varchar(25) default NULL,
  `guardianwork` varchar(50) default NULL,
  `guardianaddress` varchar(50) default NULL,
  `scholarship` varchar(5) default NULL,
  `batch` varchar(10) default NULL,
  `passport` varchar(50) default NULL,
  PRIMARY KEY  (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




