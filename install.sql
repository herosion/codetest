-- supprime la base de données si elle existe
DROP DATABASE IF EXISTS `db_codetest`;

-- suppression de l'utilisateur admin si il existe
DELETE FROM mysql.user WHERE user='admin' and host='benjamin';

-- création de la base de données
CREATE DATABASE `db_codetest`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_unicode_ci;

-- création d'un utilisateur spécifique qui n'aura que des droits sur une base de données db_robot
-- grant all priviliges ça permet d'ajouter tous les droits d'administration sur la base de données db_robot
-- pour utilisateur spécifique, l'option with grant option lui permet d'ajouter des utilisateurs pour cette base de données
GRANT ALL PRIVILEGES ON `db_codetest`.* to 'admin'@'localhost' IDENTIFIED BY 'benjamin' WITH GRANT OPTION;