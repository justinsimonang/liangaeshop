# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.1.0                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          eShop.dez                                       #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2022-06-01 11:54                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "users"                                                      #
# ---------------------------------------------------------------------- #
CREATE TABLE `users` (
    `user_id` VARCHAR(40) NOT NULL,
    `username` VARCHAR(40) NOT NULL,
    `password` VARCHAR(40) NOT NULL,
    `level` VARCHAR(40) NOT NULL,
    `date_time` VARCHAR(40) NOT NULL,
    PRIMARY KEY (`user_id`)
);

# ---------------------------------------------------------------------- #
# Add table "customer"                                                   #
# ---------------------------------------------------------------------- #
CREATE TABLE `customer` (
    `customer_id` VARCHAR(40) NOT NULL,
    `lname` VARCHAR(40) NOT NULL,
    `fname` VARCHAR(40) NOT NULL,
    `mname` VARCHAR(40) NOT NULL,
    `ext` VARCHAR(40) NOT NULL,
    `street` VARCHAR(40) NOT NULL,
    `purok` VARCHAR(40) NOT NULL,
    `brgy` VARCHAR(40) NOT NULL,
    `town` VARCHAR(40) NOT NULL,
    `region` VARCHAR(40) NOT NULL,
    `contact` VARCHAR(40) NOT NULL,
    `email` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_customer` PRIMARY KEY (`customer_id`)
);

# ---------------------------------------------------------------------- #
# Add table "employee"                                                   #
# ---------------------------------------------------------------------- #
CREATE TABLE `employee` (
    `employee_id` VARCHAR(40) NOT NULL,
    `position` VARCHAR(40) NOT NULL,
    `lname` VARCHAR(40) NOT NULL,
    `fname` VARCHAR(40) NOT NULL,
    `mname` VARCHAR(40) NOT NULL,
    `ext` VARCHAR(40) NOT NULL,
    `street` VARCHAR(40) NOT NULL,
    `purok` VARCHAR(40) NOT NULL,
    `brgy` VARCHAR(40) NOT NULL,
    `town` VARCHAR(40) NOT NULL,
    `region` VARCHAR(40) NOT NULL,
    `contact` VARCHAR(40) NOT NULL,
    `email` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_employee` PRIMARY KEY (`employee_id`)
);

# ---------------------------------------------------------------------- #
# Add table "supplier"                                                   #
# ---------------------------------------------------------------------- #
CREATE TABLE `supplier` (
    `supplier_id` VARCHAR(40) NOT NULL,
    `store` VARCHAR(40) NOT NULL,
    `lname` VARCHAR(40) NOT NULL,
    `fname` VARCHAR(40) NOT NULL,
    `mname` VARCHAR(40) NOT NULL,
    `ext` VARCHAR(40) NOT NULL,
    `street` VARCHAR(40) NOT NULL,
    `purok` VARCHAR(40) NOT NULL,
    `brgy` VARCHAR(40) NOT NULL,
    `town` VARCHAR(40) NOT NULL,
    `region` VARCHAR(40) NOT NULL,
    `contact` VARCHAR(40) NOT NULL,
    `email` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_supplier` PRIMARY KEY (`supplier_id`)
);

# ---------------------------------------------------------------------- #
# Add table "product"                                                    #
# ---------------------------------------------------------------------- #
CREATE TABLE `product` (
    `product_id` VARCHAR(40) NOT NULL,
    `category_id` VARCHAR(40),
    `type_id` VARCHAR(40),
    `serial` VARCHAR(40) NOT NULL,
    `name` VARCHAR(40) NOT NULL,
    `description` VARCHAR(200) NOT NULL,
    `price` INTEGER NOT NULL,
    `quantity` INTEGER NOT NULL,
    `brand` VARCHAR(40) NOT NULL,
    `supplier` VARCHAR(200) NOT NULL,
    `status` VARCHAR(40) NOT NULL,
    `image` VARCHAR(40),
    `date_time` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_product` PRIMARY KEY (`product_id`)
);

# ---------------------------------------------------------------------- #
# Add table "monitoring"                                                 #
# ---------------------------------------------------------------------- #
CREATE TABLE `monitoring` (
    `monitoring_id` VARCHAR(40) NOT NULL,
    `product_id` VARCHAR(40) NOT NULL,
    `orders` VARCHAR(40) NOT NULL,
    `maker` VARCHAR(40) NOT NULL,
    `date_time` VARCHAR(40) NOT NULL,
    `action` VARCHAR(40) NOT NULL,
    `quantity` INTEGER NOT NULL,
    `sold` INTEGER NOT NULL,
    `stock` INTEGER NOT NULL,
    `status` VARCHAR(200) NOT NULL,
    CONSTRAINT `PK_monitoring` PRIMARY KEY (`monitoring_id`, `product_id`)
);

