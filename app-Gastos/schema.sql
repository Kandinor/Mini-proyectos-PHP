/*Se crea la tabla para categorias y otra para gastos, 
siendo que una categoria puede tener muchos gastos y esos gastos pertenecen a una categoria*/

CREATE TABLE categories(
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE expenses(
    id int NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    category_id int NOT NULL,
    expense FLOAT(5,2) NOT NULL,
    date date NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);