CREATE TABLE IF NOT EXISTS Orders(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_price int default 0,
    address text,
    payment_method text, 
    FOREIGN KEY (user_id) REFERENCES Users(id)
)