create table employee (
employee_id INTEGER not null,
first_name varchar,
last_name varchar,
title varchar,
address varchar,
start_date date,
end_date date,
salary_type decimal,
primary key (employee_id),
primary key(first_name, last_name)
CONSTRAINT equipment_team_table_fkey_team_id FOREIGN KEY (team_id) REFERENCES team (team_id)
)