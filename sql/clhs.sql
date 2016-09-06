drop database if exists clhs;
create database clhs;
use clhs;

create table users(id integer primary key ,username varchar(20),name varchar(40),email varchar(40),password varchar(255));

ALTER TABLE users MODIFY id int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE IF NOT EXISTS active_users (
  id bigint(20) unsigned NOT NULL UNIQUE,
  user bigint(20) NOT NULL,
  session_id varchar(255) NOT NULL,
  hash varchar(255) NOT NULL,
  expires int(11) NOT NULL
);
ALTER TABLE active_users MODIFY id bigint(20) unsigned NOT NULL AUTO_INCREMENT;

create table league(l_id integer primary key,l_name varchar(40),l_winner varchar(40),l_sixes integer,l_fours integer ,l_wickets integer,l_overs integer,l_user_id varchar(20) references users(username));

create table teams(t_id integer primary key,t_name varchar(40),t_coach varchar(40),t_captain_id integer,t_league_id integer references league(l_id),t_points integer);

create table players(p_id integer primary key ,p_name varchar(40),p_dob date ,p_runs integer,p_wickets integer,p_strike_rate decimal ,p_economy decimal,p_average decimal,p_batting_style varchar(40),p_bowling_style varchar(40),p_team_id integer references teams(t_id));

alter table teams add constraint foreign key (t_captain_id) references players(p_id);

create table umpires(u_id integer primary key,u_name varchar(40),u_experience integer);
create table grounds(g_id integer primary key,g_name varchar(40),g_city varchar(40),g_country varchar(40));

create table fixtures(f_match_id integer primary key,f_team1_id integer references teams(t_id),f_team2_id integer references teams(t_id),f_venue integer references grounds(g_id),f_date date,f_winner_id integer references teams(t_id),f_league_id integer references league(t_id));
  

/*clean upto here*/

create table batting_scorecard(s_match_id integer,s_player_id integer,s_runs integer,s_balls_faced integer,s_fours integer,s_sixes integer,s_caught_by integer references players(p_id),s_bowled_by integer references players(p_id),s_league_id integer references league(l_id),primary key(s_match_id,s_player_id,s_league_id));

create table bowling_scorecard(s_match_id integer,s_player_id integer ,s_overs integer,s_wickets integer,s_maiden_overs integer,s_wides integer,s_no_balls  integer ,s_leg_byes integer,s_league_id integer references league(l_id),primary key(s_match_id,s_player_id,s_league_id));

create table commentary(innings_id integer,ball_number integer,comment varchar(255),result_of_ball varchar(20),fixture_id integer references fixtures(f_match_id),primary key(fixture_id,innings_id,ball_number));


/*clean upto here*/

create table umpfix(umpire_id integer references umpires(u_id),fixture_id integer references fixtures(f_match_id),primary key(umpire_id,fixture_id));

INSERT INTO `clhs`.`users` (`id`, `username`, `name`, `email`, `password`) VALUES (NULL, 'admin', 'Administrator', 'srajan1996@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee');

