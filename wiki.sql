#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: place_type
#------------------------------------------------------------

CREATE TABLE place_type(
        id          Int  Auto_increment  NOT NULL ,
        name        Varchar (250) NOT NULL ,
        description Text ,
        image       Varchar (250)
	,CONSTRAINT place_type_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: places
#------------------------------------------------------------

CREATE TABLE places(
        id            Int  Auto_increment  NOT NULL ,
        name          Varchar (250) NOT NULL ,
        description   Text ,
        image         Varchar (250) ,
        id_place_type Int NOT NULL
	,CONSTRAINT places_PK PRIMARY KEY (id)

	,CONSTRAINT places_place_type_FK FOREIGN KEY (id_place_type) REFERENCES place_type(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: religions
#------------------------------------------------------------

CREATE TABLE religions(
        id          Int  Auto_increment  NOT NULL ,
        name        Varchar (250) NOT NULL ,
        description Text ,
        history     Text NOT NULL ,
        image       Varchar (250)
	,CONSTRAINT religions_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: weapon
#------------------------------------------------------------

CREATE TABLE weapons(
        id          Int  Auto_increment  NOT NULL ,
        name        Varchar (250) NOT NULL ,
        description Text ,
        image       Varchar (250)
	,CONSTRAINT weapons_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: relationship_type
#------------------------------------------------------------

CREATE TABLE relationship_type(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (250) NOT NULL
	,CONSTRAINT relationship_type_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: titles
#------------------------------------------------------------

CREATE TABLE titles(
        id          Int  Auto_increment  NOT NULL ,
        name        Varchar (250) NOT NULL ,
        description Text ,
        parent_id   Int
	,CONSTRAINT title_AK UNIQUE (parent_id)
	,CONSTRAINT title_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: blazons
#------------------------------------------------------------

CREATE TABLE blazons(
        id          Int  Auto_increment  NOT NULL ,
        name        Varchar (250) NOT NULL ,
        description Text ,
        image       Varchar (250) ,
        parent_id   Int
	,CONSTRAINT blazon_AK UNIQUE (parent_id)
	,CONSTRAINT blazon_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: characters
#------------------------------------------------------------

CREATE TABLE characters(
        id                   Int  Auto_increment  NOT NULL ,
        firstname            Varchar (250) NOT NULL ,
        lastname             Varchar (250) ,
        birthday             Date ,
        image                Varchar (250) ,
        is_dead              Bool NOT NULL ,
        deathdate            Date ,
        physical_description Text NOT NULL ,
        personality          Text NOT NULL ,
        history              Text NOT NULL ,
        id_blazon            Int
	,CONSTRAINT characters_PK PRIMARY KEY (id)

	,CONSTRAINT character_blazon_FK FOREIGN KEY (id_blazon) REFERENCES blazons(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: character_religion
#------------------------------------------------------------

CREATE TABLE character_religion(
        id              Int NOT NULL ,
        id_character    Int NOT NULL ,
        conversion_date Date
	,CONSTRAINT character_religion_PK PRIMARY KEY (id,id_character)

	,CONSTRAINT character_religion_religion_FK FOREIGN KEY (id) REFERENCES religions(id)
	,CONSTRAINT character_religion_character0_FK FOREIGN KEY (id_character) REFERENCES characters(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: character_weapon
#------------------------------------------------------------

CREATE TABLE character_weapon(
        id           Int NOT NULL ,
        id_character Int NOT NULL
	,CONSTRAINT character_weapon_PK PRIMARY KEY (id,id_character)

	,CONSTRAINT character_weapon_weapon_FK FOREIGN KEY (id) REFERENCES weapons(id)
	,CONSTRAINT character_weapon_character0_FK FOREIGN KEY (id_character) REFERENCES characters(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: character_place
#------------------------------------------------------------

CREATE TABLE character_place(
        id                 Int NOT NULL ,
        id_character       Int NOT NULL ,
        is_birthplace      Bool NOT NULL ,
        is_deathplace      Bool NOT NULL ,
        is_weddingplace    Bool NOT NULL ,
        is_knightplace     Bool NOT NULL ,
        is_ordinationplace Bool NOT NULL
	,CONSTRAINT character_place_PK PRIMARY KEY (id,id_character)

	,CONSTRAINT character_place_place_FK FOREIGN KEY (id) REFERENCES places(id)
	,CONSTRAINT character_place_character0_FK FOREIGN KEY (id_character) REFERENCES characters(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: character_relationship
#------------------------------------------------------------

CREATE TABLE character_relationship(
        id                   Int NOT NULL ,
        id_character         Int NOT NULL ,
        id_relationship_type Int NOT NULL
	,CONSTRAINT character_relationship_PK PRIMARY KEY (id,id_character,id_relationship_type)

	,CONSTRAINT character_relationship_character_FK FOREIGN KEY (id) REFERENCES characters(id)
	,CONSTRAINT character_relationship_character0_FK FOREIGN KEY (id_character) REFERENCES characters(id)
	,CONSTRAINT character_relationship_relationship_type1_FK FOREIGN KEY (id_relationship_type) REFERENCES relationship_type(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: character_title
#------------------------------------------------------------

CREATE TABLE character_title(
        id       Int NOT NULL ,
        id_title Int NOT NULL
	,CONSTRAINT character_title_PK PRIMARY KEY (id,id_title)

	,CONSTRAINT character_title_character_FK FOREIGN KEY (id) REFERENCES characters(id)
	,CONSTRAINT character_title_title0_FK FOREIGN KEY (id_title) REFERENCES titles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: event_type
#------------------------------------------------------------

CREATE TABLE event_type(
        id    Int  Auto_increment  NOT NULL ,
        name  Varchar (250) NOT NULL ,
        image Varchar (250) NOT NULL
	,CONSTRAINT event_type_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: events
#------------------------------------------------------------

CREATE TABLE events(
        id            Int  Auto_increment  NOT NULL ,
        name          Varchar (250) NOT NULL ,
        description   Text ,
        history       Text ,
        start_date    Date ,
        end_date      Date ,
        id_event_type Int NOT NULL ,
        id_place      Int NOT NULL
	,CONSTRAINT event_PK PRIMARY KEY (id)

	,CONSTRAINT event_event_type_FK FOREIGN KEY (id_event_type) REFERENCES event_type(id)
	,CONSTRAINT event_place0_FK FOREIGN KEY (id_places) REFERENCES places(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: character_event
#------------------------------------------------------------

CREATE TABLE character_event(
        id       Int NOT NULL ,
        id_event Int NOT NULL
	,CONSTRAINT character_event_PK PRIMARY KEY (id,id_event)

	,CONSTRAINT character_event_character_FK FOREIGN KEY (id) REFERENCES characters(id)
	,CONSTRAINT character_event_Event0_FK FOREIGN KEY (id_event) REFERENCES events(id)
)ENGINE=InnoDB;
