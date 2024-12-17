DROP DATABASE IF EXISTS schema_fut_champions;
CREATE DATABASE schema_fut_champions;
USE schema_fut_champions;

CREATE TABLE Clubs (
    club_id INT AUTO_INCREMENT PRIMARY KEY,
    club_name VARCHAR(255) NOT NULL UNIQUE,
    logo VARCHAR(255)
);

CREATE TABLE Nationalities (
    nationality_id INT AUTO_INCREMENT PRIMARY KEY,
    nationality_name VARCHAR(255) NOT NULL UNIQUE,
    flag VARCHAR(255)
);

CREATE TABLE StatistiqueJrs (
    statistjr_id INT AUTO_INCREMENT PRIMARY KEY,
    pace INT NOT NULL,
    shooting INT NOT NULL,
    passing INT NOT NULL,
    dribbling INT NOT NULL,
    defending INT NOT NULL,
    physical INT NOT NULL,
    CHECK (pace BETWEEN 10 AND 99),
    CHECK (shooting BETWEEN 10 AND 99),
    CHECK (passing BETWEEN 10 AND 99),
    CHECK (dribbling BETWEEN 10 AND 99),
    CHECK (defending BETWEEN 10 AND 99),
    CHECK (physical BETWEEN 10 AND 99)
);

CREATE TABLE StatistiqueGKs (
    statistgk_id INT AUTO_INCREMENT PRIMARY KEY,
    diving INT NOT NULL,
    handling INT NOT NULL,
    kicking INT NOT NULL,
    reflexes INT NOT NULL,
    speed INT NOT NULL,
    positioning INT NOT NULL,
    CHECK (diving BETWEEN 10 AND 99),
    CHECK (handling BETWEEN 10 AND 99),
    CHECK (kicking BETWEEN 10 AND 99),
    CHECK (reflexes BETWEEN 10 AND 99),
    CHECK (speed BETWEEN 10 AND 99),
    CHECK (positioning BETWEEN 10 AND 99)
);

CREATE TABLE Players (
    player_id INT AUTO_INCREMENT PRIMARY KEY,
    name_player VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    position ENUM('GK', 'CBR', 'CBL', 'LB', 'RB', 'CML', 'CM', 'CMR', 'LW', 'RW', 'ST') NOT NULL,
    rating FLOAT NOT NULL CHECK (rating BETWEEN 10 AND 99),
    club_id INT,
    nationality_id INT,
    statistjr_id INT,
    statistgk_id INT,
    FOREIGN KEY (club_id) REFERENCES Clubs(club_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (nationality_id) REFERENCES Nationalities(nationality_id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (statistjr_id) REFERENCES StatistiqueJrs(statistjr_id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (statistgk_id) REFERENCES StatistiqueGKs(statistgk_id) ON DELETE SET NULL ON UPDATE CASCADE
);
