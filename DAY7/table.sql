CREATE table categories(
    id INTEGER PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE table products(
    id INTEGER PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id INTEGER NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO categories(id,name) VALUES
(1,'Fruit'),
(2,'Bakery'),
(3,'Dry Goods'),
(4,'Vegetables');

INSERT INTO products(id, name, category_id) VALUES
(1, 'Banana',1),
(2, 'Apples',1),

(3, 'Cake',2),
(4, 'Pasta',3),
(5, 'Creale ',3);

--sql query to use
-- select * from products AS p JOIN categories AS c ON p.category_id =c.id;
-- select products.name AS 'Product Name' , categories.name as 'Category' FROM products INNER JOIN categories ON products .category_id=category
