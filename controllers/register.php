<!-- Directory: controllers/register.php -->

<!-- 
    With MVC approach can we just add some functionality now during registation my initial ideals is to add / insert 
    data after all. My database connection including the credentials could be found in my ../config/dbcon.php

    //here's the details of my dbcon.php (separated file)
    $mysql_hostname = "localhost";
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_database = "im101-pastry";

    My actual insert SQL db creation earlier

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

    -- Success example output
    INSERT INTO `treiven_user_accounts` (`treiven_id`, `retrieval_id`, `trv_user_email`, `trv_user_pwd`, `trv_user_active`, `trv_registration_date`) VALUES (NULL, NULL, 'janwonyoung@ive.cute', 'wonyoung', 'T', NULL);

    Things to consider:

    1. I want you to use my treiven_user_accounts to INSERT upcoming datas during registration by users.
    2. I want that during registation the trv_registration_date should be generated here either in this controller/register or we can actually achieve it thru the client page this can be found in my views/register/index.php
 -->