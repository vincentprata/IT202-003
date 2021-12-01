CREATE TABLE IF NOT EXISTS Cart(
    id int AUTO_INCREMENT PRIMARY KEY,
    product_id int,
    desired_quantity int,
    user_id int,
    unit_cost int default 0, 
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (product_id) REFERENCES Products(id)
)