<?php
$con=mysqli_connect("Localhost","root","")or die('Error connecting to server '. mysqli_error($con));

$chk_db=mysqli_select_db($con,"skool");

if(!$chk_db){
	mysqli_query($con,"create database skool");
	mysqli_select_db($con,"skool");

//Table Number  creating student table
$register="create table register (
studentid varchar(15),PRIMARY KEY (studentid),
surname varchar(30),
studentname varchar(30),
birthdate varchar(10),
gender varchar(10),
birthplace varchar(30),
religion varchar(10),
languagespoken varchar(30),
admissiondate varchar(20),
percularhabit varchar(20),
class varchar(5),
residentialaddress varchar(50),
previousschool varchar(50),
reason varchar(50),
guardianname varchar(50),
guardiancontact varchar(25),
guardianwork varchar(50),
guardianaddress varchar(50),
scholarship varchar(5),
batch varchar(10),
passport varchar(50)
)";	
mysqli_query($con,$register);

//Table Number  creating graduate table
$graduate="create table graduate (
studentid varchar(15),PRIMARY KEY (studentid),
surname varchar(30),
studentname varchar(30),
birthdate varchar(10),
gender varchar(10),
birthplace varchar(30),
religion varchar(10),
languagespoken varchar(30),
admissiondate varchar(20),
percularhabit varchar(20),
class varchar(5),
residentialaddress varchar(50),
previousschool varchar(50),
reason varchar(50),
guardianname varchar(50),
guardiancontact varchar(25),
guardianwork varchar(50),
guardianaddress varchar(50),
scholarship varchar(5),
batch varchar(10),
passport varchar(50)
)";	
mysqli_query($con,$graduate);


//Table Number  creating transfer table
$transfer="create table transfer (
studentid varchar(15),PRIMARY KEY (studentid),
surname varchar(30),
studentname varchar(30),
birthdate varchar(10),
gender varchar(10),
birthplace varchar(30),
religion varchar(10),
languagespoken varchar(30),
admissiondate varchar(20),
percularhabit varchar(20),
class varchar(5),
residentialaddress varchar(50),
previousschool varchar(50),
reason varchar(50),
guardianname varchar(50),
guardiancontact varchar(25),
guardianwork varchar(50),
guardianaddress varchar(50),
scholarship varchar(5),
batch varchar(10),
passport varchar(50)
)";	
mysqli_query($con,$transfer);


//Table Number  creating staff table
$staff="create table staff (
staffid varchar(7),PRIMARY KEY (staffid),
lastname varchar(50),
firstname varchar(50),
initial varchar(5),
contact varchar(25),
system varchar(30),
username varchar(40),
password varchar(40))";	
mysqli_query($con,$staff);


//Table Number  creating classes table
$classes="create table classes (
classid INT( 2 ) NOT NULL AUTO_INCREMENT,PRIMARY KEY (classid),
classname varchar(5))";	
mysqli_query($con,$classes);


//Table Number  creating term table
$term="create table term (
academicyear varchar(10),
term varchar(20),
begindate varchar(15),
enddate varchar(15),
nexttermbegin varchar(15))";	
mysqli_query($con,$term);


//Table Number  creating school table
$school="create table school (
schoolcode varchar(5),
schoolname varchar(150),
address varchar(150),
location varchar(20),
logo varchar(20))";	
mysqli_query($con,$school);


//Table Number  creating fees table
$fees="create table fees (
feeid INT( 2 ) NOT NULL AUTO_INCREMENT,PRIMARY KEY (feeid),
feedescription varchar(20),
feeamount varchar(5),
feeduration varchar(10))";	
mysqli_query($con,$fees);


//Table Number  creating bills table
$bills="create table bills (
billid INT( 10 ) NOT NULL AUTO_INCREMENT,PRIMARY KEY (billid),
studentid varchar(10),
studentname varchar(50),
academicyear varchar(10),
term varchar(15),
feedescription varchar(20),
feeamount varchar(15))";	
mysqli_query($con,$bills);


//Table Number  creating student account table
$studentaccount="create table studentaccount (
studentid varchar(10),
studentname varchar(50),
debt varchar(5))";	
mysqli_query($con,$studentaccount);


