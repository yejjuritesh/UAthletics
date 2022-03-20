drop table if exists athlete;

drop table if exists scholarship ;

drop table if exists sport ;

drop table if exists events ;

drop table if exists team ;

drop table if exists employee ;

drop table if exists roles ;

drop table if exists credentials ;

drop table if exists equipment ;

drop table if exists ranks ;

drop table if exists income ;

create table athlete (
athlete_id INTEGER not null,
team_id Integer not null,
last_name VARCHAR,
first_name VARCHAR,
positions VARCHAR,
academic_level VARCHAR,
contact VARCHAR,
jersey_number INTEGER, 
primary key (athlete_id),
CONSTRAINT athelete_table_fkey_team_id FOREIGN KEY (team_id) REFERENCES team (team_id),
)

create table scholarship_athelete (
athlete_id INTEGER not null,
scholarship_id INTEGER not null,
issue_date date,
primary key(athelete_id,scholarship_id),
CONSTRAINT scholarship_athelete_table_fkey_athelete_id FOREIGN KEY (athlete_id) REFERENCES athelete (athlete_id),
CONSTRAINT scholarship_athelete_table_fkey_scholarship_id FOREIGN KEY (scholarship_id) REFERENCES scholarship (scholarship_id)
)


create table scholarship (
scholarship_id INTEGER not null,
amount INTEGER not null,
donor varchar,
scholarhsip_type varchar,
primary key (scholarship_id)
)

create table team (
team_id integer not null,
team_name varchar not null,
sport_id integer not null,
email varchar,
established_date date,
primary key (team_id),
primary key(team_name),
CONSTRAINT team_table_fkey_sport_id FOREIGN KEY (sport_id) REFERENCES sport (sport_id),
)

create table sport(
sport_id integer not null,
sport_name varchar not null,
number_of_players integer not null,
primary key(sport_id),
primary key(sport_name)
)

create table events (
event_id INTEGER not null,
venue VARCHAR,
event_date date,
event_location VARCHAR,
income decimal,
expenses decimal,
primary key (event_id),
)

create table event_team (
event_id INTEGER not null,
team_id INTEGER not null,
primary key(event_id ,team_id),
CONSTRAINT event_team_table_fkey_event_id FOREIGN KEY (event_id) REFERENCES events (event_id),
CONSTRAINT event_team_table_fkey_team_id FOREIGN KEY (team_id) REFERENCES team (team_id)
)

create table equipment (
equipment_id INTEGER not null,
team_id INTEGER not null,
equipment_type VARCHAR,
annual_cost decimal,
purchased_date date,
primary key (equipment_id),
CONSTRAINT equipment_team_table_fkey_team_id FOREIGN KEY (team_id) REFERENCES team (team_id)
)

create table transaction_ledger (
transaction_id INTEGER not null,
team_id INTEGER not null,
transaction_type VARCHAR,
transaction_amount decimal,
transaction_date date,
primary key (transaction_id),
CONSTRAINT equipment_team_table_fkey_team_id FOREIGN KEY (team_id) REFERENCES team (team_id)
)



