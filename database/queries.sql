-- Helpful queries for KaosTekDB
USE KaosTekDB;

-- Report: all customers with order counts (0 for none)
SELECT c.customer_id, c.customer_name, COUNT(o.order_id) AS order_count
FROM customers c
LEFT JOIN orders o ON o.customer_id = c.customer_id
GROUP BY c.customer_id, c.customer_name
ORDER BY c.customer_name;

-- Product listing sorted by price (del 2 requirement)
SELECT product_id, product_name, price
FROM products
ORDER BY price ASC, product_name ASC;

-- Login check example (parameterize in code)
-- SELECT password FROM users WHERE username = ?;
