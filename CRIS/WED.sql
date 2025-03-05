CREATE DATABASE WED;
USE WED;

CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `profile_picture` VARCHAR(255) DEFAULT '/IMAGENES/user.png',
  `role` VARCHAR(50) DEFAULT 'Usuario',
  `company` VARCHAR(100),
  `bio` TEXT,
  `birthday` DATE,
  `country` VARCHAR(50),
  `phone` VARCHAR(20),
  `website` VARCHAR(255),
  `social_twitter` VARCHAR(255),
  `social_facebook` VARCHAR(255),
  `social_instagram` VARCHAR(255),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `users` (`full_name`, `email`, `username`, `password`, `profile_picture`, `role`, `company`, `bio`, `birthday`, `country`, `phone`, `website`, `social_twitter`, `social_facebook`, `social_instagram`)
VALUES 
('Juan Pérez', 'juan.perez@mail.com', 'juanperez', 'password123', '/IMAGENES/juan.png', 'Usuario', 'TechCorp', 'Desarrollador de software con experiencia en aplicaciones web.', '1990-05-10', 'España', '+34 600 123 456', 'http://juanperez.com', 'https://twitter.com/juanperez', 'https://www.facebook.com/juan.perez', 'https://www.instagram.com/juanperez'),
('Ana Gómez', 'ana.gomez@mail.com', 'anagomez', 'password456', '/IMAGENES/ana.png', 'Admin', 'Web Solutions', 'Especialista en UX/UI con pasión por el diseño digital.', '1985-02-25', 'México', '+52 555 987 654', 'http://anagomez.com', 'https://twitter.com/anagomez', 'https://www.facebook.com/ana.gomez', 'https://www.instagram.com/anagomez'),
('Carlos Ruiz', 'carlos.ruiz@mail.com', 'carlosruiz', 'password789', '/IMAGENES/carlos.png', 'Usuario', 'Creative Studio', 'Diseñador gráfico con más de 10 años de experiencia en branding.', '1992-08-15', 'Colombia', '+57 311 234 5678', 'http://carlosruiz.com', 'https://twitter.com/carlosruiz', 'https://www.facebook.com/carlos.ruiz', 'https://www.instagram.com/carlosruiz');

select*from users;