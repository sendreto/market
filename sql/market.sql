CREATE TABLE product_type(
    product_type_id serial PRIMARY KEY,
    name varchar(50),
    tax double precision
);

CREATE TABLE product(
    product_id serial PRIMARY key,
    name varchar(50),
    price double precision,
	manufacturing_date date,
	due_date date,
	ean bigint,
	product_type_id integer,
    FOREIGN KEY (product_type_id) REFERENCES product_type(product_type_id)
 );

