
CREATE TABLE IF NOT EXISTS niveis_utilizacao(
	idUtil INT NOT NULL AUTO_INCREMENT,
	tipo VARCHAR(15) NOT NULL,
	PRIMARY KEY (idUtil)
);

CREATE TABLE IF NOT EXISTS users(
	idUser INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(15) NOT NULL,
	password VARCHAR(30) NOT NULL,
	email VARCHAR(60) NOT NULL,
	telefone VARCHAR(9),
	telemovel VARCHAR(9),
	permissao INT NOT NULL,
	PRIMARY KEY (idUser),
	CONSTRAINT fk_permissao
		FOREIGN KEY (permissao)
		REFERENCES niveis_utilizacao(idUtil)
	
);

CREATE TABLE IF NOT EXISTS anuncios(
	idAnuncio INT NOT NULL AUTO_INCREMENT,
	titulo VARCHAR(60) NOT NULL,
	descricao VARCHAR(200) NOT NULL,
	preco DECIMAL(7,0) NOT NULL,
	assoalhadas VARCHAR(3),
	concelho VARCHAR(15) NOT NULL,
	distrito VARCHAR(15),
	freguesia VARCHAR(15),
	latitutde FLOAT( 10, 6 ) NOT NULL , /* coordenadas de acordo com google*/
	longitude FLOAT( 10, 6 ) NOT NULL,  /* https://developers.google.com/maps/articles/phpsqlsearch_v3?csw=1 */
	mediapath VARCHAR(60) NOT NULL,
	autor INT NOT NULL,
	PRIMARY KEY (idAnuncio),
	CONSTRAINT fk_autor
		FOREIGN KEY (autor)
		REFERENCES users(idUser)
);

CREATE TABLE IF NOT EXISTS categorias(
	idCat INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(15) NOT NULL,
	primario BIT(1) NOT NULL,
	PRIMARY KEY (idCat)
);


CREATE TABLE IF NOT EXISTS users_interesses(
	userID INT NOT NULL,
	catID INT NOT NULL,
	PRIMARY KEY(userID,catID),
	CONSTRAINT fk_user
		FOREIGN KEY (userID)
		REFERENCES users(idUser),
	CONSTRAINT fk_interesse
		FOREIGN KEY (catID)
		REFERENCES categorias(idCat)
);


CREATE TABLE IF NOT EXISTS anuncios_categorias(
	anuncioID INT NOT NULL,
	catID INT NOT NULL,
	PRIMARY KEY(anuncioID,catID),
	CONSTRAINT fk_anuncio
		FOREIGN KEY (anuncioID)
		REFERENCES anuncios(idAnuncio),
	CONSTRAINT fk_interesse2
		FOREIGN KEY (catID)
		REFERENCES categorias(idCat)
);



