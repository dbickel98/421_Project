use xwq914;

##

drop table if exists review;
drop table if exists movie;
drop table if exists director;
drop table if exists actor;
drop table if exists users;

create table users
(users_id varchar(3)	not null unique,
users_name varchar(15)	not null,
users_email varchar(15)	not null,
users_password varchar(15) not null,
primary key(users_id));

create table actor
(actor_id varchar(3)	not null unique,
actor_LName varchar(15) not null,
actor_FName varchar(15) not null,
actor_age varchar(9)	not null,
primary key(actor_id));

create table director
(director_id varchar(3)	not null unique,
director_LName varchar(15) not null,
director_FName varchar(15) not null,
director_age varchar(9)	not null,
primary key(director_id));


create table movie
(movie_id varchar(3)	not null unique,
movie_name varchar(30)	not null,
movie_genre varchar(15) not null,
movie_year numeric	not null,
actor_id varchar(3) not null,
director_id varchar(3)	not null,
primary key(movie_id),
foreign key(actor_id) references actor(actor_id),
foreign key(director_id) references director(director_id));

create table review
(review_id varchar(3) not null unique,
review_rating numeric not null,
review_caption varchar(120),
users_id varchar(3) not null,
movie_id varchar(3) not null,
primary key(review_id),
foreign key(users_id) references users(users_id),
foreign key(movie_id) references movie(movie_id));
