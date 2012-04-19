CREATE TABLE answer (id BIGINT AUTO_INCREMENT, text VARCHAR(255) NOT NULL, click_count INT DEFAULT 0, question_id BIGINT, INDEX question_id_idx (question_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE config (id BIGINT AUTO_INCREMENT, ip_range_begin VARCHAR(15), ip_range_end VARCHAR(15), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE question (id BIGINT AUTO_INCREMENT, text VARCHAR(255) NOT NULL, discription LONGTEXT, multichoice TINYINT(1), survey_id BIGINT, INDEX survey_id_idx (survey_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE survey (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, discription LONGTEXT, public_id VARCHAR(16) NOT NULL, limit_ip TINYINT(1), limit_location_lat FLOAT(18, 2), limit_location_long FLOAT(18, 2), limit_endtime DATETIME, user_id BIGINT, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user (id BIGINT AUTO_INCREMENT, login VARCHAR(128), pass VARCHAR(128), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE answer ADD CONSTRAINT answer_question_id_question_id FOREIGN KEY (question_id) REFERENCES question(id) ON DELETE CASCADE;
ALTER TABLE question ADD CONSTRAINT question_survey_id_survey_id FOREIGN KEY (survey_id) REFERENCES survey(id) ON DELETE CASCADE;
ALTER TABLE survey ADD CONSTRAINT survey_user_id_user_id FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE;
