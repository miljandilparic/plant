CREATE TABLE `warehouses` (
     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
    `volume` int(11) NOT NULL
);

CREATE TABLE plant_types (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    growth_speed_per_minute INT NOT NULL,
    volume INT NOT NULL
);

CREATE TABLE plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_type_id INT NOT NULL,
    current_growth INT NOT NULL,
    warehouse_id INT
);