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

-- Create treiven_products table
CREATE TABLE treiven_products (
    trv_product_id INT PRIMARY KEY,
    trv_category_id INT,
    trv_product_name VARCHAR(255),
    trv_product_info VARCHAR(4000),
    trv_product_price INT,
    trv_product_qty INT,
    trv_product_qty_stock CHAR(1)
);

-- Create treiven_category table
CREATE TABLE treiven_category (
    trv_category_id INT PRIMARY KEY,
    trv_category_name VARCHAR(255),
    trv_category_info VARCHAR(4000)
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