# ---------------------------------------------------------------------- #
# Add table "cart"                                                       #
# ---------------------------------------------------------------------- #
CREATE TABLE `cart` (
    `cart_id` VARCHAR(40) NOT NULL,
    `date_time` VARCHAR(40) NOT NULL,
    `status` VARCHAR(200) NOT NULL,
    `customer_id` VARCHAR(40) NOT NULL,
    `product_id` VARCHAR(40) NOT NULL,
    `quantity` INTEGER NOT NULL,
    CONSTRAINT `PK_cart` PRIMARY KEY (`cart_id`, `customer_id`, `product_id`)
);

# ---------------------------------------------------------------------- #
# Add table "orders"                                                     #
# ---------------------------------------------------------------------- #
CREATE TABLE `orders` (
    `order_id` VARCHAR(40) NOT NULL,
    `date_time` VARCHAR(40) NOT NULL,
    `quantity` INTEGER NOT NULL,
    `total` INTEGER NOT NULL,
    `charge` INTEGER NOT NULL,
    `sum_total` INTEGER NOT NULL,
    `status` VARCHAR(200) NOT NULL,
    `product_id` VARCHAR(40) NOT NULL,
    `customer_id` VARCHAR(40) NOT NULL,
    `location_id` VARCHAR(40) NOT NULL,
    `date_completed` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_orders` PRIMARY KEY (`order_id`, `product_id`, `customer_id`, `location_id`)
);

# ---------------------------------------------------------------------- #
# Add table "users_log"                                                  #
# ---------------------------------------------------------------------- #
CREATE TABLE `users_log` (
    `user_log_id` VARCHAR(40) NOT NULL,
    `datetime_in` VARCHAR(40) NOT NULL,
    `datetime_out` VARCHAR(40) NOT NULL,
    `user_id` VARCHAR(40) NOT NULL,
    PRIMARY KEY (`user_log_id`, `user_id`)
);

# ---------------------------------------------------------------------- #
# Add table "location"                                                   #
# ---------------------------------------------------------------------- #
CREATE TABLE `location` (
    `location_id` VARCHAR(40) NOT NULL,
    `pickup` VARCHAR(40) NOT NULL,
    `charge` INTEGER NOT NULL,
    `travel_time` INTEGER NOT NULL,
    CONSTRAINT `PK_location` PRIMARY KEY (`location_id`)
);

# ---------------------------------------------------------------------- #
# Add table "cart_orders"                                                #
# ---------------------------------------------------------------------- #
CREATE TABLE `cart_orders` (
    `cart_id` VARCHAR(40) NOT NULL,
    `order_id` VARCHAR(40) NOT NULL,
    `customer_id` VARCHAR(40) NOT NULL,
    `product_id` VARCHAR(40) NOT NULL,
    `location_id` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_cart_orders` PRIMARY KEY (`cart_id`, `order_id`, `customer_id`, `product_id`, `location_id`)
);

# ---------------------------------------------------------------------- #
# Add table "supplier_product"                                           #
# ---------------------------------------------------------------------- #
CREATE TABLE `supplier_product` (
    `supplier_id` VARCHAR(40) NOT NULL,
    `product_id` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_supplier_product` PRIMARY KEY (`supplier_id`, `product_id`)
);

# ---------------------------------------------------------------------- #
# Add table "employee_product"                                           #
# ---------------------------------------------------------------------- #
CREATE TABLE `employee_product` (
    `employee_id` VARCHAR(40) NOT NULL,
    `product_id` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_employee_product` PRIMARY KEY (`employee_id`, `product_id`)
);

# ---------------------------------------------------------------------- #
# Add table "users_customer"                                             #
# ---------------------------------------------------------------------- #
CREATE TABLE `users_customer` (
    `user_id` VARCHAR(40) NOT NULL,
    `customer_id` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_users_customer` PRIMARY KEY (`user_id`, `customer_id`)
);

# ---------------------------------------------------------------------- #
# Add table "users_employee"                                             #
# ---------------------------------------------------------------------- #
CREATE TABLE `users_employee` (
    `user_id` VARCHAR(40) NOT NULL,
    `employee_id` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_users_employee` PRIMARY KEY (`user_id`, `employee_id`)
);

