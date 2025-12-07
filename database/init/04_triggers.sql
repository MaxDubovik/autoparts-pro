-- Триггеры для автоматического обновления данных

-- Триггер для обновления рейтинга товара при добавлении отзыва
DELIMITER $$

CREATE TRIGGER `update_product_rating_on_review_insert`
AFTER INSERT ON `reviews`
FOR EACH ROW
BEGIN
    UPDATE `products`
    SET 
        `rating` = (
            SELECT AVG(`rating`)
            FROM `reviews`
            WHERE `product_id` = NEW.`product_id` AND `is_approved` = 1
        ),
        `reviews_count` = (
            SELECT COUNT(*)
            FROM `reviews`
            WHERE `product_id` = NEW.`product_id` AND `is_approved` = 1
        )
    WHERE `id` = NEW.`product_id`;
END$$

CREATE TRIGGER `update_product_rating_on_review_update`
AFTER UPDATE ON `reviews`
FOR EACH ROW
BEGIN
    UPDATE `products`
    SET 
        `rating` = (
            SELECT AVG(`rating`)
            FROM `reviews`
            WHERE `product_id` = NEW.`product_id` AND `is_approved` = 1
        ),
        `reviews_count` = (
            SELECT COUNT(*)
            FROM `reviews`
            WHERE `product_id` = NEW.`product_id` AND `is_approved` = 1
        )
    WHERE `id` = NEW.`product_id`;
END$$

-- Триггер для обновления количества продаж при создании заказа
CREATE TRIGGER `update_product_sales_on_order`
AFTER INSERT ON `order_items`
FOR EACH ROW
BEGIN
    UPDATE `products`
    SET `sales_count` = `sales_count` + NEW.`quantity`
    WHERE `id` = NEW.`product_id`;
END$$

DELIMITER ;