//Table Number  creating payment table
$payment="create table payment (
studentid varchar(10),
recieptnumber varchar(20),
class varchar(10),
term varchar(15),
description varchar(20),
feeamount varchar(4),
paymentdate varchar(15),
balance varchar(4))";	
mysqli_query($con,$payment);


// Exams Results Tables Start From Here-----------------------------------------------Exams Results Table Start From Here


// Table Number 1 creating assessment table
$assessment="create table assessment (
studentid varchar(15),
class varchar(50),
term varchar(50),
academicyear varchar(50),
subject varchar(20),
category varchar(15),
score int(3),
CONSTRAINT pk_assessment
PRIMARY KEY (studentid,term,academicyear,subject)
)";		
mysqli_query($con,$assessment);


// Table Number 2 create assessmentaverage table
$assessmentaverage="create table assessmentaverage (
studentid varchar(15),
subject varchar(30),
averagescore int(5)
)";		
mysqli_query($con,$assessmentaverage);


//Table Number 4 create classaverage table
$classaverage="create table classaverage (
studentid varchar(15),
averagescore int(5)
)";		
mysqli_query($con,$classaverage);


//Table Number 5 create classposition table
$classposition="create table classposition (
studentid varchar(15),
position varchar(5)
)";		
mysqli_query($con,$classposition);


//Table Number 6 creating exams table
$exams="create table exams (
studentid varchar(15),
class varchar(50),
term varchar(50),
academicyear varchar(50),
subject varchar(20),
category varchar(15),
score int(3),
CONSTRAINT pk_exams
PRIMARY KEY (studentid,term,academicyear,subject)
)";
mysqli_query($con,$exams);


//Table Number 7 create generalscore table
$generalscore="create table generalscore (
studentid varchar(15),
class varchar(15),
term varchar(12),
academicyear varchar(15),
subject varchar(50),
category varchar(15),
totalscore int(5)
)";		
mysqli_query($con,$generalscore);


//Table Number 8 create position table
$position="create table position (
studentid varchar(15),
subject varchar(50),
position varchar(5))";		
mysqli_query($con,$position);


//Table Number 12 create subjectassign table
$subjectassign="create table subjectassign (
assignedid varchar(5),
staffid varchar(15),
subject varchar(50),
category varchar(15),
class varchar(30),
CONSTRAINT pk_subjectassign
PRIMARY KEY (staffid,subject,class)
)";		
mysqli_query($con,$subjectassign);


//Table Number 13 create subjectposition table
$subjectposition="create table subjectposition (
studentid varchar(15),
subject varchar(50),
position varchar(5)
)";		
mysqli_query($con,$subjectposition);

//Table Number  creating subjects table
$subjects="create table subjects (
subjectid INT( 2 ) NOT NULL AUTO_INCREMENT,PRIMARY KEY (subjectid),
subjecttitle varchar(50),
level varchar(10))";	
mysqli_query($con,$subjects);

//adding record to staff table
$stid=date('Y')."12";
$addstaff="insert into staff(staffid,lastname,firstname,contact,system,username,password) values('$stid','','administrator','0202469710','administrator','system','password')";
mysqli_query($con,$addstaff);

mysqli_query($con,"insert into subjects(subjecttitle,level) values('English Language','JHS')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('Mathematics','JHS')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('Social Studies','JHS')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('Integrated Science','JHS')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('BDT','JHS')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('RME','JHS')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('ICT','JHS')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('Ghanaian Language','JHS')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('English Language','Primary')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('Mathematics','Primary')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('Natural Science','Primary')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('Citizenship Edu.','Primary')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('Creative Arts','Primary')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('RME','Primary')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('ICT','Primary')");
mysqli_query($con,"insert into subjects(subjecttitle,level) values('Ghanaian Language','Primary')");


//Table Number  create checker table
$checker="create table checker (
expire_date varchar(20)
)";		
mysqli_query($con,$checker);

//expired date

$expire_date=time()+(365*24*60*60);
mysqli_query($con,"insert into checker(expire_date) values('$expire_date')");

}
?>