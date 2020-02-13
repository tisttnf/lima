-- Table			Create			Read			Update			Delete		Type		Status
----------------------------------------------------------------------------------------------------
-- user				Admin 			Admin			Admin			Admin 		# User		
-- admin			Admin 			Admin			Admin			Admin		# User				
-- project_owner	Admin 			Admin			PO/Admin		Admin		# User		
-- dosen			Admin 			Admin			Ds/Admin		Admin		# User		
-- asisten_dosen	Admin 			Admin			As/Admin		Admin		# User		
-- mahasiswa		Admin 			Admin			MhsAdmin		Admin		# User		
-- absen			Ds/As/Mhs		Ds/As/Mhs/Adm	Admin			Admin		# Absen		
-- prodi			Admin 			Admin			Admin			Admin 		# Support	Fix
-- semester 		Admin 			Admin			Admin			Admin 		# Support	Fix
-- peran 			Admin 			Admin			Admin			Admin 		# Support	Fix
-- project			PO				All				Ds/As/Admin		Admin		# Project	Fix
-- mvp_project		Mhs				All				Admin			Admin		# Project	
-- sprint_project	Mhs				All				Admin			Admin		# Project	
-- log_project		Mhs				All				Admin			Admin		# Project	
-- tim				Ds				All				Ds/Admin		Admin		# Tim		Fix
-- member_tim		Ds/As			All				Admin			Admin		# Tim		Fix
-- tim_skor			Ds/As			All				Admin			Admin		# Skor		Fix
-- member_skor		Ds/As			All				Admin			Admin		# Skor		Fix

-- Hapus Table

drop table if exists log_project;
drop type if exists status2;
drop type if exists bobot;
drop table if exists sprint_project;
drop table if exists mvp_project;
drop table if exists project;
drop type if exists status;
drop table if exists member_tim_skor;
drop table if exists tim_skor;
drop table if exists member_tim;
drop table if exists tim;
drop table if exists peran;
drop table if exists semester;
drop table if exists prodi;
drop table if exists absen;
drop table if exists "admin";
drop table if exists mahasiswa;
drop table if exists asisten_dosen;
drop table if exists dosen;
drop table if exists project_owner;
drop table if exists "user";
drop type if exists "role";

-- Buat Table

-- Table User

create type "role" as enum ('Project Owner', 'Dosen', 'Asisten Dosen', 'Mahasiswa', 'Admin');

-- Fix
create table "user"(
	id serial primary key,
	nama varchar(45) not null,
	role "role" not null,
	email varchar(45) not null unique,
	password varchar,
	foto varchar default null,
	nohp varchar(15) not null unique,
	fingerprint_pin int default null unique,
	created_at timestamp,
	updated_at timestamp 
);

-- Fix
create table project_owner(
	primary key(id)
) inherits("user");

-- Fix
create table dosen(
	nidn varchar(20) not null unique,
	primary key(id)
) inherits("user");

-- Fix
create table asisten_dosen(
	nim varchar(10) not null unique,
	primary key(id)
) inherits("user");

-- Fix
create table mahasiswa(
	nim varchar(10) not null unique,
	primary key(id)
) inherits("user");

-- Fix
create table "admin"(
	primary key(id)
) inherits("user");

-- Table Absen

-- Fix
create table absen(
	id serial primary key,	
	user_id int references "user"(id) not null,
	fingerprint_id int references "user"(fingerprint_pin) not null,
	kedatangan timestamp not null,
	kepulangan timestamp not null,
	keterangan text not null,
	created_at timestamp,
	updated_at timestamp	
);

-- Table Pendukung

-- Fix
create table prodi(
	id serial primary key,
	nama varchar(20) unique not null,
	created_at timestamp,
	updated_at timestamp
);

-- Fix
create table semester(
	id serial primary key,
	nama varchar(5) unique not null,
	created_at timestamp,
	updated_at timestamp
);

-- Fix
create table peran(
	id serial primary key,
	nama varchar(20) unique not null,
	created_at timestamp,
	updated_at timestamp
);

-- Table Tim

-- Fix
create table tim(
	id serial primary key,
	nama varchar(20) not null,
	semester_id int references semester(id) not null,
	prodi_id int references prodi(id) not null,
	final_skor double precision not null default 0,
	asisten_dosen_id int references asisten_dosen(id) default null,
	created_by_id int references dosen(id) not null,
	created_at timestamp,
	updated_at timestamp
);

-- Fix
create table member_tim(
	id serial primary key,
	tim_id int references tim(id) not null,
	mahasiswa_id int references mahasiswa(id) not null,
	peran_id int references peran(id) not null,
	tanggung_jawab text not null,
	final_skor double precision not null default 0,
	created_by_id int references dosen(id) not null,
	created_at timestamp,
	updated_at timestamp	
);