# ---------------------------------------------------------------------- #
# Add table "users_supplier"                                             #
# ---------------------------------------------------------------------- #
CREATE TABLE `users_supplier` (
    `user_id` VARCHAR(40) NOT NULL,
    `supplier_id` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_users_supplier` PRIMARY KEY (`user_id`, `supplier_id`)
);

# ---------------------------------------------------------------------- #
# Add table "category"                                                   #
# ---------------------------------------------------------------------- #
CREATE TABLE `category` (
    `category_id` VARCHAR(40) NOT NULL,
    `category` VARCHAR(100) NOT NULL,
    `image` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_category` PRIMARY KEY (`category_id`)
);

# ---------------------------------------------------------------------- #
# Add table "types"                                                      #
# ---------------------------------------------------------------------- #
CREATE TABLE `types` (
    `type_id` VARCHAR(40) NOT NULL,
    `category_id` VARCHAR(40) NOT NULL,
    `types` VARCHAR(100) NOT NULL,
    `image` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_types` PRIMARY KEY (`type_id`, `category_id`)
);

# ---------------------------------------------------------------------- #
# Add table "count"                                                      #
# ---------------------------------------------------------------------- #
CREATE TABLE `count` (
    `user` INTEGER NOT NULL,
    `users_log` INTEGER NOT NULL,
    `category` INTEGER NOT NULL,
    `types` INTEGER NOT NULL,
    `location` INTEGER NOT NULL,
    `customer` INTEGER NOT NULL,
    `employee` INTEGER NOT NULL,
    `supplier` INTEGER NOT NULL,
    `product` INTEGER NOT NULL,
    `monitoring` INTEGER NOT NULL,
    `cart` INTEGER NOT NULL,
    `orders` INTEGER NOT NULL
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #
ALTER TABLE `product` ADD CONSTRAINT `types_product` 
    FOREIGN KEY (`type_id`, `category_id`) REFERENCES `types` (`type_id`,`category_id`);
ALTER TABLE `monitoring` ADD CONSTRAINT `product_monitoring` 
    FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
ALTER TABLE `cart` ADD CONSTRAINT `customer_cart` 
    FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
ALTER TABLE `cart` ADD CONSTRAINT `product_cart` 
    FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
ALTER TABLE `orders` ADD CONSTRAINT `product_orders` 
    FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
ALTER TABLE `orders` ADD CONSTRAINT `customer_orders` 
    FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
ALTER TABLE `orders` ADD CONSTRAINT `location_orders` 
    FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);
ALTER TABLE `users_log` ADD CONSTRAINT `users_users_log` 
    FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
ALTER TABLE `cart_orders` ADD CONSTRAINT `cart_cart_orders` 
    FOREIGN KEY (`cart_id`, `customer_id`, `product_id`) REFERENCES `cart` (`cart_id`,`customer_id`,`product_id`);
ALTER TABLE `cart_orders` ADD CONSTRAINT `orders_cart_orders` 
    FOREIGN KEY (`order_id`, `product_id`, `customer_id`) REFERENCES `orders` (`order_id`,`product_id`,`customer_id`);
ALTER TABLE `supplier_product` ADD CONSTRAINT `supplier_supplier_product` 
    FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);
ALTER TABLE `supplier_product` ADD CONSTRAINT `product_supplier_product` 
    FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
ALTER TABLE `employee_product` ADD CONSTRAINT `employee_employee_product` 
    FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);
ALTER TABLE `employee_product` ADD CONSTRAINT `product_employee_product` 
    FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
ALTER TABLE `users_customer` ADD CONSTRAINT `users_users_customer` 
    FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
ALTER TABLE `users_customer` ADD CONSTRAINT `customer_users_customer` 
    FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
ALTER TABLE `users_employee` ADD CONSTRAINT `users_users_employee` 
    FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
ALTER TABLE `users_employee` ADD CONSTRAINT `employee_users_employee` 
    FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);
ALTER TABLE `users_supplier` ADD CONSTRAINT `users_users_supplier` 
    FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
ALTER TABLE `users_supplier` ADD CONSTRAINT `supplier_users_supplier` 
    FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);
ALTER TABLE `types` ADD CONSTRAINT `category_types` 
    FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
