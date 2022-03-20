create table employee (
employee_id INTEGER not null,
first_name varchar(255),
last_name varchar(255),
title varchar(255),
address varchar(255),
start_date date,
end_date date,
salary_type varchar(255),
Urole varchar(255),
primary key (employee_id),
primary key(first_name, last_name)
)

CREATE TABLE credentials (
	username varchar(255),
	Upassword varchar(255),
	employee_id INTEGER,
	Foreign Key(employee_id) REFERENCES employee(employee_id)
)


insert into employee (employee_id, first_name, last_name, title, address, start_date, end_date, salary_type, Urole) values (1, 'Paul', 'Jones', 'Coach', '6035 Buena Vista Crossing', '5/23/2021', null, 'employee', 'user');
insert into employee (employee_id, first_name, last_name, title, address, start_date, end_date, salary_type, Urole) values (2, 'Brad', 'Smith', 'IT Admin', '07 Badeau Park', '8/29/2020', null, 'employee', 'admin');
insert into employee (employee_id, first_name, last_name, title, address, start_date, end_date, salary_type, Urole) values (3, 'Johnath', 'Fidoe', 'Staff ', '9874 La Follette Circle', '8/13/2021', '2/2/2024', 'contractor', 'user');


insert into credentials (username, Upassword, employee_id) values ('pjones','$2y$10$HPQIAR6W0XFtu3NL4r2k4ukaWLQEn/pCTypDFRGADABYMg.K2fHb6',1);
insert into credentials (username, Upassword, employee_id) values ('bsmith','$2y$10$9eESNSeNm0FhMWDiS/3RS.ua2otDa7sd43S27y4Zb6yjPGkuxQRIK',2);
insert into credentials (username, Upassword, employee_id) values ('jfidoe','$2y$10$HPQIAR6W0XFtu3NL4r2k4ukaWLQEn/pCTypDFRGADABYMg.K2fHb6',3);