-- Table Skor

-- Fix
create table tim_skor(
	id serial primary key,
	tim_id int references tim(id) not null,
	penilai_id int references dosen(id) not null,
	tanggal date default now() not null,
	skor double precision not null,
	created_at timestamp,
	updated_at timestamp
);

-- Fix
create table member_tim_skor(
	id serial primary key,
	member_tim_id int references member_tim(id) not null,
	penilai_id int references dosen(id) not null,
	tanggal date default now() not null,
	skor double precision not null,
	created_at timestamp,
	updated_at timestamp
);

-- Table Project

create type status as enum ('Propose', 'On Going', 'Done');

-- Fix
create table project(
	id serial primary key,
	nama varchar(50) not null unique,
	deskripsi text not null,
	tanggal_mulai date not null,
	tanggal_akhir date not null,
	jumlah_sprint int not null,
	budget double precision not null,
	status status not null default 'Propose',
	persen double precision not null default 0,	
	semester_id int references semester(id) not null,
	tim_id int references tim(id) default null,
	final_skor double precision not null default 0,
	created_by_id int references project_owner(id) not null,
	created_at timestamp,
	updated_at timestamp
);

-- Fix
create table mvp_project(
	id serial primary key,
	project_id int references project(id),
	tanggal_rilis date,
	deskripsi text,
	created_by_id int references mahasiswa(id) not null,
	created_at timestamp,
	updated_at timestamp
);

-- Fix
create table sprint_project(
	id serial primary key,
	project_id int references project(id) not null,
	sprint int not null,
	tanggal_mulai date not null,
	tanggal_akhir date not null,
	created_by_id int references mahasiswa(id) not null,
	created_at timestamp,
	updated_at timestamp
);

create type bobot as enum ('Easy', 'Medium', 'Hard');

create type status2 as enum ('Propose', 'On Going', 'Verifying', 'Verified');

-- Fix
create table log_project(
	id serial primary key,
	sprint_id int references sprint_project(id) not null,
	tugas text not null,
	deskripsi text not null,
	status status2 not null default 'Propose',
	bobot bobot not null,
	kendala text not null,
	review text not null,
	created_by_id int references mahasiswa(id) not null,
	created_at timestamp,
	updated_at timestamp
);

-- insert data

insert into prodi values 
(default, 'Sistem Informasi'),
(default, 'Teknik Informatika');

insert into semester values 
(default, '20201'),
(default, '20202'),
(default, '20211'),
(default, '20212'),
(default, '20221'),
(default, '20222'),
(default, '20231'),
(default, '20232'),
(default, '20241'),
(default, '20242'),
(default, '20251'),
(default, '20252');

insert into peran values
(default, 'Backend Web'),
(default, 'Frontend Web'),
(default, 'Fullstack Web'),
(default, 'Backend Mobile'),
(default, 'Frontend Mobile'),
(default, 'Fullstack Mobile'),
(default, 'Designer'),
(default, 'System Analyst'),
(default, 'Project Manager'),
(default, 'Data Analyst');

insert into project_owner values
(default, 'Lukman Rosyidi', 'Project Owner', 'lukman@gmail.com', '123456', default, '08123456780', default, default, default);

insert into dosen values
(default, 'Sirojul Munir', 'Dosen', 'sirojul@gmail.com', '123456', default, '08123456789', default, default, default, '0110212345');

insert into mahasiswa values
(default, 'Muhammad Azhar Rasyad', 'Mahasiswa', 'muhazharrasyad@gmail.com', '123456', default, '081290351971', default, default, default, '0110217029');

insert into asisten_dosen values
(default, 'Muhammad Yazid Supriadi', 'Asisten Dosen', 'yazid@gmail.com', '123456', default, '081290351972', default, default, default, '0110217030');

insert into project values
(default, 'Pemrograman Mobile', 'Membuat Aplikasi Android untuk Resep Masakan', '01-01-2020', '03-01-2020', 12, 10000000, default, default, 1, default, default, 1);

insert into mvp_project values
(default, 1, '01-01-2020', 'Fitur Login dapat digunakan', 3);

insert into sprint_project values
(default, 1, 1, '03-02-2020', '09-02-2020', 3);

insert into tim values
(default, 'Kelompok 1', 2, 2, 0, 4, 2);

insert into member_tim values
(default, 1, 3, 1, 'Membuat CRUD', default, 2);

insert into tim_skor values
(default, 1, 2, '01-01-2020', 80);

insert into member_tim_skor values
(default, 1, 2, '01-01-2020', 80);