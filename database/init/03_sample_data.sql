-- Тестовые данные для разработки

-- Категории
INSERT INTO `categories` (`name`, `slug`, `description`, `sort_order`) VALUES
('Двигатель', 'engine', 'Запчасти для двигателя', 1),
('Ходовая часть', 'chassis', 'Элементы подвески и ходовой части', 2),
('Освещение', 'lighting', 'Фары, лампы и световое оборудование', 3),
('Тормозная система', 'brakes', 'Тормозные колодки, диски, жидкости', 4),
('Электрика', 'electrical', 'Электрооборудование и проводка', 5);

-- Подкатегории для двигателя
INSERT INTO `categories` (`name`, `slug`, `description`, `parent_id`, `sort_order`) VALUES
('Фильтры', 'filters', 'Масляные, воздушные, топливные фильтры', 1, 1),
('Прокладки', 'gaskets', 'Прокладки двигателя', 1, 2),
('Ремни и цепи', 'belts-chains', 'Ремни ГРМ и цепи', 1, 3);

-- Производители
INSERT INTO `manufacturers` (`name`, `slug`, `country`) VALUES
('Bosch', 'bosch', 'Германия'),
('Mann Filter', 'mann-filter', 'Германия'),
('Gates', 'gates', 'США'),
('TRW', 'trw', 'Германия'),
('Brembo', 'brembo', 'Италия');

-- Тестовые товары
INSERT INTO `products` (`name`, `slug`, `sku`, `description`, `short_description`, `category_id`, `manufacturer_id`, `price`, `compare_price`, `stock_quantity`, `stock_status`, `is_active`, `is_featured`) VALUES
('Масляный фильтр Mann W712/73', 'mann-oil-filter-w712-73', 'MANN-W712-73', 'Высококачественный масляный фильтр для большинства автомобилей', 'Масляный фильтр Mann', 6, 2, 850.00, 1200.00, 50, 'in_stock', 1, 1),
('Тормозные колодки Brembo P06073', 'brembo-brake-pads-p06073', 'BREMBO-P06073', 'Передние тормозные колодки Brembo с отличными характеристиками торможения', 'Тормозные колодки Brembo', 4, 5, 3500.00, 4500.00, 25, 'in_stock', 1, 1),
('Ремень ГРМ Gates 5509XS', 'gates-timing-belt-5509xs', 'GATES-5509XS', 'Ремень ГРМ Gates с увеличенным ресурсом', 'Ремень ГРМ Gates', 8, 3, 2800.00, NULL, 15, 'in_stock', 1, 0),
('Амортизатор передний TRW JGB1020', 'trw-front-shock-jgb1020', 'TRW-JGB1020', 'Передний амортизатор TRW для комфортной езды', 'Амортизатор TRW', 2, 4, 4500.00, 5500.00, 10, 'in_stock', 1, 1),
('Свечи зажигания Bosch FR7DPP33', 'bosch-spark-plugs-fr7dpp33', 'BOSCH-FR7DPP33', 'Иридиевые свечи зажигания Bosch', 'Свечи Bosch', 1, 1, 1200.00, 1500.00, 30, 'in_stock', 1, 0);

-- Тестовый администратор (пароль: admin123)
INSERT INTO `users` (`email`, `password`, `first_name`, `last_name`, `role`, `is_active`) VALUES
('admin@autopartspro.ru', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Администратор', 'Системы', 'admin', 1);

-- Обновление рейтингов товаров (триггер будет создан отдельно)
UPDATE `products` SET 
  `rating` = 4.5,
  `reviews_count` = 12
WHERE `id` = 1;

UPDATE `products` SET 
  `rating` = 4.8,
  `reviews_count` = 25
WHERE `id` = 2;

