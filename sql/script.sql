create database zoo_encyclopedie;
use zoo_encyclopedie;
create table habitat(
id_hab int auto_increment primary key,
nom_hab varchar(15) not null,
desc_hab text
);
create table animal(
id_anl int auto_increment primary key,
nom_anl varchar(15) not null,
type_al enum ('Carnivore ','Herbivore' , 'Omnivore') not null,
img_anl varchar(260) not null,
habitat_id int, foreign key (habitat_id) references habitat(id_hab)
);
insert into habitat (nom_hab,desc_hab) values 
('Savane', 'Vaste étendue herbeuse chaude.'),
('Jungle', 'Forêt dense et humide.'),
('Désert', 'Zone aride et sèche.'),
('Océan', 'Milieu aquatique salé.');

ALTER TABLE habitat
ADD surface_hab INT;

ALTER TABLE habitat
CHANGE surface_hab superficie INT;

ALTER TABLE habitat
DROP COLUMN superficie;

