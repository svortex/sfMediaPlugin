CREATE TABLE sf_media_file (id BIGINT AUTO_INCREMENT, type VARCHAR(255), code VARCHAR(255), title VARCHAR(255), url VARCHAR(255), thumb VARCHAR(255), description VARCHAR(255), provider VARCHAR(255), real_name VARCHAR(255), small VARCHAR(255), medium VARCHAR(255), large VARCHAR(255), INDEX sf_media_file_type_idx (type), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_media_file (id BIGINT AUTO_INCREMENT, type VARCHAR(255), code VARCHAR(255), title VARCHAR(255), url VARCHAR(255), thumb VARCHAR(255), description VARCHAR(255), provider VARCHAR(255), real_name VARCHAR(255), small VARCHAR(255), medium VARCHAR(255), large VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
