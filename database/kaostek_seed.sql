-- Sample data for KaosTekDB (roughly based on the screenshot)
USE KaosTekDB;

-- No default users are inserted here.
-- Use create_user.php to add the application users you want (e.g., lale and peter).

-- Customers
INSERT INTO customers (customer_name, address) VALUES
('Jens Jensen', 'Bredagerløkken 2, 5200 Odense SØ'),
('Franco Bianco', 'Stenløsevej 2, 5200 Odense S'),
('Fred Hansen', 'Dalumvej 2, 5200 Odense S'),
('Hans Hansen', 'Dalumvej 25, 5200 Odense S');

-- Products
INSERT INTO products (product_name, price) VALUES
('Myggeplammer', 200.00),
('Solcellelampe', 300.00),
('Regalarm', 200.00),
('Bestikbakke', 200.00),
('Flyttekasser', 500.00);

-- Orders
INSERT INTO orders (customer_id, order_date) VALUES
(1, '2022-05-01'),
(2, '2022-06-01'),
(1, '2022-05-22'),
(1, '2022-05-22'),
(3, '2022-06-02'),
(4, '2022-06-01'),
(1, '2022-06-01');

-- Order items (quantities and prices at time of order)
-- order_id, product_id, quantity, price_each
INSERT INTO order_items (order_id, product_id, quantity, price_each) VALUES
(1, 1, 1, 200.00),
(2, 2, 1, 300.00),
(3, 3, 2, 200.00),
(4, 4, 1, 200.00),
(5, 5, 1, 500.00),
(6, 2, 1, 300.00),
(7, 2, 1, 300.00);
