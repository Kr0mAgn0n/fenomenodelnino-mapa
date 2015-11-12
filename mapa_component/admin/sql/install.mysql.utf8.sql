CREATE TABLE IF NOT EXISTS areas (id INT NOT NULL AUTO_INCREMENT, area VARCHAR(25) NOT NULL, PRIMARY KEY (id));
 
CREATE TABLE IF NOT EXISTS mapa (
	id INT NOT NULL AUTO_INCREMENT,
	area_id INT NOT NULL,
	titulo VARCHAR(25) NOT NULL,
	latitud FLOAT(14,7) NOT NULL,
	longitud FLOAT(14,7) NOT NULL,
	descripcion VARCHAR(50) NOT NULL,
	fecha DATETIME NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (area_id) REFERENCES areas(id)
);
	
INSERT INTO areas (area) VALUES('Oceanografía'),('Hidrología'),('Sanitaria');	
