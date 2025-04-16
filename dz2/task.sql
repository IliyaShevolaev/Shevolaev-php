-- всех пользователей
SELECT * FROM users;

-- всех заказов клиента(ов) с фамилией ‘Иванов’
SELECT orders.id, orders.name, amount, user_id, orders.created_at, orders.updated_at FROM orders 
JOIN users ON orders.user_id = users.id
WHERE users.name LIKE '%Иванов%';

-- id и name всех клиентов которые сделали хотя бы один заказ
SELECT users.id, users.name FROM users
JOIN orders ON users.id = orders.user_id
GROUP BY users.id, users.name
ORDER BY users.id;

-- пользователя который сделал последний заказ, вывести информацию о заказе
SELECT * FROM orders
JOIN users ON orders.user_id = users.id
ORDER BY orders.created_at DESC
LIMIT 1;

-- всех заказов которые сделаны не позже 31.03.2023
SELECT * FROM orders
WHERE created_at > '31.03.2023';

