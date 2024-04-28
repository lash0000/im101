-- lagay mo thru initialization tooollll

-- 1. Create treiven_adminpanel table
CREATE TABLE treiven_adminpanel (
    retrieval_id INT PRIMARY KEY,
    trv_admin_email VARCHAR(255),
    trv_admin_pwd VARCHAR(255),
    trv_admin_active VARCHAR(10),
    trv_registration_date DATE
);

-- Create treiven_user_accounts table
CREATE TABLE treiven_user_accounts (
    treiven_id INT PRIMARY KEY,
    retrieval_id INT,
    trv_user_email VARCHAR(255),
    trv_user_pwd VARCHAR(255),
    trv_user_active CHAR(1),
    trv_registration_date DATE
);

-- 2. Initialize their relationships

ALTER TABLE treiven_user_accounts
ADD CONSTRAINT FK_treiven_user_accounts_retrieval_id
FOREIGN KEY (retrieval_id)
REFERENCES treiven_adminpanel(retrieval_id);

-- 3. Create treiven_category table
CREATE TABLE treiven_category (
    trv_category_id INT PRIMARY KEY,
    trv_category_name ENUM('Brownies', 'Cakes', 'Cookies', 'Specials') UNIQUE KEY,
    trv_category_info VARCHAR(4000)
);

CREATE TABLE treiven_products (
    trv_product_id INT PRIMARY KEY,
    trv_category_id INT,
    trv_product_name VARCHAR(255),
    trv_product_info VARCHAR(4000),
    trv_product_price DECIMAL(10,2),
    trv_product_qty INT,
    trv_product_qty_stock ENUM('Yes', 'No'),
    trv_product_image LONGBLOB,
);

-- 4. ...........
ALTER TABLE treiven_products
ADD CONSTRAINT fk_category_id
FOREIGN KEY (trv_category_id) REFERENCES treiven_category(trv_category_id);

-- 5. for trv_category_name
ALTER TABLE treiven_products
ADD COLUMN trv_category_name ENUM('Brownies', 'Cakes', 'Cookies', 'Specials');

ALTER TABLE treiven_products
ADD CONSTRAINT fk_category
FOREIGN KEY (trv_category_id) REFERENCES treiven_category(trv_category_id);

UPDATE treiven_products AS p
JOIN treiven_category AS c ON p.trv_category_id = c.trv_category_id
SET p.trv_category_name = c.trv_category_name;

ALTER TABLE treiven_products
ADD CONSTRAINT fk_category_name
FOREIGN KEY (trv_category_name) REFERENCES treiven_category(trv_category_name);


--6. initialize my table for handling cart list

CREATE TABLE treiven_cart_items (
    trv_cart_id INT AUTO_INCREMENT PRIMARY KEY,
    trv_product_id INT,
    treiven_id INT,
    trv_category_id INT,
    trv_category_name ENUM('Brownies', 'Cakes', 'Cookies', 'Specials'),
    trv_item_name VARCHAR(255),
    trv_item_qty INT,
    trv_total_amount INT,
    trv_discount_amount INT
);

--7. alter the cart_id together
ALTER TABLE treiven_cart_items AUTO_INCREMENT=100000;

--8. had their relationship together

ALTER TABLE treiven_cart_items
ADD CONSTRAINT fk_treiven_user_accounts
FOREIGN KEY (treiven_id) REFERENCES treiven_user_accounts(treiven_id);

ALTER TABLE treiven_cart_items
ADD CONSTRAINT fk_treiven_category_id
FOREIGN KEY (trv_category_id) REFERENCES treiven_category(trv_category_id);

ALTER TABLE treiven_cart_items
ADD CONSTRAINT fk_treiven_category_name
FOREIGN KEY (trv_category_name) REFERENCES treiven_category(trv_category_name);

------------------------------- NOT YET DONE ---------------------------------

-- Create treiven_orders table
CREATE TABLE treiven_orders (
    trv_order_id INT PRIMARY KEY,
    treiven_id INT,
    trv_category_name VARCHAR(255),
    trv_total_amounts VARCHAR(255),
    trv_order_status VARCHAR(255),
    shipping_address VARCHAR(255), -- Changed column name
    shipping_longtitude VARCHAR(255), -- Changed column name
    shipping_method VARCHAR(255), -- Changed column name
    payment_method VARCHAR(255), -- Changed column name
    trv_createdAt TIMESTAMP
);

-- Create treiven_order_items table
CREATE TABLE treiven_order_items (
    order_item_id INT PRIMARY KEY,
    trv_category_id INT,
    trv_product_id INT,
    total_qty INT,
    total_price INT,
    trv_status_title VARCHAR(255),
    trv_status_details VARCHAR(4000)
);
