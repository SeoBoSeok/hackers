create table members(
mb_no int(11) not null auto_increment,
mb_id varchar(20) not null default '',
mb_password varchar(255) not null default '',
mb_name varchar(255) not null default '',
mb_email varchar(255) not null default '',
mb_birth varchar(255) not null default '',
mb_level tinyint(4) not null default '0',
mb_sex char(1) not null default '',
mb_tel varchar(255) not null default '',
mb_hp varchar(255) not null default '',
mb_certify varchar(20) not null default '',
mb_postcode varchar(255) not null default '',
mb_add1 varchar(255) not null default '',
mb_add2 varchar(255) not null default '',
mb_add_jibun varchar(255) not null default '',
mb_sms tinyint(4) not null default '0',
mb_mailing tinyint(4) not null default '0',
mb_email_certify varchar(20) not null default '',
mb_hp_certify varchar(20) not null default '',
mb_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY (`mb_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table hac_board(
	botable varchar(20) not null default '',
	bosubject varchar(255) not null default '',
	bolistlevel tinyint(4) not null default 0,
	boreadlevel tinyint(4) not null default 0,
	bowritelevel tinyint(4) not null default 0,
	boreplylevel tinyint(4) not null default 0,
	bodownloadlevel tinyint(4) not null default 0,
	bocategorylist text not null,
	PRIMARY KEY (`botable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table hac_board_file(
	botable varchar(20) not null default '',
	bowriteid varchar(20) not null default '',
	bofileno varchar(20) not null default '',
	bofilesource varchar(255) not null default '',
	bofile varchar(255) not null default '',
	bofiledownload varchar(255) not null default '',
	bodatetime datetime not null default '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table hac_board_write(
	writeid varchar(20) not null default '',
	writesubject varchar(255) not null default '',
	writecontents varchar(255) not null default '',
	writehit int not null default 0,
	writepassword varchar(255) not null default '',
	writeemail varchar(255) not null default '',
	writedate datetime not null default '0000-00-00 00:00:00',
	writefile varchar(255) not null default ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table lecture_board(
	lid int(11) not null auto_increment,
	lname varchar(50) not null default '',
	lcat
	ltitle
	lauthor
	lhard
	ltime
	ldescription varchar(255) not null default '',
	lthumnail varchar(255) not null default '',
	PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
