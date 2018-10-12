create tables;

DROP TABLE if exists `like`;
DROP TABLE if exists post;
DROP TABLE if exists profile;

create table profile (
profileId BINARY (16) not null,
profileActivationToken CHAR(32),
profileEmail varchar(128),
profileUsername varchar(128),
Primary Key(profileId),
	unique(profileEmail),
	unique(profileId),
	unique(profileUsername)

);

create table post (
	postId BINARY(16) not null,
	postDate DATETIME(6) not null,
	postContent TEXT(2000)not null,
	postProfileId BINARY(16) not null,
	postPostId BINARY(16) not null,
	index (postProfileId),
	index (postPostId),
	foreign key (postProfileId) references profile(profileId),
	foreign key (postPostId) references post(postId) ,
	primary key (postId)

);

create table `like` (
	likeId BINARY(16) not null,
	likeProfileId BINARY(16) not null,
	likePostId    BINARY(16) not null ,
	likeDate      DATETIME(6),
	index (likeProfileId),
	index (likePostId),
	foreign key (likeProfileId) references profile(profileId),
	foreign key (likePostId) references post(postId),
	PRIMARY KEY (likeProfileId,likePostId)
);
