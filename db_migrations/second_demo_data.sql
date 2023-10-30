INSERT INTO cities (city_name) VALUES
('Mumbai'),
('Delhi'),
('Bangalore'),
('Hyderabad'),
('Chennai'),
('Kolkata'),
('Pune');

INSERT INTO addresses (first_name, last_name, email, street, zip_code, city_id) VALUES
('Arjun', 'Singh', 'arjun@example.com', '101 Aminabad', 400001, 1),
('Priya', 'Gupta', 'priya@example.com', '202 Chandni Chowk', 110006, 2),
('Rahul', 'Kumar', 'rahul@example.com', '303 Brigade Road', 560001, 3),
('Sneha', 'Patel', 'sneha@example.com', '404 Banjara Hills', 500034, 4),
('Vikas', 'Dey', 'vikas@example.com', '505 T Nagar', 600017, 5),
('Anita', 'Roy', 'anita@example.com', '606 Park Street', 700071, 6),
('Nikhil', 'Desai', 'nikhil@example.com', '707 Koregaon Park', 411001, 7);


INSERT INTO groups (group_name, parent_id) VALUES ('Group D', 0);
INSERT INTO groups (group_name, parent_id) VALUES ('Group C', 1);
INSERT INTO groups (group_name, parent_id) VALUES ('Group A', 2);
INSERT INTO groups (group_name, parent_id) VALUES ('Group AA', 1);
INSERT INTO groups (group_name, parent_id) VALUES ('Group B', 1);

