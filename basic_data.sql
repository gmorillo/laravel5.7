INSERT INTO `publicity`.`users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `profile_img`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super User', 'superuser@morilloguillermo.com', '2019-01-15 19:54:57', '$2y$10$8JaZTTpTRhXiM0RQJ4kiVe6oReZ08NMcKPq8HuEx3E.HtRK6SYzxe', 'default-user.png', 'ztqMax1Aqz9mpDY2WsVAZUjejeNsYP6m9PBLs50YMT5QxYmfVcpMqgAr9PGH', '2019-01-15 19:47:37', '2019-01-15 19:54:57'),
(2, 2, 'Admin User', 'adminuser@morilloguillermo.com', NULL, '$2y$10$78xNV4pVCJwSfz1nNRhnf.C/ItU3TkZ2yYzrvbARN/2Zij.1nHdPi', 'default-user.png', NULL, '2019-01-15 19:47:37', '2019-01-15 19:47:37'),
(3, 3, 'Esc  User', 'escortuser@morilloguillermo.com', '2019-01-16 18:22:16', '$2y$10$N1sUXFTENG2BlpCZN42cdOrwOMdpP/7F1siishCBn3x3odc.4VdfG', 'default-user.png', NULL, '2019-01-15 19:47:38', '2019-01-16 18:22:16'),
(4, 4, 'Ga  User', 'gayuser@morilloguillermo.com', NULL, '$2y$10$rZqFec8Lg3VYj1YVIbU9ius6MnYgnC68Pw87f3dCARiXQ6vElqZ7q', 'default-user.png', NULL, '2019-01-15 19:47:38', '2019-01-15 19:47:38'),
(5, 5, 'Tra  User', 'transuser@morilloguillermo.com', NULL, '$2y$10$9S1OoCAGRmKc4AhwjzMMH.iA4O8Z3HBCD//o4fe1ObQyssiEfLeM6', 'default-user.png', NULL, '2019-01-15 19:47:38', '2019-01-15 19:47:38'),
(6, 6, 'Agen  User', 'agencyuser@morilloguillermo.com', NULL, '$2y$10$UiuVyuOZE8VXhHQGw51Xseaci4vSu8iXYTNcG4JUq823NxaBGWDJC', 'default-user.png', NULL, '2019-01-15 19:47:38', '2019-01-15 19:47:38'),
(7, 7, 'Clu  User', 'clubuser@morilloguillermo.com', NULL, '$2y$10$LDWap51pvjMPigLah4dfAuA/xbAuVFbJ4MUjlK36iWDnwlmkT6ViS', 'default-user.png', NULL, '2019-01-15 19:47:38', '2019-01-15 19:47:38');

INSERT INTO `publicity`.`roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super User', 'Acceso a parte administrativa, puede crear superusers', '2019-01-15 19:47:38', '2019-01-15 19:47:38'),
(2, 'Admin User', 'Acceso a parte administrativa con limitaciones, puede crear administradores', '2019-01-15 19:47:38', '2019-01-15 19:47:38'),
(3, 'Esc User', 'Usuario Normal', '2019-01-15 19:47:38', '2019-01-15 19:47:38'),
(4, 'Ga User', 'Usuario Normal', '2019-01-15 19:47:38', '2019-01-15 19:47:38'),
(5, 'Tra User', 'Usuario Normal', '2019-01-15 19:47:38', '2019-01-15 19:47:38'),
(6, 'Agency User', 'Usuario agencia, puede tener perfil y dentor del perfil publicaciones de fichas', '2019-01-15 19:47:38', '2019-01-15 19:47:38'),
(7, 'Club User', 'Usuario Club, puede tener perfil y dentor del perfil publicaciones de fichas', '2019-01-15 19:47:38', '2019-01-15 19:47:38');

INSERT INTO `publicity`.`cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ciudad de panamá', '2019-01-15 19:47:39', '2019-01-15 19:47:39'),
(2, 'Coclé', '2019-01-15 19:47:39', '2019-01-15 19:47:39'),
(3, 'Emberá', '2019-01-15 19:47:39', '2019-01-15 19:47:39'),
(4, 'Chiriquí', '2019-01-15 19:47:39', '2019-01-15 19:47:39'),
(5, 'Los Santos', '2019-01-15 19:47:39', '2019-01-15 19:47:39');

INSERT INTO `publicity`.`countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Panamá', '2019-01-15 19:47:39', '2019-01-15 19:47:39');

INSERT INTO `publicity`.`categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Escort', '2019-01-15 19:47:39', '2019-01-15 19:47:39'),
(2, 'Gay', '2019-01-15 19:47:39', '2019-01-15 19:47:39'),
(3, 'Trans', '2019-01-15 19:47:39', '2019-01-15 19:47:39'),
(4, 'Agencias', '2019-01-15 19:47:39', '2019-01-15 19:47:39'),
(5, 'Clubs', '2019-01-15 19:47:39', '2019-01-15 19:47:39');

INSERT INTO `publicity`.`schedule` (`id`, `desde`, `hasta`, `created_at`, `updated_at`) 
VALUES (1, '00:00:00','05:59:59',now(),now()), (2, '06:00:00','11:59:59',now(),now()), (3, '12:00:00','17:59:59',now(),now()), (4, '18:00:00','23:59:59',now(),now());

INSERT INTO `publicity`.`price_hour` (`id`, `price`, `id_type`, `created_at`, `updated_at`) 
VALUES (1, 2,1,now(),now()), (2, 3,2,now(),now()), (3, 4,3,now(),now());

INSERT INTO `publicity`.`price_publication` (`id`, `tipo`,`price`, `id_type`, `created_at`, `updated_at`) 
VALUES (1, 'Basico', 4,1,now(),now()), (2, 'Premium', 6,2,now(),now()), (3, 'Rotador', 8,3,now(),now());