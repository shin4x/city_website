 -- DROP TABLE table_users;
-- DROP  TABLE  table_user_roles;
-- DROP  TABLE table_request;



CREATE TABLE  table_user_roles (
    role_id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    role_name TEXT NOT NULL
);

CREATE  TABLE table_users(
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_login varchar(24) NOT NULL,
    user_password varchar(24) NOT NULL,
    user_is_delete BOOL NOT NULL DEFAULT FALSE,
    role_id INT NOT NULL DEFAULT 1,


    FOREIGN KEY (role_id) REFERENCES table_user_roles (role_id)
        ON UPDATE  NO ACTION
        ON DELETE NO ACTION
);

CREATE TABLE table_request(
    user_id INT NOT NULL ,
    request_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    request_status INT NOT NULL DEFAULT 1,
    request_name TEXT NOT NULL ,

    FOREIGN KEY (user_id) REFERENCES table_users (user_id)
        ON UPDATE  NO ACTION
        ON DELETE NO ACTION
);

INSERT INTO table_request (request_status) VALUES ('rassmotr'),
                                                  ('accepted'),
                                                  ('denied');

INSERT INTO table_user_roles (role_name) VALUES ('guest'),
                                                ('admin'),
                                                ('user');
INSERT INTO table_users(user_login, user_password) VALUES ('guest','123');

INSERT INTO table_users(user_login, user_password, role_id ) VALUES ('admin',
                                                                    '123',
                                                                    (SELECT role_id
                                                                     FROM table_user_roles
                                                                     WHERE role_name='ADMIN'));


INSERT INTO table_users(user_login, user_password, role_id) VALUES ('user',
                                                                   '123',
                                                                   (SELECT role_id
                                                                    FROM table_user_roles
                                                                    WHERE role_name='USER'));
select  user_login AS 'login',
        user_password AS 'password'
from table_users
WHERE user_login = 'admin' AND user_password= 'admin' ;



select  user_login AS 'login',
        user_password AS 'password',
        role_name AS 'role',
        user_is_delete AS ' blocked'
from table_users
JOIN table_user_roles
    ON table_users.role_id = table_user_roles.role_id
    WHERE user_login = 'user'
    AND user_password= '123';







