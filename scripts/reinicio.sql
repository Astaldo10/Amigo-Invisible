DROP TABLE IF EXISTS Amigo;
DROP TABLE IF EXISTS Usuario;

CREATE TABLE Usuario (

	user CHAR(20) NOT NULL,
	pass CHAR(20) NOT NULL,
	
	PRIMARY KEY (user)
	
);

CREATE INDEX user ON Usuario (user);

CREATE TABLE Amigo (

	id CHAR(20) NOT NULL,
	friend CHAR(20) NOT NULL,
	
	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES Usuario (user)
	
);
