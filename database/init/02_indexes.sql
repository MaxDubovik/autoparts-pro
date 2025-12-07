-- Дополнительные индексы для оптимизации производительности
-- Для работы с большим количеством товаров

-- Составные индексы для быстрого поиска товаров
ALTER TABLE `products` 
  ADD INDEX `idx_category_active` (`category_id`, `is_active`),
  ADD INDEX `idx_category_featured` (`category_id`, `is_featured`),
  ADD INDEX `idx_price_range` (`price`, `is_active`),
  ADD INDEX `idx_stock_active` (`stock_status`, `stock_quantity`, `is_active`);

-- Индексы для быстрого поиска по заказам
ALTER TABLE `orders`
  ADD INDEX `idx_user_status` (`user_id`, `status`),
  ADD INDEX `idx_status_date` (`status`, `created_at`),
  ADD INDEX `idx_payment_status_date` (`payment_status`, `created_at`);

-- Индексы для корзины
ALTER TABLE `cart_items`
  ADD INDEX `idx_user_updated` (`user_id`, `updated_at`),
  ADD INDEX `idx_session_updated` (`session_id`, `updated_at`);

-- Индексы для отзывов
ALTER TABLE `reviews`
  ADD INDEX `idx_product_approved` (`product_id`, `is_approved`),
  ADD INDEX `idx_product_rating` (`product_id`, `rating`);

